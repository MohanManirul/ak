
@extends('backend.layouts.master')

@section('title')
Roll generate Page - Admin Panel
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
                <h4 class="page-title pull-left">Roll Generate</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student_reg.index') }}">Roll Generate</a></li>
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
                    <h4>Search Criteria</h4>
<form id="rollGenerate" action="{{ (@$editData)?(route('admin.roll.generate.update', $editData->student_id)):route('admin.roll.generate.store') }}" method="POST"  enctype="multipart/form-data">
   @csrf
     @if(isset($editData))
        @method('PUT')
    @endif
      <div class="form-row">
        <div class="form-group col-md-4 col-sm-8">
            <label for="session">Session <font style="color: red;">*</font></label>
            <select name="session_id" id="session_id" class="form-control form-control-sm">
               <option value="">Select Session</option> 
               @foreach($sessions as $session)
               <option value="{{$session->id}}">{{$session->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group col-md-4 col-sm-8">
            <label for="class">Class <font style="color: red;">*</font></label>
            <select name="class_id" id="class_id" class="form-control form-control-sm">
               <option value="">Select Class</option> 
               @foreach($classes as $cls)
               <option value="{{$cls->id}}">{{$cls->name}}</option>
               @endforeach
            </select>
        </div>
            <div class="form-group col-md-4">
              <a id="search" class="btn btn-success btn-sm" name="search" style="margin-top: 23px;">Search</a>  
            </div>

                       </div><br/>
                       <div class="d-none" id="roll-generate">
                           <div class="col-md-12">
                               <table class="table table-striped table-bordered dt-responsive " style="width: 100%">
                                    <thead>
                                        <tr>
                                       <td>ID No</td>
                                       <td>Student Name</td>
                                       <td>Father's Name</td>
                                       <td>Gender</td>
                                       <td>Roll No</td>
                                   </tr>
                                    </thead>
                                    <tbody id="roll-generate-tr">
                                        
                                    </tbody>
                                   
                               </table>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-success btn-sm">Roll Generate</button>
                   </form>
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
    
    
@endsection