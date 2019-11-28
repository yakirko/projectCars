@extends('master')

@section('content')
{{-- {{ Breadcrumbs::render('signin') }} --}}
<div class="row">
    <div class="col-12">
        <h1>Here You Signin With Your Account</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="email">* Email:</label>
            <input value="{{ old('email') }}" class="form-control" type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">* password:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <input name="submit" class="btn btn-primary btn-block" type="submit" value="Sign in">
        </form>
    </div>
</div>
@endsection