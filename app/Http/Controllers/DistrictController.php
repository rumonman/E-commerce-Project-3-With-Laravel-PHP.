<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Division;

class DistrictController extends Controller
{    

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function show()
    {
    	$districts = District::orderBy('name','asc')->get();
    	return view('backend.district.index',compact('districts'));
    }

    public function create()
    {
    	 $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.district.create',compact('divisions'));
    }

    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'division_id' => 'required',
           ]);

    	  $district = new District();
    	  $district->name =$request->name;
    	  $district->division_id =$request->division_id;
    	  $district->save();

    	  return back()->with('success','Your District Insert Successfully!!');
    }

    public function edit($id)
    {
    	$divisions = Division::orderBy('priority','asc')->get();
    	$district = District::findOrFail($id);

    	if(!is_null($district )){
         return view('backend.district.edit',compact('divisions','district'));
    	}else{

    	}
    }

    public function update(Request $request, $id)
    {
    	  $validatedData = $request->validate([
          'name' => 'required',
          'division_id' => 'required',
           ]);

    	  $district = District::find($id);
    	  $district->name =$request->name;
    	  $district->division_id =$request->division_id;
    	  $district->save();

    	  return back()->with('update','Your District Update Successfully!!');
    }

     public function delete($id)
    {
    	$district= District::find($id);
    	if(!is_null($district)){
                 $district->delete();
    		    }

    	return back()->with('delete','Your District Delete Successfully!!');
    }
}
