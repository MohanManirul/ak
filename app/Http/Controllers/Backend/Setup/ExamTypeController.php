<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use Carbon\Carbon;
use DB;
class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = ExamType::all(); 
        return view('backend.pages.exam-type.view-exam-type' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.exam-type.add-exam-type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // $insert = ExamType::insert([
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
            'name' => 'required|max:100|unique:exam_types',
        ]);
        // Create New Admin
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('admin.exam_type.index')->with('success', 'data added Successfully !');
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
       $editData = ExamType::find($id);
       return view('backend.pages.exam-type.add-exam-type' , compact('editData'));
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

        $data = ExamType::find($id);
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:exam_types,name,' .$data->id,
        ]);
        // Create New Admin
        
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.exam_type.index')->with('success', 'data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
