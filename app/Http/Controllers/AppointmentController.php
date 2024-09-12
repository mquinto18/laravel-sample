<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    
        // // Generate QR code based on the input data
        // $qrcodeData = "Appointment Details: \nName: " . $request->name .
        //                 "\nAddress: " . $request->address .
        //                 "\nEmail: " . $request->email .
        //                 "\nDescription: " . $request->description .
        //                 "\nDate: " . $request->date;
    
        // // Generate the QR code and convert to Base64
        // $qrcode = QrCode::format('png')->size(200)->generate($qrcodeData);
        // $qrcodeBase64 = base64_encode($qrcode);
    
        // // Save the Base64 QR code to the database
        // $appointment->qrcode_path = $qrcodeBase64;
        // $appointment->save();
    
        if ($appointment) {
            session()->flash('success', 'Appointment Added Successfully');
            return redirect()->route('admin/appointment');
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->route('admin/appointment/create');
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
