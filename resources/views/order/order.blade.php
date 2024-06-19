@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <h1 class="text-center mt-5">Sorry, your order not found!</h1>
            <div class="alert alert-danger m-3 text-center">
                {{session()->get('message')}}
            </div>
            @include('litle.blog')
        @else
        <h1 class="text-center m-5">This is your order!</h1>
    </div>
    <div style="background-color:rgb(39, 53, 69)" class="p-5">
        <div class="container card shadow-sm p-5">
            <h3>Order for <span class="fw-bold">{{$order->clientName}}</span></h3>
            <div class="m-3">
                <div class="alert alert-info">
                    <h5>Order status: <span class="fw-bold">{{$order->orderState}}</span></h5>
                </div>
                <h5>Delivery address: <span class="fw-bold">{{$order->clientAddress}}</span></h5>
                <h5>customer phone number: <span class="fw-bold">{{$order->clientPhone}}</span></h5>
                <ul class="list-group">
                    <li class="list-group-item border border-info">
                        <h5>This is your services list:</h5>
                    </li>
                    @forelse ($order->services as $service)
                        <li class="list-group-item d-flex justify-content-between">
                            <a class="h5 text-decoration-none text-primary align-self-center" href="{{url('service', ['service'=>$service->slug])}}">{{$service->name}}</a>
                            <a class="btn btn-info text-light" href="{{url('service', ['service'=>$service->slug])}}">${{$service->price}}</a>
                        </li>
                    @empty
                        <li class="list-group-item"><h5 class="text-danger fw-bold">This order don't have any services!</h5></li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
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
