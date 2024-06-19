@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">{{ config('app.name') }} customer Reviews</h1>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info btn-lg m-3" href="{{url('new-review')}}">Leave your review</a>
        </div>

        @forelse ($reviews as $review)                
            <div class="m-5">
                <div class="list-group-item border border-info rounded p-4">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$review->guestName}}</h5>
                        <small class="text-muted">{{$review->updated_at}}</small>
                    </div>
                    <p class="mb-3 text-warning">
                        @for ($i = 0; $i < $review->rating; $i++)
                            &#9733;
                        @endfor
                    </p>
                    <small class="text-muted">{{$review->text}}</small>
                    @auth
                        @if(Auth::user()->role === 'admin')
                            {!! Form::open([
                                'route'=>['delete.review', 'review'=>$review->id], 
                                'method'=>'delete',
                                'class'=>'align-self-center',
                                ]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-lg btn-outline-danger align-self-center m-2'])!!}
                            {!! Form::close() !!}
                        @endif
                    @endauth
                </div>
            </div>
        @empty
            <h3 class="text-center mt-5">Oops!</h3>
            <h4 class="text-center">It seems no one left a comment, you can be the first!</h4>
        @endforelse
        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
@endsection