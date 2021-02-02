
@extends('backend.layouts.master')

@section('title')
Product Create - Admin Panel
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
                        Edit Product
                        @else
                        Add Product
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('setup.rahim_store.view') }}">All Product</a>

                    <li>

                        <span>
                        @if(isset($editData))
                            Edit Product
                            @else 
                            Add Product
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
                            Edit Product
                            @else
                            Add Product
                        @endif</h4> 
                        <a class="btn btn-success float-right btn-sm" href="{{route('setup.rahim_store.view')}}"><i class="fa fa-list"></i> Product List</a>
                    <form id="" action="{{ (@$editData)?(route('setup.rahim_store.update', $editData->id)):route('setup.rahim_store.store') }}" method="POST">
                       @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{@$editData->name}}">
            <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="price">Product Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price" value="{{@$editData->price}}">
            <font style="color: red">{{($errors->has('price')?($errors->first('price')): '')}}</font>
                            </div>
                            
                        </div> 

                        <div class="form-group col-md-4">
                                <label>Expire Date <font style="color: red;">*</font></label>
                                <input type="text" name="expire_date" value="{{date_format(date_create(@$editData->expire_date),'d-m-Y')}}" class="form-control form-control-sm singledatepicker "  autocomplete="off" placeholder="Expire Date">
                                <font style="color: red">{{($errors->has('expire_date')?($errors->first('expire_date')): '')}}</font>
                            </div>
                        
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{(@$editData)?'Update':'Submit'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection
