<?php

namespace App\Http\Controllers\Trainer;

use Image;
use App\Models\Course;
use App\Models\Tranier;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class TrainerController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $courses=$user->courses()->get();
        return view('trainer.courses.index',[
            'courses' => $courses,
        
        ]);
    }

    public function create(){
        if(Auth::user()->status == 'approve'  || Config::get('fortify.guard' , 'admin')){
            $categories = Category::all(); 
            $trainers = Tranier::all();
            $course = new Course;
            return view('trainer.courses.create',[
                'categories'=>$categories,
                'trainers' => $trainers,
                'course' => $course,
            ]);
        }
        else{
            return redirect(route('courses.index'))->with('danger', 'You cannot add a course at the moment!');
        }
    }

    public function store(Request $request){
        $data= $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tranier_id' => 'nullable|exists:traniers,id',
            'price' => 'required|integer',
            'img' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if(Auth::user()->super_admin){
            $data['tranier_id']= $request->tranier_id;
        }
        else{
            $data['tranier_id']= Auth::user()->id;
        }

        $name_img = $data['img']->hashName();
        Image::make($data['img'])->resize(354,236)->save(public_path('uploads/courses/' . $name_img));
        $data['img']=$name_img;
        Course::create($data);

        if(Auth::user()->super_admin){
            return redirect(route('admin.courses'))->with('success', ' Course added!');
        }else{
            return redirect(route('courses.index'))->with('success', ' Course added!');
        }



    }

    public function edit($id){

        $course= Course::findOrFail($id);
        $categories = Category::all(); 
        $trainers=Tranier::all();
        return view('trainer.courses.edit',[
            'course' => $course,
            'categories' => $categories,
            'trainers' => $trainers,

        ]);
    }

    public function update(Request $request,$id){

        $data=$request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tranier_id' => 'nullable|exists:traniers,id',
            'price' => 'required|integer',
            'img' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $course =Course::findOrFail($id);
        $img=$course->img;


        if ($request->hasFile('img')){ //upload new image
            Storage::disk('uploads')->delete('courses/' . $img);

            $name_img = $data['img']->hashName();
            Image::make($data['img'])->resize(354,236)->save(public_path('uploads/courses/' . $name_img));
            $data['img']=$name_img;
        }
        else{
            $data['img']=$img;
        }
            

            $course->update($data);

            if(Auth::user()->super_admin){
                return redirect(route('admin.courses'))->with('success', ' Course updated!');
            }else{
                return redirect(route('courses.index'))->with('success', ' Course updated!');
            }
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        if(Auth::user()->super_admin){
            return redirect(route('admin.courses'))->with('success', ' Course deleted!');
        }else{
            return redirect(route('courses.index'))->with('success', ' Course deleted!');
        }
        

    }

    public function trash(){
        $courses=Course::onlyTrashed()->paginate();
        return view('trainer.courses.trash',[
            'courses' => $courses,
        ]);
    }

    public function restore(Request $request , $id){



        $course = Course::onlyTrashed()->findOrFail($id);
        $course->restore(); 

        return redirect(route('courses.trash'))
            ->with('success', 'Course restored!');

    }

    public function forceDelete($id){

        $course = Course::withTrashed()->findOrFail($id);
        $img=$course->img;
        Storage::disk('uploads')->delete('courses/' . $img);
        $course->forceDelete();

        return redirect(route('courses.trash'))
            ->with('success', 'Course deleted for ever!');

    }

    public function profile(){
        
        return view ('trainer.profile');
    

    }



    public function updateProfile(Request $request ,$id){

        $data=$request->validate([
            'name' => 'required',
            'img' => [
                'nullable', 
                'mimes:jpg,jpeg,png', 
                'dimensions:min_with=200,min_height=200,max_height=8000,max_width=8000',
            ],
            'email' => 'required',
            'phone'=>'nullable',
            'spec' => 'nullable',
            'univ'=>'nullable',
            'Country' => 'nullable',
            'telegram' => 'nullable',
            'about' =>'nullable'

        ]);


        $user=auth()->user();
    
        // $trainer = Tranier::findOrFail($id);

        $old_img=$user->img;
        

        if ($request->hasFile('img')){

            Storage::disk('uploads')->delete('trainers/' . $old_img);

            $new_img = $data['img']->hashName();
            Image::make($data['img'])->resize(100,100)->save(public_path('uploads/trainers/' . $new_img));

            
            $data['img']=$new_img;

            
        }
        else{
            $data['img']=$old_img;
        }


        
        $user->update($data);

        return redirect(route('trainer.profile'))
            ->with('success', 'Profile updated');
    }

    public function changePass(Request $request)
    {       
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




