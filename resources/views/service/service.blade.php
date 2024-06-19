@extends('layouts.app')

@section('content')
    <div class="container"><br>
        <div class="p-5">
            <h1>{{$service->name}}</h1>
            <div class="p-5">
                {!! $service->description !!}
            </div>
            <a href="{{url('order')}}" class="btn btn-lg btn-outline-primary mt-5">${{$service->price}}</a>
        </div>
        @include('litle.review');
    </div>
@endsection
