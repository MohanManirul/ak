
@extends('backend.layouts.master')

@section('title')
Student Group Page - Admin Panel
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
                <h4 class="page-title pull-left">All Group</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.student.group.index') }}">All Group</a></li>
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
                    @include('backend.layouts.partials.messages')
                    <h4 class="header-title float-left">Student Group List</h4>
                    <p class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.student.group.create')}}"><i class="fa fa-plus-circle"></i>  Add Student Group</a>   
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-bordered table-hover">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="2%">Sl</th>
                                    <th width="18%">Name</th>
                                    <th width="22%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key =>$value)
                               <tr class="{{$value->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>
                                <a title="Edit" class="btn btn-success text-white" href="{{ route('admin.student.group.edit', $value->id) }}"><i class="fa fa-edit"></i></a>

                                 <a class="btn btn-danger text-white" href="{{ route('admin.student.group.destroy', $value->id) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $value->id }}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <form id="delete-form-{{ $value->id }}" action="{{ route('admin.student.group.destroy', $value->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>

                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
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