<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;

class DivisionController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function show()
    {
    	$divisions = Division::orderBy('priority','asc')->get();
    	return view('backend.division.index',compact('divisions'));
    }

    public function create()
    {
    	 
        return view('backend.division.create');
    }

    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'priority' => 'required',
           ]);

    	  $division = new Division();
    	  $division->name =$request->name;
    	  $division->priority =$request->priority;
    	  $division->save();

    	  return back()->with('success','Your Division Insert Successfully!!');
    }

    public function edit($id)
    {
    	
    	$division = Division::findOrFail($id);

    	if(!is_null($division )){
         return view('backend.division.edit',compact('division'));
    	}else{

    	}
    }

    public function update(Request $request, $id)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'priority' => 'required',
           ]);

    	  $division = Division::find($id);
    	  $division->name =$request->name;
    	  $division->priority =$request->priority;
    	  $division->save();

    	  return back()->with('update','Your Division Update Successfully!!');
    }

     public function delete($id)
    {
    	$division= Division::find($id);
    	if(!is_null($division)){

    		$districts = District::where('division_id',$division->id)->get();
    		foreach($districts as $district){
    			$district->delete();
    		    }
                 $division->delete();
    		    }

    	return back()->with('delete','Your Division Delete Successfully!!');
    }
}
