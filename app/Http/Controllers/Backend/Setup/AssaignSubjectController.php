<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssaignSubject;
use App\Models\StudentClass;
use App\Models\Subject;
use Carbon\Carbon;
use DB;
class AssaignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AssaignSubject::select('class_id')->groupBy('class_id')->get(); 
        //dd($data);
        return view('backend.pages.assign_subject.view_assign_subject' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.pages.assign_subject.add_assign_subject' ,$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $subjectCount = count($request->subject_id);
        //dd($countClass);
            if ($subjectCount !=NULL) {
                for ($i=0; $i < $subjectCount; $i++) { 
                    $assign_subject = new AssaignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save();
                }
            }

        return redirect()->route('admin.assign_subject.index')->with('success', 'data added Successfully !');
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
    public function edit($class_id)
    {
        $data['editData'] = AssaignSubject::where('class_id',$class_id)->orderBy('class_id','asc')->get();
        //dd($data['editData']->toArray());
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
       return view('backend.pages.assign_subject.edit_assign_subject' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        //dd($request->class_id);
        if ($request->subject_id == NULL) {
            return redirect()->back()->with('error', 'Sorry ! you do not select any class');
        }else{
             AssaignSubject::where('class_id' ,$class_id)->delete();
             $subjectCount = count($request->subject_id);
            //dd($countSubject);
                for ($i=0; $i < $subjectCount; $i++) { 
                    $assign_subject = new AssaignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save();
                }
            
        }
        return redirect()->route('admin.assign_subject.index')->with('success', 'Data Updated Successfully !');
    }

    public function assign_subject_details($class_id){
        //dd('ok');
        $data['editData'] = AssaignSubject::where('class_id',$class_id)->get();
        //dd($data['editData']->toArray());
       return view('backend.pages.assign_subject.details_assign_subject' , $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
