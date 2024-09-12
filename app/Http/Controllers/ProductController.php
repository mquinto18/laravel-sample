<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class ProductController extends Controller
{
   public function index(){
        $products = Product::orderBy('id', 'desc')->get();  
        $total = Product::count();
        return view('admin.product.home', compact(['products', 'total']));
   }

   public function create(){
    return view('admin.product.create');
   }


   public function sendWelcomeEmail($toEmail, $subject, $title, $category, $price)
    {
        try {
            // Send the email
            Mail::to($toEmail)->send(new WelcomeEmail($subject, $title, $category, $price));
            // Return success message if email is sent without any exceptions
            return response()->json(['status' => 'Email sent successfully']);
        } catch (Exception $e) {
            // Catch any exception and return a failure message
            return response()->json([
                'status' => 'Email sending failed',
                'error' => $e->getMessage() // You can also log this for more details
            ], 500);
        }
    }

   public function productsave(Request $request)
    {
        // Validate request inputs
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        // Save product data
        $data = Product::create($validation);

        // If product data is saved successfully, send an email
        if ($data) {
            // Structure the message based on title, category, and price
            $title = $validation['title'];
            $category = $validation['category'];
            $price = $validation['price'];

         
            $subject = "Product Details";

            // Sending email to the admin or user (you can change the recipient as needed)
            $toEmail = 'quintom53@gmail.com'; // Admin email or user email

            // Call sendWelcomeEmail to send the structured product message
            $this->sendWelcomeEmail($toEmail, $subject, $title, $category, $price);

            // Flash success message and redirect
            session()->flash('success', 'Product Added Successfully and Email Sent');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect(route('admin/products/create'));
        }
    }

    public function productupdate($id){
        $products = Product::findOrFail($id);
        return view('admin.product.update', compact('products'));
    }
    public function productupdatesave(Request $request, $id){
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        $products->title = $title;
        $products->category = $category;
        $products->price = $price;

        $data = $products->save();
        if($data){
            session()->flash('success', 'Updated Successfully');
            return redirect(route('admin/products'));
        }else{
            session()->flash('error', 'Updated error');
            return redirect(route('admin/products/edit'));
        }
    }

    public function productdelete($id){
        $products = Product::findOrFail($id)->delete();
        if($products){
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('admin/products'));
        }else{
            session()->flash('error', 'Error Delete');
            return redirect(route('admin/products'));
        }

    }

    public function productview($id){
        $product = Product::find($id);

        if(!$product){
            return redirect()->route('admin/products')->with('error', 'Product not found');
        }

        $qrcodeData = "Product Details: \nTitle: " . $product->title .
                  "\nCategory: " . $product->category .
                  "\nPrice: " . $product->price;

        $qrcode = QrCode::size(200)->generate($qrcodeData);
        return view('admin.product.show', compact('product', 'qrcode'));  
    }
}
