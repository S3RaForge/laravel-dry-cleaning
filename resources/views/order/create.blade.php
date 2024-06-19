@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <h1 class="text-center mt-5">Your order been send</h1>
            <div class="alert alert-success m-3 text-center">
                <h3 class="text-center">Save this code: <span class="fw-bold">{{session()->get('uniqid')}}</span></h3>
                {{session()->get('message')}}
            </div>
            @include('litle.blog')
        @else
        <h1 class="text-center m-5">Create your order!</h1>
        <div class="card shadow-sm p-5">
            {!! Form::open() !!}
                    <div class="form-group mt-3">
                        {!! Form::label('clientName', 'Your name:'); !!}
                        {!! Form::text('clientName', null, ['placeholder'=>'Some Name','class'=>'form-control '.($errors->has('clientName') ? ' is-invalid' : null)]); !!}
                        @error('clientName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>  
                    <div class="form-group mt-3">
                        {!! Form::label('clientPhone', 'Your phone:'); !!}
                        {!! Form::text('clientPhone', null, ['placeholder'=>'+(987) 654-32-10','class'=>'form-control '.($errors->has('clientPhone') ? ' is-invalid' : null)]); !!}
                        @error('clientPhone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>   
                    <div class="form-group mt-3">
                        {!! Form::label('clientEmail', 'Your email:'); !!}
                        {!! Form::email('clientEmail', null, ['placeholder'=>'example@mail.com','class'=>'form-control '.($errors->has('clientEmail') ? ' is-invalid' : null)]); !!}
                        @error('clientEmail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>  
                    <div class="form-group mt-3">
                        {!! Form::label('clientAddress', 'Your address:'); !!}
                        {!! Form::text('clientAddress', null, ['placeholder'=>'XXXX Some Place, AB 12345-6789','class'=>'form-control '.($errors->has('clientAddress') ? ' is-invalid' : null)]); !!}
                        @error('clientAddress')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('services', 'Select services:'); !!}
                        {!! Form::select('services[]', $services, null, ['class'=>'form-control'.($errors->has('services[]') ? ' is-invalid' : null), 'multiple' => 'multiple']); !!}
                        @error('services[]')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {!! Form::hidden('uniqid', (uniqid().time())) !!}

                    {!! Form::submit('Create order', ['class'=>'btn btn-info mt-3']) !!}
                {!! Form::close() !!}
        </div>
        <h2 class="text-center mb-3 text-light">Delivery cost within the branch city is $150</h2>
        <h3 class="text-center mb-3 text-light">Delivery cost in the region - from $250</h3>
        @endif
        <div class="container p-5">
            <h2 class="text-center">First-class dry cleaning with delivery.</h2>
            <h5>Dry cleaning of clothes with delivery is a popular service that not only allows you to get beautiful and clean clothes, but also saves time. The modern rhythm does not allow you to devote a lot of time to solving everyday matters, so the service of a courier who will pick up and return items to the dry cleaner will be a salvation. «PureTouch» offers professional clothing cleaning with the option of ordering courier services. A favorable price and thoughtful service are what the company provides.</h5>
            <h2 class="text-center">Features of «PureTouch»</h2>
            <h5>By ordering a service on the «PureTouch» website, you can use the courier service. All you have to do is hand over your items and then receive perfectly cleaned items. The workshop specialists will perform a number of specific manipulations to provide high-quality results to the client.</h5>
        </div>
    </div>
@endsection
