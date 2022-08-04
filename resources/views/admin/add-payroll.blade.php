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
                <h3 class="block-title">New <small>Employeee</small></h3>
                <span class="float-right">
                    <a href="{{route('payroll')}}" class="btn btn-sm btn-outline-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> View Employees
                    </a>
                </span>
            </div>
            <div class="block-content block-content-full">
                <form class="js-validation-signup" action="{{route('add.payroll')}}" method="POST">
                    @csrf
                    <div class="row py-3">
                        
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label" for="name">Employee's Name</label>
                                <input id="name" type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" id="name" placeholder="Admin Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>

                               
                                <div class="mb-4">
                                <label class="form-label" for="salary">Employment Date</label>
                                <input id="employment_date" type="date" class="form-control form-control-lg form-control-alt @error('employment_date') is-invalid @enderror" name="employment_date" placeholder="Employment Date" required autocomplete="employment_date">

                                    @error('employment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>


                                <div class="mb-4">
                                    <label class="form-label" for="salary">Grade Level</label>
                                    <select name="grade_level" id="grade_level" class="form-control form-control-lg form-control-alt">
                                        <option value="1">Level 1</option>  
                                        <option value="2">Level 2</option>  
                                        <option value="3">Level 3</option>  
                                        <option value="4">Level 4</option>  
                                        <option value="5">Level 5</option>  
                                        <option value="6">Level 6</option>  
                                        <option value="7">Level 7</option>  
                                        <option value="8">Level 8</option>  
                                        <option value="9">Level 9</option>  
                                        <option value="10">Level 10</option>  
                                        <option value="11">Level 11</option>  
                                        <option value="12">Level 12</option>  
                                        <option value="13">Level 13</option>  
                                        <option value="14">Level 14</option>  
                                        <option value="15">Level 15</option>  
                                        <option value="16">Level 16</option>  
                                    </select>
                                </div>

                                @error('grade_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="salary">Salary</label>
                            
                                <input id="salary" type="text" class="form-control form-control-lg form-control-alt @error('salary') is-invalid @enderror" placeholder="300,000" name="salary" value="{{ old('salary') }}" required autocomplete="salary">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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