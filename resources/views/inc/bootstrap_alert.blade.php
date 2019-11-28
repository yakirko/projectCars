
@if(Session::has('success_message'))
<div class="row">
    <div class="col-md-12">
         <div class="alert alert-success success-message" role="alert">{{ Session::get('success_message') }}</div>
    </div>
</div>
@endif

@if($errors->any())
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

@if(Session::has('error_message'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            <ul>
                <li>
                    {{ Session::get('error_message') }}
                </li>
            </ul>
        </div>
    </div>
</div>
@endif