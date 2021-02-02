<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSection;
use Carbon\Carbon;
use DB;
class StudentSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = StudentSection::all(); 
        return view('backend.pages.student_section.view-section' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.student_section.add-section');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // $insert = StudentSection::insert([
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
            'name' => 'required|max:100|unique:student_sections',
        ]);
        // Create New Admin
        $data = new StudentSection();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('admin.student.section.index')->with('success', 'data added Successfully !');
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
       $editData = StudentSection::find($id);
       return view('backend.pages.student_section.add-section' , compact('editData'));
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

        $data = StudentSection::find($id);
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:student_sections,name,' .$data->id,
        ]);
        // Create New Admin
        
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.student.section.index')->with('success', 'data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
        $data = StudentSection::find($id);
        if (!is_null($data)) {
            $data->delete();
        }
        session()->flash('success', 'Data has been deleted !!');
        return back();
    }
}
