<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{

    public function index()
    {
$cat = new Category;
        $categories = Category::all();        
        return view('admin.categories.index', [
            'categories' => $categories,
            'cat' =>$cat
        ]);
    }

    public function show(){

        // $students =User::select('status')->courses()->where('status','approve')->get();
        // dd($students);
        $students= DB::table('course_user')->select('user_id')->where('status' , 'approve')->get();
        // foreach($students as $student){
        //     $user =User::findOrFail($student->user_id);
            
        //     dd($user->name);
        // }
        
        return view('admin.students.showSt');

        
    }

    public function create()
    {
        $category= new category;
        return view('admin.categories.create' , compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3' ,
        ]);
    
        $data= $request->all();
        $category = Category::create ($data );

        return redirect(route('categories.index'))
            ->with('success', 'Category Created successfully!');

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        
        $category->update($request->all());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated!');
    }


    public function destroy($id)
    {
    
        Category::destroy($id); 
        return redirect(route('categories.index'))
            ->with('success', 'Category deleted!');

    }


    public function trash(){
        $categories=Category::onlyTrashed()->paginate();
        return view('admin.categories.trash',[
            'categories' => $categories,
        ]);
    }

    public function restore(Request $request , $id){

        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore(); 

        return redirect(route('categories.trash'))
            ->with('success', 'Category restored!');

    }

    public function forceDelete($id){

        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect(route('categories.trash'))
            ->with('success', 'Category deleted for ever!');

    }


}