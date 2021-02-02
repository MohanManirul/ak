
@extends('backend.layouts.master')

@section('title')
Edit Assign Subject - Admin Panel
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
                    <li class="page-title pull-left">Edit Assign Subject</li>
                        <li><a class="btn btn-primary text-white mb-2" href="{{route('admin.assign_subject.index')}}"><i class="fa fa-list"></i>Assign Subject List</a>
                    </li>
                </ul>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.assign_subject.index') }}">All Assign Subject</a>

                    <li  class="float-left"><span>Edit Assign Subject</span></li>
                     
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
                     <form id="assignSubjectForm" action="{{(route('admin.assign_subject.update', $editData['0']->class_id))}}" method="POST" enctype="multipart/form-data">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="add_item">
                       <div class="form-row">
                           <div class="form-group col-md-5 col-sm-8">
                                <label>Class</label>
                                <select name="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $cls)
                                    <option value="{{$cls->id}}" {{($editData['0']->class_id==$cls->id)?"selected": ""}}>{{$cls->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                       </div>
                       @foreach($editData as $edit)
                       <div class="delete_whole_extra_iten_add" id="delete_whole_extra_iten_add">
                       <div class="form-row">
                           <div class="form-group col-md-3 col-sm-8">
                                <label>Subject</label>
                                <select name="subject_id[]" class="form-control">
                                    <option value="">Select Subject</option>
                                     @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}" {{($edit->subject_id ==$subject->id)? "selected": "" }}>{{$subject->name}} </option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-2 col-sm-8">
                                <label>Full Mark</label>
                                <input type="number" name="full_mark[]" value="{{$edit->full_mark}}" class="form-control">
                            </div>
                            <div class="form-group col-md-2 col-sm-8">
                                <label>Pass Mark</label>
                                <input type="number" name="pass_mark[]" value="{{$edit->pass_mark}}" class="form-control">
                            </div>
                            <div class="form-group col-md-2 col-sm-8">
                                <label>Subjective Mark</label>
                                <input type="number" name="subjective_mark[]" value="{{$edit->subjective_mark}}" class="form-control">
                            </div> 

                            <div class="form-group col-md-2" style="padding-top: 30px;">
                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                            </div>

                       </div>
                   </div>
                       @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{(@$editData)?'Update':'Submit'}}</button>
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
                   <div class="form-group col-md-3 col-sm-8">
                        <label>Subject</label>
                        <select name="subject_id[]" class="form-control">
                            <option value="">Select Subject</option>
                             @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}} </option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group col-md-2 col-sm-8">
                        <label>Full Mark</label>
                        <input type="number" name="full_mark[]" class="form-control">
                    </div>
                    <div class="form-group col-md-2 col-sm-8">
                        <label>Pass Mark</label>
                        <input type="number" name="pass_mark[]" class="form-control">
                    </div>
                    <div class="form-group col-md-2 col-sm-8">
                        <label>Subjective Mark</label>
                        <input type="number" name="subjective_mark[]" class="form-control">
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
