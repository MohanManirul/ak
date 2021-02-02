
@extends('backend.layouts.master')

@section('title')
Manage Monthly Fee Page - Admin Panel
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
                <h4 class="page-title pull-left">Monthly Fee</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student_reg.index') }}">Monthly Fee</a></li>
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
      <div class="form-row">
        <div class="form-group col-md-3 col-sm-8">
            <label for="session">Session <font style="color: red;">*</font></label>
            <select name="session_id" id="session_id" class="form-control form-control-sm">
               <option value="">Select Session</option> 
               @foreach($sessions as $session)
               <option value="{{$session->id}}">{{$session->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group col-md-3 col-sm-8">
            <label for="class">Class <font style="color: red;">*</font></label>
            <select name="class_id" id="class_id" class="form-control form-control-sm">
               <option value="">Select Class</option> 
               @foreach($classes as $cls)
               <option value="{{$cls->id}}">{{$cls->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group col-md-3 col-sm-8">
            <label for="class">Month <font style="color: red;">*</font></label>
            <select name="month" id="month" class="form-control form-control-sm">
               <option value="">Select Month</option> 
               <option value="January">January</option>
               <option value="February">February</option>
               <option value="March">March</option>
               <option value="April">April</option>
               <option value="May">May</option>
               <option value="June">June</option>
               <option value="July">July</option>
               <option value="August">August</option>
               <option value="September">September</option>
               <option value="October">October</option>
               <option value="November">November</option>
               <option value="December">December</option>               
            </select>
        </div>
            <div class="form-group col-md-3">
              <a id="searchmfee" class="btn btn-success btn-sm" name="search" style="margin-top: 23px;">Search</a>  
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
                </div>
                <div class="card-body">
                  <div id="DocumentResults"></div>
                  <script id="document-template" type="text/x-handlebars-template">
                    <table class="table-sm table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr>
                          @{{{thsource}}}
                        </tr>
                      </thead>
                      <tbody>
                        @{{#each this}}
                        <tr>
                          @{{{tdsource}}}
                        </tr>
                        @{{/each}}
                      </tbody>
                    </table>
                  </script>
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