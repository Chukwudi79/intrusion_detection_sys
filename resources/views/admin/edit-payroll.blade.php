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
                <form class="js-validation-signup" action="{{route('update.payroll', $staff->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row py-3">
                        
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label" for="name">Employee's Name</label>
                                <input id="name" type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" id="name" placeholder="Admin Name" name="name" value="{{ $staff->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>

                               
                                <div class="mb-4">
                                <label class="form-label" for="salary">Employment Date</label>
                                <input id="employment_date" type="date" class="form-control form-control-lg form-control-alt @error('employment_date') is-invalid @enderror" name="employment_date" value="{{$staff->employment_date}}" required autocomplete="employment_date">

                                    @error('employment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>


                                <div class="mb-4">
                                    <label class="form-label" for="salary">Grade Level</label>
                                    <select name="grade_level" id="grade_level" class="form-control form-control-lg form-control-alt">
                                        <option value="1" @if ($staff->grade_level == 1) selected @endif > Level 1</option>  
                                        <option value="2" @if ($staff->grade_level == 2) selected @endif > Level 2</option>  
                                        <option value="3" @if ($staff->grade_level == 3) selected @endif > Level 3</option>  
                                        <option value="4" @if ($staff->grade_level == 4) selected @endif > Level 4</option>  
                                        <option value="5" @if ($staff->grade_level == 5) selected @endif > Level 5</option>  
                                        <option value="6" @if ($staff->grade_level == 6) selected @endif > Level 6</option>  
                                        <option value="7" @if ($staff->grade_level == 7) selected @endif > Level 7</option>  
                                        <option value="8" @if ($staff->grade_level == 8) selected @endif > Level 8</option>  
                                        <option value="9" @if ($staff->grade_level == 9) selected @endif > Level 9</option>  
                                        <option value="10" @if ($staff->grade_level == 10) selected @endif > Level 10</option>  
                                        <option value="11" @if ($staff->grade_level == 11) selected @endif > Level 11</option>  
                                        <option value="12" @if ($staff->grade_level == 12) selected @endif > Level 12</option>  
                                        <option value="13" @if ($staff->grade_level == 13) selected @endif > Level 13</option>  
                                        <option value="14" @if ($staff->grade_level == 14) selected @endif > Level 14</option>  
                                        <option value="15" @if ($staff->grade_level == 15) selected @endif > Level 15</option>  
                                        <option value="16" @if ($staff->grade_level == 16) selected @endif > Level 16</option>  
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
                            
                                <input id="salary" type="text" class="form-control form-control-lg form-control-alt @error('salary') is-invalid @enderror" placeholder="300,000" name="salary" value="{{ $staff->salary }}" required autocomplete="salary">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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