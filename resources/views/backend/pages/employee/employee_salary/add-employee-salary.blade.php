
@extends('backend.layouts.master')

@section('title')
Manage Employee Salary - Admin Panel
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
                        Employee Salary Increament
                </h4>


                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employee_salary.index') }}">All Employee</a>

                    <li>
                        <span>
                            Employee Salary Increament
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
                    <div class="header-title">
                            Employee Salary Increament
                       </div> 
                       <div class=" pull-right"><a href="{{ route('admin.employee_salary.index') }}"><button class="btn btn-primary"><i class="fa fa-list"></i> All Employee</button></a></div>
                    <form id="salary_increment" action="{{route('admin.employee_salary.storesalary', $editData->id)}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="incement_salary">Salary Amount</label>
                                <input type="text" class="form-control" id="increment_salary" name="increment_salary">
                            </div>
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="effected_date">Effected Date</label>
                                <input type="text" class="form-control singledatepicker" id="effected_date" name="effected_date" placeholder="Date" autocomplete="off">
                            </div>
                            <div><button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button></div>
                        </div>
                        
    
                    </form>
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
