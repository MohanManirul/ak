<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentSession;
use App\Models\StudentShift;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use App\User;
use DB;
use Image;
use File;
use PDF;
use App;
class EmployeeRegController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = User::where('usertype' ,'employee')->get(); 
        return view('backend.pages.employee.employee_reg.view-employee' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['designations'] =  Designation::all();
        $data['shifts'] =  StudentShift::all();
        return view('backend.pages.employee.employee_reg.add-employee' , $data);
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

        $checkSession = date('Ym', strtotime($request->join_date));
        $employee = User::where('usertype' , 'employee')->orderBy('id','DESC')->first();
        //dd($employee);
        if ($employee == null) {
            $firstreg = 0;
            $employeeId = $firstreg+1;
            if ($employeeId<10) {
                 $id_no = '000'.$employeeId;
             }elseif ($employeeId<100) {
                 $id_no = '00'.$employeeId;
             }elseif ($employeeId<1000) {
                 $id_no = '0'.$employeeId;
             }
        }else{
            $employee = User::where('usertype' , 'employee')->orderBy('id','DESC')->first()->id;
             $employeeId = $employee+1;
            if ($employeeId<10) {
                 $id_no = '000'.$employeeId;
             }elseif ($employeeId<100) {
                 $id_no = '00'.$employeeId;
             }elseif ($employeeId<1000) {
                 $id_no = '0'.$employeeId;
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
        $user->usertype = 'employee';
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->salary = $request->salary;
        $user->designation_id = $request->designation_id;
        $user->designation_id = $request->designation_id;
        $user->gender = $request->gender;
        $user->religion = $request->religion;        
        $user->join_date = date('Y-m-d' , strtotime($request->join_date));
        $user->dob = date('Y-m-d' , strtotime($request->dob));
        //dd(($request->file('image')));
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $filename);
            $user['image']=$filename;
        }
        $user->save();

        $employee_salary = new EmployeeSalaryLog();
        $employee_salary->employee_id = $user->id;
        $employee_salary->effected_date =date('Y-m-d',strtotime($request->join_date));
        $employee_salary->previous_salary = $request->salary;
        $employee_salary->present_salary = $request->salary;
        $employee_salary->increment_salary = '0';
        $employee_salary->save();

       });
       return redirect()->route('admin.employee_reg.index')->with('success', 'data added Successfully !');
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
        $data['editData'] = User::find($id);
        $data['designations'] =  Designation::all();
        $data['shifts'] =  StudentShift::all();
        return view('backend.pages.employee.employee_reg.add-employee' , $data);
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
        $employee = User::where('usertype' , 'employee')->orderBy('id','DESC')->first();

        $user = User::find($id);
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->designation_id = $request->designation_id;
        $user->designation_id = $request->designation_id;
        $user->gender = $request->gender;
        $user->religion = $request->religion;    
        $user->dob = date('Y-m-d' , strtotime($request->dob));
        //dd(($request->file('image')));
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/'. $user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $filename);
            $user['image']=$filename;
        }
        $user->save();
       return redirect()->route('admin.employee_reg.index')->with('success', 'Data Updated Successfully !');
    }


   public function details($id){
              
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('backend.pages.employee.employee_reg.employee-details-pdf' , $data);
        return $pdf->stream('employee-details.pdf');
        //return $pdf->download('invoice.pdf');
        
   }


}