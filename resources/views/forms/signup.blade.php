@extends('master')

@section('content')
{{-- {{ Breadcrumbs::render('signup') }} --}}
<div class="row">
  <div class="col-12">
    <h1>Here you can signup for new account</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <form action="" method="POST" novalidate="novalidate" autocomplete="off">
      @csrf
      <div class="form-group">
        <label for="name">* Name:</label>
        <input value="{{ old('name') }}" class="form-control" type="text" name="name" id="name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="email">* Email:</label>
      <input value="{{ old('email') }}" class="form-control" type="email" name="email" id="email">
      <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group">
        <label for="password">* Password:</label>
        <input class="form-control" type="password" name="password" id="password">
        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>  
      <div class="form-group">
        <label for="confirm-password">* Confirm Password:</label>
        <input class="form-control" type="password" name="password_confirmation" id="confirm-password">
      </div>  
      <input name="submit" class="btn btn-primary btn-block" type="submit" value="Sign up">    
    </form>
  </div>
</div>
@endsection