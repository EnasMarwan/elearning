<?php

namespace App\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $user=Auth::user();
        $course= Course::findOrFail($id);
        $chapters =$course->chapters()->get();

        return view('trainer.chapters.index',[
            'course' => $course,
            'chapters'=>$chapters,
            'id' =>$id,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=Auth::user();
        $course= $user->courses()->findOrFail($id);
        return view('trainer.chapters.create',[
            'course' => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        if(Auth::user()->status == 'approve' || Config::get('fortify.guard' , 'admin')){
            $request->validate([
                'name'=>'required',
                'description' => 'required',
            ]);
            $course= Course::findOrFail($id);
            $course->chapters()->create($request->all());

            return redirect()->route('chapters.index', $id)->with('success','Chapter created.');
        }
        else{
            return redirect()->back()->with('danger', 'You cannot add a chapter at the moment!');
        }
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
    public function edit(Chapter $chapter)
    {
        return view('trainer.chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'name'=>'required',
            'description' => 'required',
        ]);

        $chapter->update($request->all());
        return redirect()->back()->with('success' ,'chapter edited');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->back()->with('success' ,'chapter deleted');
    }

    public function students(Course $course){
        $students=$course->users()->get();
        return view('trainer.courseStudent',compact('students' , 'course'));
    }
}
