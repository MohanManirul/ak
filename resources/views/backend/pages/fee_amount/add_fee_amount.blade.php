
@extends('backend.layouts.master')

@section('title')
Fee Amount Create - Admin Panel
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
                <ul>
                    <li class="page-title pull-left">Add Student Fee Amount</li>
                        <li><a class="btn btn-primary text-white mb-2" href="{{route('admin.student.fee_amount.index')}}"><i class="fa fa-list"></i> View Fee Amount List</a>
                    </li>
                </ul>
                <h4 >
                </h4>
                           
                    

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student.fee_amount.index') }}">All Fee Amount</a>

                    <li>
                        <span>
                            Add Student Fee Amount
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
                     <form id="addFeeAmount" action="{{route('admin.student.fee_amount.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="add_item">
                       <div class="form-row">
                           <div class="form-group col-md-5 col-sm-8">
                                <label>Fee Category</label>
                                <select name="fee_category_id" class="form-control">
                                    <option value="">Select Fee Category</option>
                                    @foreach($fee_categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                       </div>

                       <div class="form-row">
                           <div class="form-group col-md-5 col-sm-8">
                                <label>Class</label>
                                <select name="class_id[]" class="form-control">
                                    <option value="">Select Class</option>
                                     @foreach($classes as $cls)
                                    <option value="{{$cls->id}}">{{$cls->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-8">
                                <label>Fee Amount</label>
                                <input type="number" name="amount[]" class="form-control">
                            </div> 

                            <div class="form-group col-md-1" style="padding-top: 30px;">
                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            </div>

                       </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
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

    <!--- ----->
    <div style="visibility: hidden;">
        <div class="whole_extra_iten_add" id="whole_extra_iten_add">
            <div class="delete_whole_extra_iten_add" id="delete_whole_extra_iten_add">
                 <div class="form-row">
                   <div class="form-group col-md-5 col-sm-8">
                        <label>Class</label>
                        <select name="class_id[]" class="form-control">
                            <option value="">Select Class</option>
                             @foreach($classes as $cls)
                            <option value="{{$cls->id}}">{{$cls->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-8">
                        <label>Fee Amount</label>
                        <input type="number" name="amount[]" class="form-control">
                    </div> 

                    <div class="form-group col-md-2" style="padding-top: 30px;">
                       <div class="form-row">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                       </div>
                    </div>

               </div>
            </div>
        </div>        
    </div>
@endsection
