<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeAppointmentEmail;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::orderBy('id', 'desc')->get();
        $total = Appointment::count();
        return view('admin.appointment.home', compact(['appointments', 'total']));
    }
    public function create(){
        return view('admin.appointment.create');
    }

    public function sendAppointmentEmail($toEmail, $subject, $name, $address, $email, $description, $date,  $qrcodeUrl){
        try{
            Mail::to($toEmail)->send(new WelcomeAppointmentEmail($subject, $name, $address, $email, $description, $date, $qrcodeUrl));

            return response()->json(['status' => 'Email sent Successfully']);
        }catch(Exception $e){
            return response()->json([
                'status' => 'Email sending failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function appointmentsave(Request $request)
{
    $validation = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'email' => 'required|email|max:255',
        'description' => 'required',
        'date' => 'required|date',
    ]);

    // Save the validated data to the database
    $appointment = Appointment::create($validation);

    if($appointment){
        $name = $validation['name'];
        $address = $validation['address'];
        $email = $validation['email'];
        $description = $validation['description'];
        $date = $validation['date'];

        $subject = "Appointment Details";
        $toEmail = $email;

        $qrcodeData = "Appointment Details: \nName: " .  $appointment->name .
                      "\nAddress: " .  $appointment->address .
                      "\nEmail: " .  $appointment->email .
                      "\nDescription: " .  $appointment->description .
                      "\nDate: " .  $appointment->date;

        // Save the QR code as an image on the server
        $filename = 'qrcode_' . time() . '.png';
        $filepath = public_path('qrcodes/' . $filename);
        QrCode::format('png')->size(200)->generate($qrcodeData, $filepath);

        // Use the public URL of the QR code image
        $qrcodeUrl = asset('qrcodes/' . $filename);

        // Send the email
        $this->sendAppointmentEmail($toEmail, $subject, $name, $address, $email, $description, $date, $qrcodeUrl);
        session()->flash('success', 'Appointment Added Successfully and Email Sent');
        return redirect(route('admin/appointment'));

    } else {
        session()->flash('error', 'Some problem occurred');
        return redirect(route('admin/appointment/create'));
    }
}


    public function appointmentview($id){
        $appointment = Appointment::find($id);

        if(!$appointment){
            return redirect()->route('admin/appointment')->with('error', 'Appointment not found');
        }

        $qrcodeData = "Appointment Details: \nName: " .  $appointment->name .
                  "\nAddress: " .  $appointment->address .
                  "\nEmail: " .  $appointment->email .
                  "\nDescription: " .  $appointment->description .
                  "\nDate: " .  $appointment->date;

        $qrcode = QrCode::size(200)->generate($qrcodeData);

        return view('admin.appointment.show', compact('appointment', 'qrcode'));   
    }
}
