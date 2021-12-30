<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewStudentNotification;

class StudentController extends Controller
{
    public function index(){
        $user=Auth::user();
        $courses=$user->courses()->get();
        
        return view('dashboard',[
            'courses' => $courses,
        ]);
    }

    public function show($id){
        
    }

    public function showChapters(Course $course){

        $chapters=$course->chapters()->get();
        $course=Auth::user()->courses()->where('id', $course->id)->first();

        return view('student.chapters',[
            'chapters' => $chapters,
            'course' => $course,
        ]);
        
    }

    public function showLessons(Chapter $chapter){

        $lessons=$chapter->lessons()->get();

        $course=Auth::user()->courses()->where('id', $chapter->course_id)->first();
    
        return view('student.lessons',[
            'lessons' => $lessons,
            'chapter' => $chapter,
            'course' => $course,
        ]);
        
    }

    public function showLesson(Lesson $lesson){
        return view('student.lesson',[
        'lesson' => $lesson,
        ]);
        
    }

    public function downloadFile(Lesson $lesson){
        return response()->download(public_path('uploads/' . $lesson->file));
        
    
    }

    public function addCourse(Request $request,$id){
    
        $course= Course::findOrFail($id);
        
        $user=Auth::user();

        $courses= $user->courses()->get();

        foreach ($courses as $c) {
            if($c->id == $course->id){
                return redirect()->back()->with('warning' , 'course already added !');
            }
        }
        
        $user->courses()->save( $course, [
                    'course_id' => $course->id,
                    'user_id' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
        ] );

        $admins = Admin::all();
        Notification::send($admins, new NewStudentNotification($user , $course));

        return redirect()->back()->with('success' , 'course added !');
    }

    

    public function profile(){
        return view('student.profile');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'spec' => 'nullable',
            'email' => 'required',
        ]);

        $user=Auth::user();

        $user->update($request->all());

        return redirect(route('profile'))
            ->with('success', 'Profile updated');
    
    }

    public function changePass(Request $request){
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success','password successfully updated');
    }

}
