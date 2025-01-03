<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Skills;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('user.home');
    }
    //about page
    public function about()
    {
        return view('user.about');
    }
    //contact page
    public function contact()
    {
        return view('user.contact');
    }
    public function storeContact(Request $request)
    {
        //echo "hi";die;
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|numeric',
            'msg' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $msg = $request->input('msg');
        $contact = DB::table('contact')->insert(['name' => $name,'email' => $email,'contact' => $contact, 'msg' => $msg]);
        if($contact)
        {
            return redirect()->route('contact')->with('status','inqury request sended...');
        }
        return redirect()->route('home');
    }
    //user profile 
    public function userProfile()
    {
        if(Auth::check())
        {
            //echo Auth::user()->id;die;
            $courses = Course::all();
            $skills = Skills::all();
            return view('user.userProfile',compact('courses','skills'));
        }
    }
}
