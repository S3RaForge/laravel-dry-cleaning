<div class="container border border-light p-5 mt-5 shadow bg-white">
    <h1 class="text-center mt-5">Customer Reviews</h1>
    <div class="d-flex justify-content-center">
        <hr class="mt-3" width="5%">
    </div>
    <div class="row m-5">
        @forelse ($reviews as $review)                
            <div class="col-sm">
                <a href="#" class="list-group-item border border-info rounded p-4">
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
                </a>
            </div>
        @empty
        <h3 class="text-center mt-5">Oops!</h3>
        <h4 class="text-center">It seems no one left a comment, you can be the first!</h4>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info m-3" href="{{url('new-review')}}">Leave your review</a>
        </div>
        @endforelse
    </div>
    <div class="container text-center">
        <a class="btn btn-outline-info m-3" href="{{url('review')}}">More reviews</a>
    </div>
</div>