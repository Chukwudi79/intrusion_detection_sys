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
            <h3 class="block-title">Manage <small>Awareness</small></h3>
            <span class="float-right">
                <a href="{{route('create.awareness')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                <i class="fa fa-fw fa-plus me-1"></i> Create Awareness
                </a>
            </span>
        </div>
        <div class="block-content block-content-full">
            <!-- Advanced Gallery -->
          <div class="row g-sm items-push js-gallery push">
            
            @foreach ($data['awareness'] as $item)
                <div class="col-md-6 col-lg-6 col-xl-6 animated fadeIn">
                <div class="options-container fx-item-rotate-r">
                    <img class="img-fluid options-item" src="<?php echo asset("medias/$item->media_url")?>" alt="">
                    <div class="options-overlay bg-black-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 fw-normal text-white mb-1">{{$item->caption}}</h3>
                        <h4 class="h6 fw-normal text-white-75 mb-3">{{substr($item->body, 0,50)}}...</h4>
                        <a class="btn btn-sm btn-primary img-lightbox" href="medias/{{$item->media_url}}" target="_blank">
                        <i class="fa fa-search-plus me-1"></i> View
                        </a>
                        <a class="btn btn-sm btn-secondary" href="{{ route('edit.awareness', $item->id) }}">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
          <!-- END Advanced Gallery -->
        </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->

    </div>
    <!-- END Page Content -->

@endsection

@section('extra-script')
    
@endsection