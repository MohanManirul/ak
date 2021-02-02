
@extends('backend.layouts.master')

@section('title')
Student Page - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">All Student</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student_reg.index') }}">All Student</a></li>
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
                   <form action="{{route('admin.year_class_wise')}}" method="GET" id="myForm" enctype="multipart/formdata">
                       <div class="form-row">
                            
        <div class="form-group col-md-4 col-sm-8">
            <label for="session">Session <font style="color: red;">*</font></label>
            <select name="session_id" class="form-control form-control-sm">
               <option value="">Select Session</option> 
               @foreach($sessions as $session)
               <option value="{{$session->id}}"  {{(@$session_id==$session->id)?"selected":""}}>{{$session->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group col-md-4 col-sm-8">
            <label for="class">Class <font style="color: red;">*</font></label>
            <select name="class_id" class="form-control form-control-sm">
               <option value="">Select Class</option> 
               @foreach($classes as $cls)
               <option value="{{$cls->id}}" {{(@$class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
               @endforeach
            </select>
        </div>
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success btn-sm" name="search" style="margin-top: 23px;">Search</button>  
            </div>

                       </div>
                   </form>
                </div>
                <div class="card-body">
                   @if(!@$search) 
                    @include('backend.layouts.partials.messages')
                    <h4 class="header-title float-left">Student List</h4>
                    <p class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.student_reg.create')}}"><i class="fa fa-plus-circle"></i> Add Student</a>   
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-bordered table-hover">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="2%">Sl</th>
                                    <th width="18%">Name</th>
                                    <th width="8%">ID No</th>
                                    <th width="8%">Roll</th>
                                    <th width="8%">Year</th>
                                    <th width="8%">Class</th>
                                    <th width="8%">Code</th>
                                    <th width="8%">Image</th>
                                    <th width="26%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key =>$value)
                               <tr class="{{$value->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['student']['name']}}</td>
                                    <td>{{$value['student']['id_no']}}</td>
                                    <td>{{$value->roll}}</td>
                                    <td>{{$value['student_session']['name']}}</td>
                                    <td>{{$value['fmodel_view_student_class']['name']}}</td>
                                    <td>{{$value['student']['code']}}</td>
<td>
    <img src="{{(!empty($value['student']['image']))?url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg')}}" style="width: 40px; height: 50px;">
</td>
    <td>
<a title="Edit" class="btn btn-success text-white" href="{{ route('admin.std_reg', $value->student_id) }}"><i class="fa fa-edit"></i></a>
<a title="Migration" class="btn btn-primary text-white" href="{{ route('admin.student.migration', $value->student_id) }}"><i class="fa fa-check"></i></a>
<a title="Details" target="_blank" class="btn btn-info text-white" href="{{ route('admin.student.details', $value->student_id) }}"><i class="fa fa-eye"></i></a>
    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                     @include('backend.layouts.partials.messages')
                    <h4 class="header-title float-left">Student List</h4>
                    <p class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.student_reg.create')}}"><i class="fa fa-plus-circle"></i> Add Student</a>   
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-bordered table-hover">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="2%">Sl</th>
                                    <th width="18%">Name</th>
                                    <th width="8%">ID No</th>
                                    <th width="8%">Roll</th>
                                    <th width="8%">Year</th>
                                    <th width="8%">Class</th>
                                    <th width="8%">Code</th>
                                    <th width="8%">Image</th>
                                    <th width="26%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key =>$value)
                               <tr class="{{$value->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['student']['name']}}</td>
                                    <td>{{$value['student']['id_no']}}</td>
                                    <td>{{$value->roll}}</td>
                                    <td>{{$value['student_session']['name']}}</td>
                                    <td>{{$value['fmodel_view_student_class']['name']}}</td>
                                    <td>{{$value['student']['code']}}</td>
                                    
<td>
    <img src="{{(!empty($value['student']['image']))?url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg')}}" style="width: 40px; height: 50px;">
<a title="Edit" class="btn btn-success text-white" href="{{ route('admin.std_reg', $value->student_id) }}"><i class="fa fa-edit"></i></a>
<a title="Promotion" class="btn btn-primary text-white" href="{{ route('admin.student.migration', $value->student_id) }}"><i class="fa fa-check"></i></a>
<a title="Details" target="_blank" class="btn btn-info text-white" href="{{ route('admin.student.details', $value->student_id) }}"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>


            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
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