@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">PureTouch Dry Cleaning always think about clients!</h1> 
    </div>
    <div style="background-color:rgb(39, 53, 69)"> <hr>
        <div class="container p-5 d-flex justify-content-around">
            <a href="{{url('create')}}" class="btn btn-lg btn-outline-info p-5 m-5"><h5>I want create order</h5></a>
            <a href="{{url('find')}}" class="btn btn-lg btn-outline-info p-5 m-5"><h5>I want find my order</h5></a>
        </div>
        @guest
        @else
        <div class="container p-5 d-flex justify-content-around">
            <a href="{{url('order/managment')}}" class="btn btn-lg btn-outline-info p-5 m-5"><h5>Working with orders</h5></a>
        </div>    
        @endguest
        <h2 class="text-center mb-3 text-light">Delivery cost within the branch city is $19</h2>
        <h3 class="text-center mb-3 text-light">Delivery cost in the region - from $59</h3> <hr> 
    </div>
    <div class="container p-5">
        <h2 class="text-center">First-class dry cleaning with delivery.</h2>
        <h5>Dry cleaning of clothes with delivery is a popular service that not only allows you to get beautiful and clean clothes, but also saves time. The modern rhythm does not allow you to devote a lot of time to solving everyday matters, so the service of a courier who will pick up and return items to the dry cleaner will be a salvation. «PureTouch» offers professional clothing cleaning with the option of ordering courier services. A favorable price and thoughtful service are what the company provides.</h5>
        <h2 class="text-center">Features of «PureTouch»</h2>
        <h5>By ordering a service on the «PureTouch» website, you can use the courier service. All you have to do is hand over your items and then receive perfectly cleaned items. The workshop specialists will perform a number of specific manipulations to provide high-quality results to the client.</h5>
    </div>
    @include('litle.blog');
@endsection
