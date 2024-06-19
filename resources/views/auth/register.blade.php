@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    {!! Form::open(['method'=>'post', 'route'=>'register']) !!}
                        @csrf
                        <div class="form-group mt-3">
                            {!! Form::label('name', 'Name:'); !!}
                            {!! Form::text('name', null, ['class'=>'form-control '.($errors->has('name') ? ' is-invalid' : null)]); !!}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            {!! Form::label('email', 'Email Address'); !!}
                            {!! Form::text('email', null, ['class'=>'form-control '.($errors->has('email') ? ' is-invalid' : null)]); !!}
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            {!! Form::label('password', 'Password:'); !!}
                            {!! Form::text('password', null, ['class'=>'form-control '.($errors->has('password') ? ' is-invalid' : null)]); !!}
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            {!! Form::label('password_confirmation', 'Confirm Password:'); !!}
                            {!! Form::text('password_confirmation', null, ['class'=>'form-control '.($errors->has('password_confirmation') ? ' is-invalid' : null)]); !!}
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {!! Form::submit('Update service', ['class'=>'btn btn-info mt-3']) !!}
                    {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
