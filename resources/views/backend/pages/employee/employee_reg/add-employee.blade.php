
@extends('backend.layouts.master')

@section('title')
Add Employee - Admin Panel
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
                        Edit Employee
                        @else
                        Add Employee
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employee_reg.index') }}">All Employee</a>

                    <li>

                        <span>
                        @if(isset($editData))
                            Edit Employee
                            @else 
                            Add Employee
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
                <div class="header-title float-left">
                        @if(isset($editData))
                            Edit Employee
                            @else
                            Add Employee
                        </div> @endif
                        @if(isset($editData))
                        <div class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.employee_reg.index')}}"><i class="fa fa-list"></i>  View Employee List</a>   
                    </div>
                    @endif
                <div class="card-body">
                <form id="addEmployeeForm" action="{{ (@$editData)?(route('admin.employee_reg.update', $editData->id)):route('admin.employee_reg.store') }}" method="POST"  enctype="multipart/form-data">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="name">Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Employee Name" value="{{@$editData->name}}">
                            </div>
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="session">Designation <font style="color: red;">*</font></label>
                                <select name="designation_id" class="form-control form-control-sm">
                                   <option value="">Select Designation</option> 
                                   @foreach($designations as $designation)
                                   <option value="{{$designation->id}}" {{(@$editData->designation_id == $designation->id)?"selected":""}}>{{$designation->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="fname">Father's Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter Fathers Name" value="{{@$editData->fname}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="mname">Mother's Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="mname" name="mname" placeholder="Enter Mother's Name" value="{{@$editData->mname}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="email">Email <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email Address" value="{{@$editData->email}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="mobile">Mobile <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{@$editData->mobile}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="address">Address <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Enter Employee Address" value="{{@$editData->address}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="gender">Gender <font style="color: red;">*</font></label>
                                <select name="gender" class="form-control form-control-sm">
                                   <option value="">Select Gender</option> 
                                   <option value="Male" {{(@$editData->gender=='Male')?"selected":""}}>Male</option> 
                                   <option value="Female" {{(@$editData->gender=='Female')?"selected":""}}>Female</option>
                                </select>
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="religion">Religion <font style="color: red;">*</font></label>
                                <select name="religion" class="form-control form-control-sm">
                                   <option value="">Select Religion</option> 
                                   <option value="Muslim"  {{(@$editData->religion=='Muslim')?"selected":""}}>Muslim</option> 
                                   <option value="Hindu"  {{(@$editData->religion=='Hindu')?"selected":""}}>Hindu</option> 
                                   <option value="Khristan"  {{(@$editData->religion=='Khristan')?"selected":""}}>Khristan</option> 
                                   <option value="Buddhist"  {{(@$editData->religion=='Buddhist')?"selected":""}}>Buddhist</option> 
                                   <option value="Other"  {{(@$editData->religion=='Other')?"selected":""}}>Other</option> 
                                </select>
                            </div>
                            
                             <div class="form-group col-md-4 col-sm-8">
                                <label for="DoB">DoB <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm singledatepicker " autocomplete="off" id="dob" name="dob" placeholder="Click to Enter Date of Birth" value="{{@$editData->dob}}">
                            </div>  
                            @if(!@$editData)
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="DoB">Join Date <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm singledatepicker " autocomplete="off" id="join_date" name="join_date" placeholder="Click to Enter Date of Birth" value="{{@$editData->join_date}}">
                            </div> 

                             <div class="form-group col-md-4 col-sm-8">
                                <label for="Salary">Salary <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="salary" name="salary" placeholder="Click to Enter Salary" value="{{@$editData->salary}}">
                            </div>
                            @endif
                            <div class="form-group col-md-4">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control  form-control-sm">
                            </div> 
                        </div>
                        
    <button type="submit" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">{{(@$editData)?'Update':'Submit'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection
