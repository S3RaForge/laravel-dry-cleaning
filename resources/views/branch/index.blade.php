@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">Branches of PureTouch Dry Cleaning</h1> <hr>
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{url('new-branch')}}" class="btn btn-lg btn-info m-2">Create branch</a>
            @endif
        @endauth
        <div class="p-5 d-flex justify-content-around">
            @forelse ($branches as $branch)
                <div class="card" style="width: 340px;">
                    <div class="card-body">
                        {!! $branch->googleMapHtml !!}
                        <h5 class="card-title">{{$branch->name}}</h5>
                        <p class="card-text">This branch working from {{$branch->openTime}} to {{$branch->closeTime}}</p>
                        <a href="{{url('branch', ['branch'=>$branch->slug])}}" class="btn btn-info w-100">{{$branch->address}}</a>
                        @auth
                            @if(Auth::user()->role === 'admin') 
                                <div class="d-flex justify-content-between m-1 p-2">
                                    <a href="{{url('branch/edit', ['service'=>$branch->slug])}}" class="btn btn-lg btn-warning align-self-center w-50">Edit</a>
                                    {!! Form::open([
                                        'route'=>['delete.branch', 'branch'=>$branch->slug], 
                                        'method'=>'delete',
                                        'class'=>'align-self-center',
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-lg btn-danger align-self-center'])!!}
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <h5>It seems we couldn't find any available branches<br>
                try visiting this page later</h5>
            @endforelse
        </div>
        <div class="d-flex justify-content-around">
            {{$branches->links()}}    
        </div>       
        @include('litle.blog');
    </div>
@endsection
