@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="m-5">
            <h1>Our dry cleaning provides many services!</h1>
            <h2>On this page you can familiarize yourself with them</h2>
        </div> <hr>
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{url('new-service')}}" class="btn btn-lg btn-info m-2">Create service</a>
            @endif
        @endauth
        <div class="p-5">
            @forelse ($services as $service)
                <div class="d-flex justify-content-between">
                    <a href="{{url('service', ['service'=>$service->slug])}}" class="w-100 nav-link border border-info shadow-sm rounded p-3 m-2 d-flex justify-content-between">
                        <h5 class="text-uppercase fw-bold font-monospace m-3 text-muted">{{$service->name}}</h5>
                        <div class="btn btn-outline-primary m-1 ">${{$service->price}}</div>
                    </a>
                    @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{url('service/edit', ['service'=>$service->slug])}}" class="btn btn-lg btn-outline-warning align-self-center m-2">Edit</a>
                        {!! Form::open([
                            'route'=>['delete.service', 'service'=>$service->slug], 
                            'method'=>'delete',
                            'class'=>'align-self-center',
                            ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-lg btn-outline-danger align-self-center m-2'])!!}
                        {!! Form::close() !!}
                        @endif
                    @endauth
                </div>
            @empty
                <h5>It seems we couldn't find any available services</h5>
                <h5>try visiting this page later</h5>
            @endforelse
            <div class="d-flex justify-content-around m-5">
                {{$services->links()}}    
            </div>    
        </div>
        <hr class="m-5">
        @include('litle.blog');
    </div>
@endsection
