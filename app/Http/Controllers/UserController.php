<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Tranier;
use App\Models\Contact;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(6);
        $categories=Category::all();
    
        return view('courses' , [
            'courses' => $courses,
            'categories' => $categories
            
        ]);
    }

    public function courseDetails(Course $course){

        $chapters=$course->chapters()->get();

        return view('courseDet',[
            'course' => $course,
            'chapters'=>$chapters,
        ]);

    }

    public function searchCourse(){

        $cat_id=$_GET['category_id'] ;
        $category=Category::findOrFail($cat_id);
        $courses=$category->courses()->paginate(6);
        return view('catCourses' , [
            'courses' => $courses,
            'category' => $category,
        ]);

    }

    public function trainers(){
        $trainers=Tranier::all();
        return view('trainers',[
            'trainers' => $trainers ,
        ]);
    }
    
    public function contact(){
        $message = new Contact();
        return view('contact',[
            'message' => $message,
        ]);
    }

    public function store(Request $request){

        $request->validate([

            'name' => 'required',
            'email' => 'email|required',
            'title' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());
        return redirect()->back()->with('success' , 'Your message has been sent. Thank you!');
        

    }

    public function about(){
        $messages=Contact::all();
        return view('about',[
            'messages' => $messages,
        ]);
    }

    public function payment(){

        return view('payment');
    }
}
