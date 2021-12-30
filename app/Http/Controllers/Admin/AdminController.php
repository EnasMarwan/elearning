<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Tranier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function dashboard(){
        $courses_num = Course::count();
    $students_num = User::count();
    $trainers_num = Tranier::count();
        return view('admin.dashboard',[
            'courses_num' => $courses_num,
            'students_num' => $students_num,
            'trainers_num' => $trainers_num,

        ]);
    }

    public function create(){
        if(Auth::user()->super_admin == 0){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.addAdmin') ; 
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|unique:admins,email|email',
            'password'=>'required|min:8',
        ]);
       
        Admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('admin.dashboard')->with('success' , 'Admin created');

    }

    public function students(){

        $students=User::all();

        return view('admin.students.students' , [
            'students' =>$students,
        ]) ;               

    }

    public function courses($id){
        $student=User::findOrFail($id);
        $courses=$student->courses()->get();
        return view('admin.students.courses',[
            'courses' => $courses,
            'student' => $student,
            'id'=>$id,
        ]);
    }

    public function approveCourse($id,$course_id){
        DB::table('course_user')->where('user_id' , $id)
                                ->where('course_id', $course_id)
                                ->update([
                                    'status' => 'approve',
                                ]);
        return redirect()->back();                        
    }

    public function rejectCourse($id,$course_id){
        DB::table('course_user')->where('user_id' , $id)
                                ->where('course_id', $course_id)
                                ->update([
                                    'status' => 'reject' ,
                                ]);
        return redirect()->back();                        
    }

    public function trainers(){
        $trainers=Tranier::all();
        return view('admin.trainers.trainers',[
            'trainers' => $trainers,
        ]);
    }

    public function approveTrainer($id){
        Tranier::where('id' , $id)->update(['status' => 'approve']);
        return redirect()->back(); 

    }

    public function rejectTrainer($id){
    Tranier::where('id' , $id)->update(['status' => 'reject']);
        return redirect()->back(); 
    }

    public function trainerDestroy($id){
        Tranier::destroy($id);
        return redirect()->back()->with('success' , ' trainer deleted');
        
    }

    public function messages(){
        $messages = Contact::all();
        return view('admin.messages',[
            'messages' => $messages,
        ]);
    }

    public function messageDestroy($id){
        Contact::destroy($id);
        return redirect()->back()->with('success' , ' message deleted');
    }

    public function approveMessage($id){
        Contact::where('id' , $id)->update(['testimonals' => 'Yes']);
        return redirect()->back(); 

    }

    public function rejectMessage($id){
    Contact::where('id' , $id)->update(['testimonals' => 'No']);
        return redirect()->back(); 
    }

    public function coursesShow(){
        $courses = Course::all();
        return view('admin.courses.courses',[
            'courses' => $courses,
        ]);
    }

}
