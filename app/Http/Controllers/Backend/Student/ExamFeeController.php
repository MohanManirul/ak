<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;
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
use App\Models\ExamType;
class ExamFeeController extends Controller
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
        $data['exam_types'] =  ExamType::all();

        return view('backend.pages.students.exam_fee.view_exam_fee' , $data);
    }
    
    public function getStudent(Request $request){
    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	if($session_id !='') {
    		$where[] = ['session_id' , 'like' , $session_id.'%'];
    	}
    	if($class_id !='') {
    		$where[] = ['class_id' , 'like',$class_id.'%'];
    	}
    	$allStudent = AssignStudent::with(['discount'])->where($where)->get();
    	$html['thsource'] = '<th>Sl</th>';
    	$html['thsource'] .= '<th>ID No</th>';
    	$html['thsource'] .= '<th>Student Name</th>';
    	$html['thsource'] .= '<th>Roll</th>';
    	$html['thsource'] .= '<th>Exam Fee</th>';
    	$html['thsource'] .= '<th>Discount Amount</th>';
    	$html['thsource'] .= '<th>Fee(This Student)</th>';
    	$html['thsource'] .= '<th>Action</th>';

    	foreach ($allStudent as $key => $v) {
    		$registrationfee = FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
    		$color ='success';
    		$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'TK'.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

    		$originalfee = $registrationfee->amount;
    		$discount = $v['discount']['discount'];
    		$discountablefee = $discount/100*$originalfee;
    		$finalfee = (float)$originalfee-(float)$discountablefee;

    		$html[$key]['tdsource'] .='<td>'.$finalfee.'TK'.'</td>';
    		$html[$key]['tdsource'] .='<td>';

    		$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$request->exam_type_id.'">Pay Slip</a>';
    		$html[$key]['tdsource'] .='</td>';
    	}
    	return response()->json(@$html);
    }

    public function paySlip(Request $request){
    	$student_id = $request->student_id;
    	$class_id = $request->class_id;
    	$data['exam_name'] = ExamType::where('id',$request->exam_type_id)->first()['name'];
    	 $data['details'] = AssignStudent::with(['student' ,'discount' ])->where('student_id' , $student_id)->where('class_id', $class_id)->first();
    	 //dd($data['details']);
        $pdf = PDF::loadView('backend.pages.students.exam_fee.exam_payslip_pdf' , $data);
        return $pdf->stream('student-exam_fee.pdf');
    }
}