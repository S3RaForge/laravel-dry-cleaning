@extends('layouts.app')

@section('content')
    <div class="custom-div">
        <h1>Welcome to PureTouch Dry Cleaning!</h1>
        <div class="mt-5">
            <a href="{{url('order')}}" class="btn btn-info m-2 btn-lg">New order</a>
            <a href="{{url('blog')}}" class="btn btn-outline-info m-2 btn-lg">About us</a>
        </div>
    </div>
    <div class="container mt-5">
        @include('litle.review')
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Are you using dry cleaning services for the first time?</h1>
        <h2 class="text-center">We will help:</h2>
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold h5">
                <p>Acceptance of the order in our <a class="text-decoration-none text-info" href="{{url('order')}}">online</a> or via courier</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold h5">
                <p>Order payment</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold h5">
                <p>We inform you about the time of order implementation</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold h5">
                <p>Pick up things at the <a class="text-decoration-none text-info" href="{{url('branch')}}">branch</a> or receive them by courier</p>
            </li>
        </ul>
        
        <h1 class="text-center m-3">Professional dry cleaning</h1>
        <p class="h5 p-4 fw-medium">High-quality dry cleaning is the key to the cleanliness, beauty and safety of clothes, carpets, and fur products. If you want to hand over things to a professional service that cares not only about appearance, but also environmental friendliness, contact our company. Our specialists guarantee high-quality work, the use of only safe means, as well as loyal prices.</p>
        <p class="h5 p-4 fw-medium">Thanks to a wide range of relatively cheap services, each client will be able to order all the necessary repair and cleaning work in one place.</p>
        <p class="h5 p-4 fw-medium">Specialists will come to the specified address, pick up things, deliver them to our organization for the necessary work. This approach significantly saves the client's time. Also, if you urgently need to get a good outfit, you can order inexpensive instant express cleaning.</p>
        <p class="h5 p-4 fw-medium">PureTouch is a guarantee of product safety and cleanliness. We guarantee that as a result of our work, the product will look like new, have a pleasant smell, and a bright color.</p>
        <p class="h5 p-4 fw-medium">You can be convinced of our professionalism by reading good reviews about the work performed. Order dry cleaning of things from us to get an impeccable result, to return things to their former beauty and freshness.</p>
    </div>
    <div class="container mt-5">
        @include('litle.blog')
        @include('litle.contact')
    </div>
@endsection
