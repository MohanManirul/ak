   
@extends('backend.layouts.master')

@section('title')
Employee Leave Create - Admin Panel
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
                    @if(isset($editData))
                        Edit Employee Leave
                        @else
                        Add Employee Leave
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employee_leave.index') }}">All Employee Leave</a>

                    <li>
                        <span>
                        @if(isset($editData))
                            Edit Employee Leave
                            @else 
                            Add Employee Leave
                        @endif
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
                <div class="card-body">
                    <h4 class="header-title">
                        @if(isset($editData))
                            Edit Employee Leave
                            @else
                            Add Employee Leave
                        @endif</h4> 

                    <form id="employee_leave" action="{{ (@$editData)?(route('admin.employee_leave.update', $editData->id)):route('admin.employee_leave.store') }}" method="POST">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="name">Employee Name <font style="color: red;">*</font></label>
                                <select name="employee_id" class="form-control form-control-sm">
                                   <option value="">Select Employee</option> 
                                   @foreach($employees as $employee)
                                   <option value="{{$employee->id}}" {{(@$editData->employee_id == $employee->id)?"selected":""}}>{{$employee->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                            	<label>Start Date <font style="color: red;">*</font></label>
                            	<input type="date" name="start_date" value="{{@$editData->start_date}}" class="form-control form-control-sm singledatepicker "  autocomplete="off"  placeholder="Start Date">
                            </div>

                            <div class="form-group col-md-4">
                            	<label>End Date <font style="color: red;">*</font></label>
                            	<input type="date" name="end_date" value="{{@$editData->end_date}}" class="form-control form-control-sm singledatepicker "  autocomplete="off" placeholder="End Date">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label>Purpose <font style="color: red;">*</font></label>
                                <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm">
                                   <option value="">Select Purpose</option> 
                                   @foreach($leave_purpose as $leave_purpose)
                                   <option value="{{$leave_purpose->id}}" {{(@$editData->leave_purpose_id == $leave_purpose->id)?"selected":""}}>{{$leave_purpose->name}}</option>
                                   @endforeach
                                   <option value="0">New Purpose</option>
                                </select>
                                <input type="text" name="name" id="add_others" class="form-control form-control-sm" style="display: none;" placeholder="Enter New Purpose">
                            </div>
                            
                        </div>
              <p>Date: <input type="text" id="datepicker" size="30"></p>          
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{(@$editData)?'Update':'Submit'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection
