@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <h1 class="text-center mt-5">Your review has been sent!</h1>
            <div class="alert alert-success m-3 text-center">
                {{session()->get('message')}}
            </div>
            @include('litle.contact')
        @else    
            <h1 class="text-center m-5">Leave your review</h1>
            <div class="container m-5 p-5">
                {!! Form::open() !!}
                    <div class="form-group mt-3">
                        <div class="rating-area">
                            {!! Form::label('rating', 'Your rating:'); !!}<br>
                            <input class="form-check-input m-1" type="radio" id="star-5" name="rating" value="5">
                            <label class="form-check-label" for="star-5"> 5 <span class="text-warning">&#9733;</span></label><br>
                            <input class="form-check-input m-1" type="radio" id="star-4" name="rating" value="4">
                            <label class="form-check-label" for="star-4"> 4 <span class="text-warning">&#9733;</span></label><br>
                            <input class="form-check-input m-1" type="radio" id="star-3" name="rating" value="3">
                            <label class="form-check-label" for="star-3"> 3 <span class="text-warning">&#9733;</span></label><br>
                            <input class="form-check-input m-1" type="radio" id="star-2" name="rating" value="2">
                            <label class="form-check-label" for="star-2"> 2 <span class="text-warning">&#9733;</span></label><br>
                            <input class="form-check-input m-1" type="radio" id="star-1" name="rating" value="1">
                            <label class="form-check-label" for="star-1"> 1 <span class="text-warning">&#9733;</span></label><br>
                            @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror    
                        </div>
                    </div>  
                    <div class="form-group mt-3">
                        {!! Form::label('guestName', 'Your name:'); !!}
                        {!! Form::text('guestName', null, ['class'=>'form-control '.($errors->has('guestName') ? ' is-invalid' : null)]); !!}
                        @error('guestName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::label('text', 'Your message:'); !!}
                        {!! Form::textarea('text', null, ['class'=>'form-control '.($errors->has('text') ? ' is-invalid' : null), 'maxlength'=>'500']); !!}
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                    {!! Form::submit('Send', ['class'=>'btn btn-info mt-3']) !!}
                {!! Form::close() !!}
            </div>
        @endif
    </div> 
@endsection
