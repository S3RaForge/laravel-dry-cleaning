@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Do you have any questions?</h1>
        <h2 class="text-center">Send form for us!</h2>
        
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @else        
            <div class="container mt-5">
                {!! Form::open() !!}
                    <div class="form-group mt-3">
                        {!! Form::label('name', 'Your name:'); !!}
                        {!! Form::text('name', null, ['class'=>'form-control '.($errors->has('name') ? ' is-invalid' : null)]); !!}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('message', 'Your message:'); !!}
                        {!! Form::textarea('message', null, ['class'=>'form-control '.($errors->has('message') ? ' is-invalid' : null), 'maxlength'=>'70']); !!}
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                    {!! Form::submit('Send message', ['class'=>'btn btn-info mt-3']) !!}
                {!! Form::close() !!}            
            </div>    
        @endif
        @include('litle.contact')
    </div>
@endsection
