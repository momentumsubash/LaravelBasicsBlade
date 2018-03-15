<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use Auth;
use App\Notifications\EmailNotification;
use Session;
class EmailController extends Controller
{
    //

    public function send_email($data='')
    {	$value = array();
    	$value['message']='this is test message from controller';
    	$value['salary']='50000';
    	$value['tax']='5000';
    	$value['url']= URL::current();
    	$user = Auth::user();
    	$chk=$user->notify(new EmailNotification($value));

    		// Session::flash('info','sending email sucess');
    	// return redirect()->back()->with('sucess', 'Email Was Sent.');
    	return redirect()->back();

    }
}
