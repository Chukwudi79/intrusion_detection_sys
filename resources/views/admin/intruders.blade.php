@extends('layouts.app')

@section('extra-css')
        <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
@endsection

@section('page-title')
    {{$data['user']->company->name}} Intruders
@endsection
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
        <div class="block-header block-content-full">
            <h3 class="block-title">
                <span class="float-left">
                    Intrusions 
                    <small>Dictated</small>
                </span>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                <th class="text-center" style="width: 80px;">S/N</th>
                <th>Name</th>
                <th style="width: 15%;">Intrusion Type</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">From Ip</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">From Browser</th>
                <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">From Country</th> -->
                <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">From State</th> -->
                <th class="d-none d-sm-table-cell" style="width: 15%;">Attacked On</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Action Taken</th>
                </tr>
            </thead>
            <tbody>
            @php $i = 1 @endphp
            @foreach ($data['intruders'] as $intruder)
                <tr>
                    <td class="text-center fs-sm">{{$i++}}</td>
                    <td class="fw-semibold fs-sm">{{ucfirst($intruder->user->name)}}</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                        Level <span class="text-muted">{{$intruder->type}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">{{$intruder->ip_address}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{$intruder->browser_type}}</span>
                    </td>
                    <!-- <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{$intruder->country}}</span>
                    </td> -->
                    <!-- <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{--$intruder->state--}}</span>
                    </td> -->
                    <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{date('jS M Y', strtotime($intruder->created_at))}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        Sent e-mail and sms to (admin@admin.com, {{$intruder->user->phone}})
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