@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="m-5">
            <h1>Order list:</h1>
        </div> <hr>
        <div class="p-5">
            @forelse ($orders as $order)
                <div class="container card shadow-sm p-5">
                    <div class="d-flex justify-content-between">
                        <h3>Order for <span class="fw-bold">{{$order->clientName}}</span> ( {{$order->uniqid}} )</h3>
                        @if(Auth::user()->role === 'admin')
                            <div class="text-danger text-uppercase align-self-center ">
                                {!! Form::open(['route'=>['delete.order', 'order'=>$order->id], 'method'=>'delete','class'=>'align-self-center',]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-lg btn-outline-danger align-self-center m-2'])!!}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
                    <div class="m-3">
                        <div class="alert alert-info">
                            <h5>Order status: <span class="fw-bold">{{$order->orderState}}</span></h5>
                        <div class="d-flex">
                            {!! Form::open(['route'=>['edit.order', 'order'=>$order->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                                <input type="hidden" name="orderState" value="processed"/>
                                {!! Form::submit('Processed', ['class'=>'btn btn-sm btn-outline-info align-self-center m-1'])!!}
                            {!! Form::close() !!}
                            {!! Form::open(['route'=>['edit.order', 'order'=>$order->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                                <input type="hidden" name="orderState" value="deliToBranch"/>
                                {!! Form::submit('Deli to branch', ['class'=>'btn btn-sm btn-outline-info align-self-center m-1'])!!}
                            {!! Form::close() !!}
                            {!! Form::open(['route'=>['edit.order', 'order'=>$order->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                                <input type="hidden" name="orderState" value="fulfilled"/>
                                {!! Form::submit('Fulfilled', ['class'=>'btn btn-sm btn-outline-info align-self-center m-1'])!!}
                            {!! Form::close() !!}
                            {!! Form::open(['route'=>['edit.order', 'order'=>$order->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                                <input type="hidden" name="orderState" value="deliToClient"/>
                                {!! Form::submit('Deli to client', ['class'=>'btn btn-sm btn-outline-info align-self-center m-1'])!!}
                            {!! Form::close() !!}
                            {!! Form::open(['route'=>['edit.order', 'order'=>$order->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                                <input type="hidden" name="orderState" value="closed"/>
                                {!! Form::submit('Closed', ['class'=>'btn btn-sm btn-outline-info align-self-center m-1'])!!}
                            {!! Form::close() !!}
                        </div>
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
            @empty
                <h5>No one user here!</h5>
            @endforelse
            <div class="d-flex justify-content-around m-5">
                {{$orders->links()}}    
            </div>    
        </div>
        <hr class="m-5">
        @include('litle.blog');
    </div>
@endsection
