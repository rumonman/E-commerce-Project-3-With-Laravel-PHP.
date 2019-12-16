<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Image;
use File;

class SliderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function show()
    {
    	$sliders = Slider::orderBy('priority','asc')->get();
    	return view('backend.slider.index',compact('sliders'));
    }


    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
          'title' => 'required',
          'image' => 'required|image',
          'priority' => 'required',
          'button_link' => 'nullable|url',
           ]);

    	  $slider = new Slider();
    	  $slider->title =$request->title;
    	  $slider->button_text =$request->button_text;
    	  $slider->button_link =$request->button_link;
    	  $slider->priority =$request->priority;

    	   if(($request->image)>0){
    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/sliders/'.$img);
    		Image::make($image)->resize(970, 250)->save($location);
    		$slider->image=$img;
    		   }

    	  $slider->save();

    	  return back()->with('success','Your Slider Insert Successfully!!');
    }


    public function update(Request $request, $id)
    {
    	  $validatedData = $request->validate([
         'title' => 'required',
          'image' => 'nullable|image',
          'priority' => 'required',
          'button_link' => 'nullable|url',
           ]);

    	  $slider = Slider::find($id);
    	   $slider->title =$request->title;
    	  $slider->button_text =$request->button_text;
    	  $slider->button_link =$request->button_link;
    	  $slider->priority =$request->priority;

    	    if(($request->image)>0){
             
             if(File::exists('frontend/img/sliders/'.$slider->image)){
             	File::delete('frontend/img/sliders/'.$slider->image);
             }

    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/sliders/'.$img);
    		Image::make($image)->resize(970, 250)->save($location);
    		$slider->image=$img;
    		   }

    	  $slider->save();

    	  return back()->with('update','Your Slider Update Successfully!!');
    }

     public function delete($id)
    {
    	$slider= Slider::find($id);
    	if(!is_null($slider)){

         if(File::exists('frontend/img/sliders/'.$slider->image)){
             	File::delete('frontend/img/sliders/'.$slider->image);
             }

           $slider->delete();
     }
     
    	return back()->with('delete','Your Slider Delete Successfully!!');
    }
}
