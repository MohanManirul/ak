<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentSession;
use App\Models\StudentShift;
use App\User;
use DB;
use Image;
use File;
use PDF;
class StudentRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sessions'] =  StudentSession::orderBy('id','desc')->get();
        $data['classes'] =  StudentClass::all();
        return view('backend.pages.students.roll_generate.view_roll_generate' , $data);
    }

    public function getStudent(Request $request){
        $allData= AssignStudent::with(['student'])->where('session_id' ,$request->session_id)->where('class_id',$request->class_id)->get();
        //dd($getStudent->toArray());
        return response()->json($allData);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session_id = $request->session_id; 
        $class_id = $request->class_id;
        if ($request->student_id !=null) {
             for ($i=0; $i <count($request->student_id) ; $i++) { 
                 AssignStudent::where('session_id',$session_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
             }
         } else{
            return redirect()->back()->with('error','Sorry! There are no student ');
         }
         return redirect()->back()->with('success', 'Well done! successfully roll generated');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
