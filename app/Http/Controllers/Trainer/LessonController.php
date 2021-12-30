<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Tranier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewLessonNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Config;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $chapter=Chapter::findOrFail($id);
        $lessons=$chapter->lessons()->get();

        return view('trainer.lessons.index',[
            'chapter' => $chapter,
            'lessons' => $lessons,
            'id' => $id,
        
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Chapter $chapter)

    {
       
        if(Auth::user()->status == 'approve' || Config::get('fortify.guard','admin')){
        return view('trainer.lessons.create' , compact( 'chapter'));
        }
        else{
            return redirect()->back()->with('danger', 'You cannot add a lesson at the moment!');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Chapter $chapter)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'video'=> 'required|file|mimetypes:video/mp4',
            'file' => 'nullable',
            'video_name' => 'nullable',
            'file_name' => 'nullable',
            'course_id' => 'nullable',
        ]);

        $data['course_id'] = $chapter->course_id;
    

        $path = $request->file('video')->store('videos', ['disk' =>'uploads']);
        $data['video']=$path;
        $data['video_name'] =$request->file('video')->getClientOriginalName();
    
        
        if($request->file('file')){
            $path_file = $request->file('file')->store('videos', ['disk' =>'uploads']);
            $data['file']=$path_file;
            $data['file_name'] =$request->file('file')->getClientOriginalName();
        }

        
        $lesson=$chapter->lessons()->create($data);

        $course_id=$chapter->course_id;
        $course = Course::where('id' , $course_id)->first();
       
            $user=$course->tranier;
      
        
        $student=$course->users()->get();
        
        Notification::send($student, new NewLessonNotification($lesson , $user));

        return redirect()->route('lessons.index', $chapter)->with('success','Lesson created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('trainer.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Lesson $lesson)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'video'=> 'nullable|file|mimetypes:video/mp4',
            'file' => 'nullable',
            'video_name' => 'nullable',
            'file_name' => 'nullable',
            'course_id' => 'nullable'
        ]);

        $data['course_id'] =$lesson->course_id;
        
    $video=$lesson->video;
        if ($request->file('video')){ 

            Storage::disk('uploads')->delete('/' . $video);
            $path = $request->file('video')->store('videos', ['disk' =>'uploads']);
            $data['video']=$path;
            $data['video_name'] = $request->file('video')->getClientOriginalName();

        }
        else{
            $data['video']=$video;
        
        }



        $file=$lesson->file;
        if($request->file('file')){

            if(!$lesson->file==null){
            
                Storage::disk('uploads')->delete('/' . $file);
            }
    
            $path_file = $request->file('file')->store('videos', ['disk' =>'uploads']);
            $data['file']=$path_file;
            $data['file_name'] =$request->file('file')->getClientOriginalName();
        }
        else{
            $data['file']=$file;
        }

        $lesson->update($data);
        return redirect()->back()->with('success' ,'lesson edited');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->back()->with('success' ,'lesson deleted');
    }

    public function trash(){
        $lessons=Lesson::onlyTrashed()->paginate();
        return view('trainer.lessons.trash',[
            'lessons' => $lessons,
        ]);
    }

    public function restore(Request $request , $id){
        $lesson = Lesson::onlyTrashed()->findOrFail($id);
        $lesson->restore(); 

        return redirect(route('lessons.trash'))
            ->with('success', 'Lesson restored!');

    }

    public function forceDelete($id){

        $lesson = Lesson::withTrashed()->findOrFail($id);
        $video=$lesson->video;
        Storage::disk('uploads')->delete('/' . $video);
        $file=$lesson->file;
        Storage::disk('uploads')->delete('/' . $file);
        $lesson->forceDelete();

        return redirect(route('lessons.trash'))
            ->with('success', 'Lesson deleted for ever!');

    }
}
