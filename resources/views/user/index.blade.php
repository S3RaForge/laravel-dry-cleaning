@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="m-5">
            <h1>User list:</h1>
        </div> <hr>
        <div class="p-5">
            @forelse ($users as $user)
                <div class="border border-info rounded p-3 m-2 d-flex justify-content-between">
                    @if($user->role != null)
                        <div class="text-danger text-uppercase align-self-center ">
                            <h5 class="border border-danger rounded shadow-sm p-1">{{$user->role}}</h5>
                        </div>
                    @endif
                    <div class="m-3 w-75">
                        <h5>{{$user->name}}</h5>
                        <p>{{$user->email}}</p>
                    </div>  
                    <div class="d-flex">
                        {!! Form::open(['route'=>['edit.user', 'user'=>$user->id], 'method'=>'put','class'=>'align-self-center',]) !!}
                            {!! Form::submit('Flip role', ['class'=>'btn btn-lg btn-outline-warning align-self-center m-2'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route'=>['delete.user', 'user'=>$user->id], 'method'=>'delete','class'=>'align-self-center',]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-lg btn-outline-danger align-self-center m-2'])!!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @empty
                <h5>No one user here!</h5>
            @endforelse
            <div class="d-flex justify-content-around m-5">
                {{$users->links()}}    
            </div>    
        </div>
        <hr class="m-5">
        @include('litle.blog');
    </div>
@endsection
