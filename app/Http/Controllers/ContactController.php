<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use Mail;
use Session;
class ContactController extends Controller {

//Server Contact view:: we will create view in next step
    public function getContact(){

        return View('contact');
    }

    //Contact Form
    public function getContactUsForm(){

        //Get all the data and store it inside Store Variable
        $data = Request::all();

        //Validation rules
        $rules = array (
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number'=>'numeric|min:8',
            'email' => 'required|email',
            'message' => 'required|min:25'
        );

        //Validate data
        $validator  = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){

            //Send email using Laravel send function
            Mail::send('emails.hello', $data, function($message) use ($data)
            {
//email 'From' field: Get users email add and name
                $message->from($data['email'] , $data['first_name']);
//email 'To' field: cahnge this to emails that you want to be notified.
                $message->to('dr@daverobbdesigns.com', 'David Robb')->subject('daverobbdesigns.com message');

            });

            Session::flash('message', 'Thanks for the Message!');
            return Redirect::to('contact');

            //return View('contact');

        }else{
//return contact form with errors
            return Redirect::to('/contact')->withErrors($validator);
        }
    }
}