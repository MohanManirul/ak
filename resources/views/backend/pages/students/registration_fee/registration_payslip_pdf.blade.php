<!DOCTYPE html>
<html>
<head>
	<title>Student Details Info</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		h2 h3{
			margin:0;
			padding: 0;
		}
		.table{
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent; 
		}
		.table th,
		.table td{
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee226;

		}
		.table thead th{
				vertical-align: bottom;
				border-bottom: 2px solid #dee226;
			}
		.table tbody + tbody{
			border-top: 2px solid #dee226; 
		}
		.table .table{
			background-color: #fff; 
		}
		.table-bordered th,
		.table-bordered td{
			border: 1px solid #dee226;
		}
		.table-bordered thead th,
		.table-bordered thead td{
			border-bottom-width: 2px; 
		} 
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.table tr td{
			padding: 5px;
		}
		.table-bordered thead th, .table-bordered td .table-bordered th{
			boeder : 1px solid black !important;
		}
		.table-bordered thead th{
			background-color: #cacaca; 
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td class="text-center" width="63%">
							<h4><strong>ABC School</strong></h4>
							<h4><strong>Dhaka, Notun Bazar</strong></h4>
							<h5><strong>www.abcschool.com</strong></h5>
						</td>
						<!-- <td class="text-center"><img src="{{asset('upload/student_images/'.$details['student']['image'])}}" style="width: 100px; height: 100px;"></td> -->
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Student Registration Fee</h5>
			</div>
			<div class="col-md-12">
@php
	$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id', '3')->where('class_id', $details->claas_id)->first();	
				
	$originalfee = $registrationfee->amount;
	$discount = $details['discount']['discount'];
	$discountablefee = $discount/100*$originalfee;
	$finalfee = (float)$originalfee-(float)$discountablefee; 
@endphp
				<table border="1" width="100%">
					<thead>
						<tr>
							<td style="width: 50%">Student ID_NO</td>
							<td>{{$details['student']['id_no']}}</td>
						</tr>

						<tr>
							<td style="width: 50%">Roll No</td>
							<td>{{$details->roll}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Student Name</td>
							<td>{{$details['student']['name']}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Father's Name</td>
							<td>{{$details['student']['fname']}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Mother's Name</td>
							<td>{{$details['student']['mname']}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Session</td>
							<td>{{$details['student_session']['name']}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Class</td>
							<td>{{$details['fmodel_view_student_class']['name']}}</td>
						</tr>
						<tr>
							<td style="width: 50%">Registration Fee</td>
							<td>{{$originalfee}} TK</td>
						</tr>
						<tr>
							<td style="width: 50%">Discount Fee</td>
							<td>{{$discount}} %</td>
						</tr>
						<tr>
							<td style="width: 50%">Fee(This Student)</td>
							<td>{{$finalfee}} TK</td>
						</tr>
					</thead>
				</table>
				<i style="font-size:10px; float: right;">Print Date: {{date("d M Y")}}</i>
			</div><br/>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td style="width: 30%;"></td>
							<td style="width: 30%;"></td>
							<td style="width: 40%; text-align: center;">
								<hr style="border: solid 1px; width: 60%;color: #000;margin-bottom: 0px; ">
								<p style="text-align: center;">Principal/Headmaster</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>