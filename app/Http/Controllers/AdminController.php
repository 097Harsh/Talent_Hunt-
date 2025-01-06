<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Skills;
use App\Models\feedback;
use Illuminate\Queue\Middleware\Skip;

class AdminController extends Controller
{
    //for dahboard page
    public function dashboard()
    {
        if(Auth::check())
        {   
            $users = DB::table('users')->where('role_id','=','2')->count();
            return view('admin.dashboard',compact('users'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //ManagerUsers show the records of user who's role_id = 2
    public function managerUsers()
    {
        if(Auth::check())
        {
            $users = User::where('role_id',2)->get();
            return view('admin.users.all_users',compact('users'));
        }   
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete User
    public function deleteUser(Request $request)
    {
        $id = $request->input('user_id');
        if (Auth::check()) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return redirect()->route('ManagerUsers')->with('status','user deleted successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Edit user record 
    public function editUser($id)
    {   
        if(Auth::check())
        {
            $user = User::find($id);
            if($user)
            {
                return view('admin.users.edit_user',compact('user'));
            }
            return redirect()->route('ManagerUsers')->with('status','user not find...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //update user record
    public function updateUser(Request $request,$id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email'=> 'required|email'
        ]);
        if(Auth::check())
        {
            $user = User::findorfail($id);
         
            if($user)
            {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();
                return redirect()->route('ManagerUsers')->with('status','user updated successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Manage course Module code 
    public function ManageCourse()
    {
        if(Auth::check())
        {
            $courses = Course::where('is_delete','=','0')->get();
            return view('admin.course.all_course',compact('courses'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //add course
    public function AddCourse()
    {
        if(Auth::check())
        {
            return view('admin.course.add_course');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function InsertCourse(Request $request)
    {
        $validation = $request->validate([
            'course_name'  =>  'required',
        ]);
        if(Auth::check())
        {
            $course = new Course();
            $course->course_name = $request->input('course_name');
            $course->is_delete = 0;
            $course->save();
            return redirect()->route('ManageCourse')->with('status','course added successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete course
    public function DeleteCourse(Request $request)
    {
        $id = $request->input('user_id');
        if (Auth::check()) {
            $course = DB::table('course')->where('course_id','=',$id)->first();
            if ($course) {
               $record = DB::table('course')->where('course_id','=',$id)->update(['is_delete'=>1]);
                return redirect()->route('ManageCourse')->with('status','course deleted successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Edit course
    public function EditCourse($id)
    {
        if(Auth::check())
        {
            $course = DB::table('course')->where('course_id','=',$id)->first();
            return view('admin.course.edit_course',compact('course'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function UpdateCourse(Request $request,$id)
    {   
        $validation = request()->validate([
            'course_name'   =>  'required'
        ]);
        if(Auth::check())
        {
            $course =Course::find($id);
            if($course)
            {
                $course->course_name = $request->input('course_name');
                $course->save();
                return redirect()->route('ManageCourse')->with('status','course added successfully...');
            }   
            return redirect()->route('ManagerUsers')->with('status','course not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //manage Skills module
    public function ManageSkills()
    {
        if(Auth::check())
        {
            $skills = Skills::all();
            return view('admin.skills.all_skill',compact('skills'));
        }
    }
    //add skill
    public function AddSkill()
    {
        if(Auth::check())
        {
            return view('admin.skills.add_skill');
        }
    }
    public function InsertSkill(Request $request)
    {
        $validation = request()->validate([
            'skill_name' => 'required',
        ]);
        if(Auth::check())
        {
            $skills = new Skills();
            $skills->skill_name = $request->input('skill_name');
            $skills->save();
            return redirect()->route('ManageSkills')->with('status','skill added successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //deleting skill
    public function deleteSkill($id)
    {
        if(Auth::check())
        {
            $skill = Skills::find($id);
            if($skill)
            {
                $skills =DB::table('skills')->where('skill_id','=',$id)->delete();
                if($skills)
                {
                    return redirect()->route('ManageSkills')->with('status','skill deleted successfully...');
                }
            }
            return redirect()->route('ManageSkills')->with('status','skill not deleted successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //editing skills
    public function editSkill($id)
    {
        if(Auth::check())
        {   
            $skill = Skills::find($id);
            if($skill)
            {
                return view('admin.skills.edit_skill',compact('skill'));
            }
            return redirect()->route('ManageSkills')->with('status','skill not found...');
        }   
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function UpdatingSkill(Request $request,$id)
    {
        $validation = request()->validate([
            'skill_name' => 'required'
        ]);
        if(Auth::check())
        {
            $skill = Skills::find($id);
            if($skill)
            {
                $skill->skill_name = $request->input('skill_name');
                $skill->save();
                return redirect()->route('ManageSkills')->with('status','skill updated successfully...');
            }
            return redirect()->route('ManageSkills')->with('status','skill not updated successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //view Feedback
    public function ViewFeedBack()
    {
        if(Auth::check())
        {
            $record = feedback::all();
            return view('admin.ViewFeedBack',compact('record'));
        }
    }
}
