
@extends('backend.layouts.master')

@section('title')
Student Group Create - Admin Panel
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
                        Edit Student Group
                        @else
                        Add Student Group
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student.group.index') }}">All Group</a>

                    <li>
                        <span>
                        @if(isset($editData))
                            Edit Student Group
                            @else 
                            Add Student Group
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
                            Edit Student Group
                            @else
                            Add Student Group
                        @endif</h4> 

                    <form id="" action="{{ (@$editData)?(route('admin.student.group.update', $editData->id)):route('admin.student.group.store') }}" method="POST">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="name">Group Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Group Name" value="{{@$editData->name}}">
            <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div>
                            
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
@endsection
