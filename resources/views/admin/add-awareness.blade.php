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
        <div class="block block-rounded col-md-5">
            <div class="block-header block-header-default">
                <h3 class="block-title">New <small>Awareness</small></h3>
                <span class="float-right">
                    <a href="{{route('awareness')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> All Awareness
                    </a>
                </span>
            </div>
            <div class="block-content block-content-full">
                <form class="js-validation-signup" action="{{route('store.awareness')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row py-3">
                        
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label" for="caption">Caption</label>
                                <input id="caption" type="text" class="form-control form-control-lg form-control-alt @error('caption') is-invalid @enderror" placeholder="Caption here" value="{{ old('caption') }}" name="caption" required autocomplete="caption" autofocus>
                                
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
                            
                                <textarea id="body" type="text" class="form-control form-control-lg form-control-alt @error('body') is-invalid @enderror" name="body" required autocomplete="body">{{ old('body') }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                        <div class="row mb-4">
                            <div class="col-md-12 col-xl-12">
                                <button type="submit" class="btn w-100 btn-alt-secondary">
                                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->

    </div>
<!-- END Page Content -->

@endsection

@section('extra-script')
    
@endsection