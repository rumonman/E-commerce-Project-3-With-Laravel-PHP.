<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function show()
    {
    	$brands = Brand::orderBy('id','desc')->get();
    	return view('backend.brand.index',compact('brands'));
    }

    public function create()
    {
    	
        return view('backend.brand.create');
    }

    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
           ]);

    	  $brand = new Brand();
    	  $brand->name =$request->name;
    	  $brand->description =$request->description;
    	

           if(($request->image)>0){
    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/brands/'.$img);
    		Image::make($image)->resize(850, 800)->save($location);
    		$brand->image=$img;
    		   }
    	    $brand->save();

    	  return back()->with('success','Your Brand Insert Successfully!!');
    }

    public function edit($id)
    {
    	
    	$brand = Brand::findOrFail($id);

    	if(!is_null($brand )){

    	}
    	return view('backend.brand.edit',compact('brand'));
    	

    }

    public function update(Request $request, $id)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
           ]);

    	  $brand = Brand::find($id);
    	  $brand->name =$request->name;
    	  $brand->description =$request->description;
    	

           if(($request->image)>0){
             
             if(File::exists('frontend/img/brands/'.$brand->image)){
             	File::delete('frontend/img/brands/'.$brand->image);
             }

    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/brands/'.$img);
    		Image::make($image)->resize(850, 800)->save($location);
    		$brand->image=$img;
    		   }
    	    $brand->save();

    	  return back()->with('update','Your Brand Update Successfully!!');
    }

     public function delete($id)
    {
    	$brand= Brand::find($id);
    	if(!is_null($brand)){

    		    }

    		 if(File::exists('frontend/img/brands/'.$brand->image)){
             	File::delete('frontend/img/brands/'.$brand->image);
             }    		
             $brand->delete();
    	
    	return back()->with('delete','Your Brand Delete Successfully!!');
    }
}
