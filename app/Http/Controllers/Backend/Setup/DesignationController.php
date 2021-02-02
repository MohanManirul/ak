<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Carbon\Carbon;
use DB;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = Designation::all(); 
        return view('backend.pages.designation.view-designation' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.designation.add-designation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
         // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:designations',
        ]);
        // Create New Admin
        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('admin.designation.index')->with('success', 'data added Successfully !');
        return back();
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
    public function edit($id)
    {
       $editData = Designation::find($id);
       return view('backend.pages.designation.add-designation' , compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = Designation::find($id);
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:designations,name,' .$data->id,
        ]);
        // Create New Admin
        
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.designation.index')->with('success', 'data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
