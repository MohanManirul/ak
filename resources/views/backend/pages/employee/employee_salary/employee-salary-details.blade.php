
@extends('backend.layouts.master')

@section('title')
Employee Salary Details- Admin Panel
@endsection

@section('styles')
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">
                        Employee Salary Details
                </h4>


                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employee_salary.index') }}">All Employee</a>

                    <li>
                        <span>
                            Employee Salary Details
                </span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">

    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="header-title float-left">
                        Employee Salary Details
                        </div>
                        <div class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.employee_salary.index')}}"><i class="fa fa-list"></i>  View Employee Salary List</a>   
                    </div>
                <div class="card-body">
                    <strong>Employee Name : </strong>{{$details->name}} <br/> <strong>Employee ID No:</strong>{{$details->id_no}}<hr/>
                   <table id="dataTable" class="text-center table-bordered table-hover">
                       <thead>
                           <tr>
                                <th>Sl.</th>
                               <th>Previous Salary</th>
                               <th>Increment Salary</th>
                               <th>Present Salary</th>
                               <th>Effected Date</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($salary_log as $key => $value)
                           <tr>
                                @if($key =='0')
                                <td class="text-center" colspan='5'><strong>Joining Salary</strong>{{$value->previous_salary}}</td>
                                @else
                               <td>{{$key+1}}</td>
                               <td>{{$value->previous_salary}}</td>
                               <td>{{$value->increment_salary}}</td>
                               <td>{{$value->present_salary}}</td>
                               <td>{{date('d-m-Y',strtotime($value->effected_date))}}</td>
                               @endif
                           </tr>
                           @endforeach
                       </tbody>   
                   </table> 
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

<div class="load">
        <img src="{{asset('loading.gif')}}" class="img-fluid loading">
    </div>
@endsection
   