<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function show()
    {
    	$categorys = Category::orderBy('id','desc')->get();
    	return view('backend.category.index',compact('categorys'));
    }

    public function create()
    {
    	$main_categorys = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
        return view('backend.category.create',compact('main_categorys'));
    }

    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
           ]);

    	  $category = new Category();
    	  $category->name =$request->name;
    	  $category->description =$request->description;
    	  $category->parent_id =$request->parent_id;

           if(($request->image)>0){
    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/categorys/'.$img);
    		Image::make($image)->resize(850, 800)->save($location);
    		$category->image=$img;
    		   }
    	    $category->save();

    	  return back()->with('success','Your Category Insert Successfully!!');
    }

    public function edit($id)
    {
    	$main_categorys = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
    	$category = Category::findOrFail($id);
    	if(!is_null($category )){
    	return view('backend.category.edit',compact('main_categorys','category'));
    	}

    }

    public function update(Request $request, $id)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
           ]);

    	  $category = Category::find($id);
    	  $category->name =$request->name;
    	  $category->description =$request->description;
    	  $category->parent_id =$request->parent_id;

           if(($request->image)>0){
             
             if(File::exists('frontend/img/categorys/'.$category->image)){
             	File::delete('frontend/img/categorys/'.$category->image);
             }

    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/categorys/'.$img);
    		Image::make($image)->resize(850, 800)->save($location);
    		$category->image=$img;
    		   }
    	    $category->save();

    	  return back()->with('update','Your Category Update Successfully!!');
    }

     public function delete($id)
    {
    	$category= Category::find($id);
    	if(!is_null($category)){

    		if($category->parent_id == NULL){
    			$sub_category = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();

    			foreach($sub_category as $sub){
                  if(File::exists('frontend/img/categorys/'.$sub->image)){
             	     File::delete('frontend/img/categorys/'.$sub->image);
                 }
                  $sub->delete();
    			}
    		    }

    		 if(File::exists('frontend/img/categorys/'.$category->image)){
             	File::delete('frontend/img/categorys/'.$category->image);
             }
    		$category->delete();
    	}
    	return back()->with('delete','Your Category Delete Successfully!!');
    }
}
