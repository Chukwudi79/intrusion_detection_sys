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
                <h3 class="block-title">Update <small>User</small></h3>
                <span class="float-right">
                    <a href="{{route('users')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> View Users
                    </a>
                </span>
            </div>
            <div class="block-content block-content-full">
                <form class="js-validation-signup" action="{{route('update.user', $user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row py-3">
                        
                        <div class="col-md-12">
                            <div class="mb-4">
                                <input id="name" type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" @if (Auth::user()->role_id == 1) readonly @endif  id="name" placeholder="User Name" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                <div class="mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" @if (Auth::user()->role_id == 1) readonly @endif  placeholder="Email" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <input id="phone" type="text" class="form-control form-control-lg form-control-alt @error('phone') is-invalid @enderror" @if (Auth::user()->role_id == 1) readonly @endif  placeholder="09083832832" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                <input id="password" type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="New Password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>

                                <div class="mb-4">
                                <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" placeholder="Confirm Password" name="password_confirmation"  autocomplete="new-password">
                                </div>

                                <div class="mb-4" @if (Auth::user()->role_id == 1) style="display: none" @endif >
                                    <select name="role_id" id="role_id" class="form-control form-control-lg form-control-alt">
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}"
                                        @if ($user->role_id == $role->id)
                                            selected
                                        @endif 
                                        >{{$role->type}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    
                        <div class="row mb-4">
                            <div class="col-md-12 col-xl-12">
                                <button type="submit" class="btn w-100 btn-alt-secondary">
                                    <i class="fa fa-fw fa-edit me-1 opacity-50"></i> Update
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