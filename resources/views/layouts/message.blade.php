@if (session('success'))
<div class="alert alert-success text-dark" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> {{session('success')}}
  </div>
@endif

@if ($errors)
  @foreach ($errors->all() as $error)
    <div class="alert alert-warning text-dark" id="success-warning">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <!-- <strong>Error! </strong> {{session('errors')}} -->
          <strong>Error! </strong> {{$error}}
    </div>
  @endforeach
@endif