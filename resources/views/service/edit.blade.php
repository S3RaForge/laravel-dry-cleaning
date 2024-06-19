@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Update service data</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @else        
            <div class="container mt-5">
                {!! Form::open(['method'=>'put']) !!}
                    <div class="form-group mt-3">
                        {!! Form::label('name', 'Service name:'); !!}
                        {!! Form::text('name', $service->name, ['class'=>'form-control '.($errors->has('name') ? ' is-invalid' : null)]); !!}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('price', 'Service price:'); !!}
                        {!! Form::number('price', $service->price, ['step' => '0.01', 'class'=>'form-control '.($errors->has('price') ? ' is-invalid' : null)]); !!}
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('description', 'Service description:'); !!}
                        {!! Form::textarea('description', $service->description, ['class'=>'form-control description '.($errors->has('description') ? ' is-invalid' : null)]); !!}
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                    <script>
                        tinymce.init({
                            selector:'textarea.description',
                            width: 1200,
                            height: 300
                        });
                    </script>
                    {!! Form::submit('Update service', ['class'=>'btn btn-info mt-3']) !!}
                {!! Form::close() !!}            
            </div>    
        @endif
    </div>
@endsection
