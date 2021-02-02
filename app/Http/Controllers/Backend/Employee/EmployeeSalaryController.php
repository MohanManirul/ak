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
class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = User::where('usertype' ,'employee')->get(); 
        return view('backend.pages.employee.employee_salary.view-employee-salary' , $data);
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
    public function storeSalary(Request $request ,$id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog;
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary ;
        $salaryData->effected_date = date('Y-m-d',strtotime($request->effected_date));
        $salaryData->save();
        return redirect()->route('admin.employee_salary.index')->with('success', 'Salary Incremented Successfully');
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
    // salary increment
    public function edit($id)
    {
        $data['editData'] = User::find($id);
        $data['designations'] =  Designation::all();
        $data['shifts'] =  StudentShift::all();
        return view('backend.pages.employee.employee_salary.add-employee-salary' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

   public function details($id){
              
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        //dd($data['salary_log']->toArray());
        return view('backend.pages.employee.employee_salary.employee-salary-details',$data);
        //$pdf = PDF::loadView('backend.pages.employee.employee_reg.employee-details-pdf' , $data);
        //return $pdf->stream('employee-details.pdf');
        //return $pdf->download('invoice.pdf');
        
   }


}