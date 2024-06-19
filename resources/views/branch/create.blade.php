@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $(".add-phone").click(function () {
            var phoneField = '<input type="text" name="phone[]" class="form-control mt-2" placeholder="Phone Number">';
            $(".phone-fields").append(phoneField);
        });
    });
    </script>
    <div class="container">
        <h1 class="text-center mt-5">Create new branch</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @else        
            <div class="container mt-5">
                {!! Form::open() !!}
                    <div class="form-group mt-3">
                        {!! Form::label('name', 'Branch name:'); !!}
                        {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : null)]); !!}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('phone[]', 'Phone Numbers:'); !!}
                        <div class="phone-fields">
                            {!! Form::text('phone[]', null, ['class' => 'form-control', 'placeholder'=>'Phone Number']) !!}
                        </div>
                        <button type="button" class="btn btn-success add-phone">Add Phone</button>
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('address', 'Branch address:'); !!}
                        {!! Form::text('address', null, ['step' => '0.01', 'class' => 'form-control ' . ($errors->has('address') ? ' is-invalid' : null)]); !!}
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <div class="form-group m-3 w-100">
                            {!! Form::label('openTime', 'Branch open time:'); !!}
                            {!! Form::time('openTime', null, ['step'=>'1','class' => 'form-control ' . ($errors->has('openTime') ? ' is-invalid' : null)]); !!}
                            @error('openTime')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group m-3 w-100">
                            {!! Form::label('closeTime', 'Branch close time:'); !!}
                            {!! Form::time('closeTime', null, ['step'=>'1','class' => 'form-control ' . ($errors->has('closeTime') ? ' is-invalid' : null)]); !!}
                            @error('closeTime')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('googleMapHtml', 'Google map frame:'); !!}
                        {!! Form::textarea('googleMapHtml', null, ['class' => 'form-control ' . ($errors->has('googleMapHtml') ? ' is-invalid' : null)]); !!}
                        @error('googleMapHtml')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {!! Form::submit('Create branch', ['class' => 'btn btn-info mt-3']) !!}
                {!! Form::close() !!}
            </div>    
        @endif
    </div>
@endsection
