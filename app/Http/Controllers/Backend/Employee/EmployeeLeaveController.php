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
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\User;
use DB;
use Image;
use File;
use PDF;
use App;
class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get(); 
        return view('backend.pages.employee.employee_leave.view-employee-leave' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] =  User::where('usertype','employee')->get();
        $data['leave_purpose'] =  LeavePurpose::all();
        return view('backend.pages.employee.employee_leave.add-employee-leave' , $data);
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
            if ($request->leave_purpose_id == '0') {
                $leavepurpose = new LeavePurpose();
                $leavepurpose->name = $request->name;
                $leavepurpose->save();
                $leave_purpose_id = $leavepurpose->id; 
            }else{
                $leave_purpose_id = $request->leave_purpose_id;
            }
            $employee_leave = new EmployeeLeave();
            $employee_leave->employee_id = $request->employee_id;
            $employee_leave->leave_purpose_id = $request->leave_purpose_id;
            $employee_leave->start_date = date('Y-d-m', strtotime($request->start_date));
            $employee_leave->end_date = date('Y-d-m', strtotime($request->end_date));
            $employee_leave->save();
       });
       return redirect()->route('admin.employee_leave.index')->with('success', 'data added Successfully !');
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
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] =  User::where('usertype','employee')->get();
        $data['leave_purpose'] =  LeavePurpose::all();
        return view('backend.pages.employee.employee_leave.add-employee-leave' , $data);
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
        
        DB::transaction(function() use($request){
            if ($request->leave_purpose_id == '0') {
                $leavepurpose = new LeavePurpose();
                $leavepurpose->name = $request->name;
                $leavepurpose->save();
                $leave_purpose_id = $leavepurpose->id; 
            }else{
                $leave_purpose_id = $request->leave_purpose_id;
            }
            $employee_leave = EmployeeLeave::find($id);
            $employee_leave->employee_id = $request->employee_id;
            $employee_leave->leave_purpose_id = $request->leave_purpose_id;
            $employee_leave->start_date = date('Y-d-m', strtotime($request->start_date));
            $employee_leave->end_date = date('Y-d-m', strtotime($request->end_date));
            $employee_leave->save();
       });
       return redirect()->route('admin.employee_leave.index')->with('success', 'data Updated Successfully !');
    }
}