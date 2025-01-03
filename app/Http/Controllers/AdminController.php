<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    //for dahboard page
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('admin.dashboard');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //ManagerUsers show the records of user who's role_id = 2
    public function managerUsers()
    {
        if(Auth::check())
        {
            $users = User::where('role_id',2)->get();
            //echo "<pre>";print_r($users);echo "</pre>";die;
            return view('admin.all_users',compact('users'));
        }   
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete User
    public function deleteUser(Request $request)
    {
        //echo "hi";die;
        $id = $request->input('user_id');
        //echo $id;die;
        if (Auth::check()) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return redirect()->route('ManagerUsers')->with('status','user deleted successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find successfully...');
        }
        return response()->json(['success' => false, 'message' => 'Please log in first'], 401);
    }
    

}
