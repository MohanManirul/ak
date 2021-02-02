<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Carbon\Carbon;
use DB;
class StudentClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = StudentClass::all(); 
        return view('backend.pages.student_classes.view-class' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.student_classes.add-class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // $insert = StudentClass::insert([
        //     "name" =>$request->name,
        //     "created_at" => Carbon::now()
        // ]);
        // if ($insert) {
        //     return response()->json('success');

        // }else{
        //     return response()->json('error');
        // }

        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:student_classes',
        ]);
        // Create New Admin
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        session()->flash('success', 'Data added Successfully !!');
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
       $editData = StudentClass::find($id);
       return view('backend.pages.student_classes.add-class' , compact('editData'));
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

        $data = StudentClass::find($id);
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:student_classes,name,' .$data->id,
        ]);
        // Create New Admin
        
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.student.classes.index')->with('success', 'data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
        $data = StudentClass::find($id);
        if (!is_null($data)) {
            $data->delete();
        }
        session()->flash('success', 'Data has been deleted !!');
        return back();
    }
}
