@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">Find your order!</h1>
        <div class="card shadow-sm p-5">
            {!! Form::open() !!}
                    <div class="form-group mt-3">
                        {!! Form::label('uniqid', 'Enter your order id:'); !!}
                        {!! Form::text('uniqid', null, ['placeholder'=>'XXXXXXXXXXXXXXX','class'=>'form-control '.($errors->has('uniqid') ? ' is-invalid' : null)]); !!}
                        @error('uniqid')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>  
                    {!! Form::submit('find order', ['class'=>'btn btn-info mt-3']) !!}
                {!! Form::close() !!}
        </div>
        <h2 class="text-center mb-3 text-light">Delivery cost within the branch city is $150</h2>
        <h3 class="text-center mb-3 text-light">Delivery cost in the region - from $250</h3>
        <div class="container p-5">
            <h2 class="text-center">First-class dry cleaning with delivery.</h2>
            <h5>Dry cleaning of clothes with delivery is a popular service that not only allows you to get beautiful and clean clothes, but also saves time. The modern rhythm does not allow you to devote a lot of time to solving everyday matters, so the service of a courier who will pick up and return items to the dry cleaner will be a salvation. «PureTouch» offers professional clothing cleaning with the option of ordering courier services. A favorable price and thoughtful service are what the company provides.</h5>
            <h2 class="text-center">Features of «PureTouch»</h2>
            <h5>By ordering a service on the «PureTouch» website, you can use the courier service. All you have to do is hand over your items and then receive perfectly cleaned items. The workshop specialists will perform a number of specific manipulations to provide high-quality results to the client.</h5>
        </div>
    </div>
@endsection
