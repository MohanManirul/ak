
@extends('backend.layouts.master')

@section('title')
Add Student - Admin Panel
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
                        Edit Student
                        @else
                        Add Student
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student_reg.index') }}">All Student</a>

                    <li>

                        <span>
                        @if(isset($editData))
                            Edit Student
                            @else 
                            Add Student
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
                            Edit Student
                            @else
                            Add Student
                        @endif</h4> 

                    <form id="myForm" action="{{ (@$editData)?(route('admin.student_reg.update', $editData->student_id)):route('admin.student_reg.store') }}" method="POST"  enctype="multipart/form-data">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="id" value="{{@$editData->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="session">Session <font style="color: red;">*</font></label>
                                <select name="session_id" class="form-control form-control-sm">
                                   <option value="">Select Session</option> 
                                   @foreach($sessions as $session)
                                   <option value="{{$session->id}}" {{(@$editData->session_id == $session->id)?"selected":""}}>{{$session->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="class">Class <font style="color: red;">*</font></label>
                                <select name="class_id" class="form-control form-control-sm">
                                   <option value="">Select Class</option> 
                                   @foreach($classes as $class)
                                   <option value="{{$class->id}}" {{(@$editData->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="name">Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Student Name" value="{{@$editData['student']['name']}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="fname">Father's Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter Fathers Name" value="{{@$editData['student']['fname']}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="mname">Mother's Name <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="mname" name="mname" placeholder="Enter Mother's Name" value="{{@$editData['student']['mname']}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="mobile">Mobile Number <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{@$editData['student']['mobile']}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="gender">Gender <font style="color: red;">*</font></label>
                                <select name="gender" class="form-control form-control-sm">
                                   <option value="">Select Gender</option> 
                                   <option value="Male" {{(@$editData['student']['gender']=='Male')?"selected":""}}>Male</option> 
                                   <option value="Female">Female</option> 
                                </select>
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="religion">Religion <font style="color: red;">*</font></label>
                                <select name="religion" class="form-control form-control-sm">
                                   <option value="">Select Religion</option> 
                                   <option value="Muslim"  {{(@$editData['student']['religion']=='Muslim')?"selected":""}}>Muslim</option> 
                                   <option value="Hindu"  {{(@$editData['student']['religion']=='Hindu')?"selected":""}}>Hindu</option> 
                                   <option value="Khristan"  {{(@$editData['student']['religion']=='Khristan')?"selected":""}}>Khristan</option> 
                                   <option value="Buddhist"  {{(@$editData['student']['religion']=='Buddhist')?"selected":""}}>Buddhist</option> 
                                   <option value="Other"  {{(@$editData['student']['religion']=='Other')?"selected":""}}>Other</option> 
                                </select>
                            </div>

                             <div class="form-group col-md-4 col-sm-8">
                                <label for="DoB">DoB <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm singledatepicker " autocomplete="off" id="dob" name="dob" placeholder="Click to Enter Date of Birth" value="{{@$editData['student']['dob']}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="Discount">Discount</label>
                                <input type="text" class="form-control form-control-sm" id="discount" name="discount" placeholder="Enter Discount" value="{{@$editData['discount']['discount']}}">
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="group">Group</label>
                                <select name="group_id" class="form-control form-control-sm">
                                   <option value="">Select Group</option> 
                                   @foreach($groups as $group)
                                   <option value="{{$group->id}}" {{(@$editData->group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-8">
                                <label for="class">Shift <font style="color: red;">*</font></label>
                                <select name="shift_id" class="form-control form-control-sm">
                                   <option value="">Select Shift</option> 
                                   @foreach($shifts as $shift)
                                   <option value="{{$shift->id}}" {{(@$editData->shift_id==$shift->id)?"selected":""}}>{{$shift->name}}</option>
                                   @endforeach
                                </select>
                            </div>

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
 <script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules:{
                "session_id":{
                    required:true,
                },
                "class_id":{
                    required:true,
                }
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
@endsection
