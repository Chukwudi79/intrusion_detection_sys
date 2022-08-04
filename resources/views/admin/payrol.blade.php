@extends('layouts.app')

@section('extra-css')
        <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
@endsection

@section('page-title')
    {{$data['user']->company->name}} Payroll
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
        <div class="block-header block-content-full">
            <h3 class="block-title">
                <span class="float-left">
                    Employee 
                    <small>Payroll</small>
                </span>
            </h3>
            <span class="float-right">
                <a href="{{route('add.payroll')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                <i class="fa fa-fw fa-plus me-1"></i> New Payroll
                </a>
            </span>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                <th class="text-center" style="width: 80px;">ID</th>
                <th>Name</th>
                <th style="width: 15%;">Grade Level</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">Salary</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Employment Date</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data['user']->staffs as $staff)
                <tr>
                    <td class="text-center fs-sm">{{$i++}}</td>
                    <td class="fw-semibold fs-sm">{{ucfirst($staff->name)}}</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                        Level <span class="text-muted">{{$staff->grade_level}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">&#8358;{{number_format($staff->salary)}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{date('jS M Y', strtotime($staff->employment_date))}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <a href="{{route('edit.payroll', $staff->id)}}" class="btn btn-sm btn-outline-primary me-1 mb-3">
                            <i class="fa fa-fw fa-edit me-1"></i> Edit
                        </a>    
                        <a target="_blank" 
                            class="btn btn-sm btn-outline-danger me-1 mb-3"
                            onclick="
                                if (confirm('Delete this?')) {
                                    event.preventDefault();
                                document.getElementById('remove-{{$staff->id}}').submit();
                                } else {
                                    event.preventDefault();
                                }
                            ">
                            <i class="fa fa-fw fa-times me-1"></i> Delete
                        </a>
                        <form id="remove-{{$staff->id}}" style="display: none"
                            action="{{ route('delete.payroll', $staff->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->

    </div>
    <!-- END Page Content -->
@endsection

@section('extra-script')
    
@endsection