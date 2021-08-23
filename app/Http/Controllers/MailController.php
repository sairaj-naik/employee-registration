<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    //
    public function sendEmail($email){
        $employee = DB::select('select * from employee where email = ?',[$email]);
        // return view('employees.emp_update',['employee'=>$employee]);
        
        $details =[
            'title' => 'Employee Added',
            'body' => 'This mail is to inform {emp_name} that, Now your Empoloyee of this Company.'
        ];

        Mail::to($email)->send(new TestMail($employee));
        return  view('emails.TestMail', ['employee'=>$employee]);
    }
}
