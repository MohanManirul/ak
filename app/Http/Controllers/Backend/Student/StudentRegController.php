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
use App;
class StudentRegController extends Controller
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
        $data['session_id'] = StudentSession::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
        $data['allData'] = AssignStudent::where('session_id' ,$data['session_id'])->where('class_id' , $data['class_id'])->get(); 
        return view('backend.pages.students.view-student' , $data);
    }
    // Search Student 
    public function yearClassWise(Request $request){
        $data['sessions'] =  StudentSession::orderBy('id','desc')->get();
        $data['classes'] =  StudentClass::all();
        $data['session_id'] = $request->session_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('session_id' ,$request->session_id)->where('class_id' , $request->class_id)->get();
        return view('backend.pages.students.view-student' , $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sessions'] =  StudentSession::orderBy('id','desc')->get();
        $data['shifts'] =  StudentShift::all();
        $data['groups'] =  StudentGroup::all();
        $data['classes'] =  StudentClass::all();
        //dd($data);
        //dd($data['sessions']->toArray());
        return view('backend.pages.students.add-student' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       DB::transaction(function() use($request){

        $checkSession = StudentSession::find($request->session_id)->name;

        $student = User::where('usertype' , 'student')->orderBy('id','DESC')->first();
        //dd($student);
        if ($student == null) {
            $firstreg = 0;
            $studentId = $firstreg+1;
            if ($studentId<10) {
                 $id_no = '000'.$studentId;
             }elseif ($studentId<100) {
                 $id_no = '00'.$studentId;
             }elseif ($studentId<1000) {
                 $id_no = '0'.$studentId;
             }
        }else{
            $student = User::where('usertype' , 'student')->orderBy('id','DESC')->first()->id;
             $studentId = $student+1;
            if ($studentId<10) {
                 $id_no = '000'.$studentId;
             }elseif ($studentId<100) {
                 $id_no = '00'.$studentId;
             }elseif ($studentId<1000) {
                 $id_no = '0'.$studentId;
             }
        }

        $final_id_no = $checkSession.$id_no;
        $user = new User();
        $code = rand(0000,9999);
        $user->id_no = $final_id_no;
        $user->password = bcrypt($code);
        $user->code = $code;
        //dd($user->id_no);
        $user->name = $request->name;
        $user->usertype = 'student';
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;        
        $user->dob = date('Y-m-d' , strtotime($request->dob));
        //dd(($request->file('image')));
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image']=$filename;
        }
        $user->save();

        $assign_student = new AssignStudent();
        $assign_student->student_id = $user->id;
        $assign_student->session_id = $request->session_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = new DiscountStudent();
        $discount_student->assign_student_id = $assign_student->id;
        $discount_student->fee_category_id = '1';
        $discount_student->discount = $request->discount;
        $discount_student->save();
       
       });
       return redirect()->route('admin.student_reg.index')->with('success', 'data added Successfully !');
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
    public function editStudent($student_id)
    {
        $data['editData'] = AssignStudent::with(['student' ,'discount' ])->where('student_id' , $student_id)->first();
        //dd($data['editData']->toArray()); 
        $data['sessions'] =  StudentSession::orderBy('id','desc')->get();
        $data['shifts'] =  StudentShift::all();
        $data['groups'] =  StudentGroup::all();
        $data['classes'] =  StudentClass::all();
        //dd($data);
        //dd($data['sessions']->toArray());
        return view('backend.pages.students.add-student' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        DB::transaction(function() use($request , $student_id){
        $user = User::where('id',$student_id)->first();
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;        
        $user->dob = date('Y-m-d' , strtotime($request->dob));
        //dd(($request->file('image')));
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/student_images/'. $user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image']=$filename;
        }
        $user->save();

        $assign_student = AssignStudent::where('id',$request->id)->where('student_id' , $student_id)->first();
        $assign_student->session_id = $request->session_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = DiscountStudent::where('assign_student_id' ,$request->id )->first();
        $discount_student->discount = $request->discount;
        $discount_student->save();
       
       });
       return redirect()->route('admin.student_reg.index')->with('success', 'data updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function migration($student_id)
    {
        $data['editData'] = AssignStudent::with(['student' ,'discount' ])->where('student_id' , $student_id)->first();
        //dd($data['editData']->toArray()); 
        $data['sessions'] =  StudentSession::orderBy('id','desc')->get();
        $data['shifts'] =  StudentShift::all();
        $data['groups'] =  StudentGroup::all();
        $data['classes'] =  StudentClass::all();
        //dd($data);
        //dd($data['sessions']->toArray());
        return view('backend.pages.students.migration-student' , $data);
    }

    // Student Migration
     public function migrationStore(Request $request, $student_id)
    {
        DB::transaction(function() use($request , $student_id){
        $user = User::where('id',$student_id)->first();
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;        
        $user->dob = date('Y-m-d' , strtotime($request->dob));
        //dd(($request->file('image')));
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/student_images/'. $user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image']=$filename;
        }
        $user->save();

        $assign_student = new AssignStudent();
        // student_id remain same which is comes from when request
        $assign_student->student_id = $student_id; 
        $assign_student->session_id = $request->session_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = new DiscountStudent();
        $discount_student->assign_student_id = $assign_student->id;
        $discount_student->fee_category_id = '1';
        $discount_student->discount = $request->discount;
        $discount_student->save();
       
       });
       return redirect()->route('admin.student_reg.index')->with('success', 'Student Migrated Successfully !');
    }

   public function studentDetails($student_id){
              
        $data['details'] = AssignStudent::with(['student' ,'discount' ])->where('student_id' , $student_id)->first();
        $pdf = PDF::loadView('backend.pages.students.student-details-pdf' , $data);
        return $pdf->stream('student-details.pdf');
        //return $pdf->download('invoice.pdf');
        
   }


}