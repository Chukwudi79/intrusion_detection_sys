@extends('layouts.app')

@section('extra-css')
        <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
@endsection

@section('page-title')
    Admin Payrol
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Manage <small>Companies</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                <th class="text-center" style="width: 80px;">S/N</th>
                <th>Name</th>
                <th style="width: 15%;">Email</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">Phone</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Description</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Created On</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
            @foreach ($companies as $company)
                <tr>
                    <td class="text-center fs-sm">{{$i++}}</td>
                    <td class="fw-semibold fs-sm">{{ucfirst($company->name)}}</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                         <span class="text-muted">{{$company->email}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">{{ucfirst($company->phone)}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">{{strtoupper($company->description)}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{date('jS M Y', strtotime($company->created_at))}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">  
                        <a target="_blank" 
                            class="btn btn-sm btn-outline-danger me-1 mb-3"
                            onclick="
                                if (confirm('Delete this?')) {
                                    event.preventDefault();
                                document.getElementById('remove-{{$company->id}}').submit();
                                } else {
                                    event.preventDefault();
                                }
                            ">
                            <i class="fa fa-fw fa-times me-1"></i> Delete
                        </a>
                        <form id="remove-{{$company->id}}" style="display: none"
                            action="{{ route('delete.company', $company->id) }}" method="post">
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