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
        <div class="block block-rounded col-md-5">
            <div class="block-header block-header-default">
                <h3 class="block-title">New <small>User</small></h3>
                <span class="float-right">
                    <a href="{{route('users')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> View Users
                    </a>
                </span>
            </div>
            <div class="block-content block-content-full">
                <form class="js-validation-signup" action="{{route('add.user')}}" method="POST">
                    @csrf
                    <div class="row py-3">
                        
                        <div class="col-md-12">
                            <div class="mb-4">
                                <input id="name" type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" id="name" placeholder="Admin Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                <div class="mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <input id="phone" type="text" class="form-control form-control-lg form-control-alt @error('phone') is-invalid @enderror" placeholder="09083832832" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                <input id="password" type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="Password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>

                                <div class="mb-4">
                                <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="mb-4">
                                    <select name="role_id" id="role_id" class="form-control form-control-lg form-control-alt">
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->type}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    
                        <div class="row mb-4">
                            <div class="col-md-12 col-xl-12">
                                <button type="submit" class="btn w-100 btn-alt-success">
                                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Create
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