@extends('layouts.app')

@section('extra-css')
        <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
@endsection

@section('page-title')
    Admin Awareness
@endsection
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded row">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit <small>Awareness</small></h3>
                <span class="float-right">
                    <a href="{{route('awareness')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> All Awareness
                    </a>
                </span>
            </div>
            
                <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="options-container fx-item-rotate-r">
                            <img class="img-fluid" src="<?php echo asset("medias/$awareness->media_url")?>" alt="">
                            <div class="options-overlay bg-black-75">
                                <div class="options-overlay-content">
                                    <a class="btn btn-sm btn-danger" 
                                        target="_blank" 
                                        class="btn btn-sm btn-outline-danger me-1 mb-3"
                                        onclick="
                                            if (confirm('Delete this?')) {
                                                event.preventDefault();
                                            document.getElementById('remove-{{$awareness->id}}').submit();
                                            } else {
                                                event.preventDefault();
                                            }
                                        ">
                                    <i class="fa fa-pencil-trash me-1"></i> Delete
                                    </a>
                                    <form id="remove-{{$awareness->id}}" style="display: none"
                                        action="{{ route('delete.awareness', $awareness->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <form class="" action="{{route('update.awareness', $awareness->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row py-3">
                                
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="caption">Caption</label>
                                        <input id="caption" type="text" class="form-control form-control-lg form-control-alt @error('caption') is-invalid @enderror" value="{{$awareness->caption}}" placeholder="Caption here" value="{{ old('caption') }}" name="caption" required autocomplete="caption" autofocus>
                                        
                                        </div>
        
                                       
                                        <div class="mb-4">
                                        <label class="form-label" for="media">Media File</label>
                                        <input type="file" class="form-control form-control-lg form-control-alt @error('media') is-invalid @enderror" name="media" required autocomplete="media">
        
                                            @error('media')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        
                                        </div>
        
                                    </div>
                                </div>
        
                                <div class="mb-4">
                                    <label class="form-label" for="body">Message</label>
                                    
                                        <textarea id="body" type="text" class="form-control form-control-lg form-control-alt @error('body') is-invalid @enderror" name="body" required autocomplete="body">{{$awareness->body}}</textarea>
        
                                        @error('body')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            
                                <div class="row mb-4">
                                    <div class="col-md-12 col-xl-12">
                                        <button type="submit" class="btn w-100 btn-alt-secondary">
                                            <i class="fa fa-fw fa-edit me-1 opacity-50"></i> Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            
            
        </div>
        <!-- END Dynamic Table with Export Buttons -->
        


    </div>
<!-- END Page Content -->

@endsection

@section('extra-script')
    
@endsection