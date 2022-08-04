@extends('layouts.app')

@section('page-title')
    Admin Dashboard
@endsection
@section('content')

<!-- Hero -->
<div class="content">
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
    <div class="flex-grow-1 mb-1 mb-md-0">
        <h1 class="h3 fw-bold mb-2">
            @if (Auth::user()->role_id == 3)
                System Administrator
                @else
                {{ucfirst($data['user']->company->name)}}
            @endif
          - Dashboard
        </h1>
        <h2 class="h6 fw-medium fw-medium text-muted mb-0">
        Welcome <a class="fw-semibold" href="be_pages_generic_profile.html">{{strtok(Auth::user()->name, " ")}}</a>, everything looks great.
        </h2>
    </div> 
    
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row items-push">
    <div class="row items-push">
    <div class="col-sm-6 col-xxl-3">
        <!-- Pending Orders -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold">{{$data['intruders']}}</dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Intrusions</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="far fa-gem fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
            <span>View all</span>
            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
        <!-- END Pending Orders -->
    </div>
    <div class="col-sm-6 col-xxl-3">
        <!-- New Customers -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold">{{$data['alterators']}}</dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Alterations</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="far fa-user-circle fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
            <span>View all</span>
            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
        <!-- END New Customers -->
    </div>
    <div class="col-sm-6 col-xxl-3">
        <!-- Messages -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold">{{$data['users']->count()}}</dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Users</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="far fa-paper-plane fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
            <span>View all Members
            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
        <!-- END Messages -->
    </div>
    <div class="col-sm-6 col-xxl-3">
        <!-- Conversion Rate -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold">{{$data['user']['staffs']->count()}}</dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Employees</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="fa fa-chart-bar fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
            <span>View statistics</span>
            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
        <!-- END Conversion Rate-->
    </div>
    </div>
    <!-- END Overview -->


    @if (Auth::user()->role_id == 3)
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
            @foreach ($data['companies'] as $company)
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


    <!-- Recent Orders -->
        
    @else
    <div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Recent Users</h3>
    </div>
    <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
        <!-- Search Form -->
        <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
        <div class="push">
            <div class="input-group">
            <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search" name="one-ecom-orders-search" placeholder="Search all orders..">
            <span class="input-group-text bg-body border-0">
                <i class="fa fa-search"></i>
            </span>
            </div>
        </div>
        </form>
        <!-- END Search Form -->
    </div>
    <div class="block-content block-content-full">
        <!-- Recent Orders Table -->
        <div class="table-responsive">
        <table class="table table-hover table-vcenter">
        <thead>
                <tr>
                <th class="text-center" style="width: 80px;">ID</th>
                <th>Name</th>
                <th style="width: 15%;">Email</th>
                <th class="d-none d-sm-table-cell" style="width: 30%;">Role</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Unique ID</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Created On</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
            @foreach ($data['users'] as $staff)
                <tr>
                    <td class="text-center fs-sm">{{$i++}}</td>
                    <td class="fw-semibold fs-sm">{{ucfirst($staff->name)}}</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                         <span class="text-muted">{{$staff->email}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">{{ucfirst($staff->role->type)}}</span>
                    </td>
                    <td>
                        <span class="text-muted fs-sm">{{strtoupper($staff->unique_id)}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{date('jS M Y', strtotime($staff->created_at))}}</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <a href="{{route('edit.user', $staff->id)}}" class="btn btn-sm btn-outline-primary me-1 mb-3">
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
                            action="{{ route('delete.user', $staff->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <!-- END Recent Orders Table -->
    </div>
    <div class="block-content block-content-full bg-body-light">
        <!-- Pagination -->
        {{ $data['users']->links() }}
        <nav aria-label="Photos Search Navigation">
        <!-- <ul class="pagination pagination-sm justify-content-end mb-0">
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                Prev
            </a>
            </li>
            <li class="page-item active">
            <a class="page-link" href="javascript:void(0)">1</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)">2</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)">3</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)">4</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)" aria-label="Next">
                Next
            </a>
            </li>
        </ul> -->
        </nav>
        <!-- END Pagination -->
    </div>
    </div>
        
    @endif
    <!-- END Recent Orders -->
</div>
<!-- END Page Content -->

@endsection