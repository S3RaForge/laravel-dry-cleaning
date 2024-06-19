@extends('layouts.app')

@section('content')
    <div class="container"><br>
        <div class="d-flex mt-5 shadow-lg p-5 rounded">
            <div class="border border-info rounded p-4 align-self-baseline">
                {!! $branch->googleMapHtml !!}
            </div>
            <div>
                <h1 class="m-4">{{$branch->name}}</h1> <hr class="border border-info">
                <div class="m-5">
                    <h5 class="mb-3">This branch working from <span class="fw-bold">{{$branch->openTime}}</span> to <span class="fw-bold">{{$branch->closeTime}}</span></h5>
                    <h5 class="mb-5">In address <span class="fw-bold">{{$branch->address}}</span></h5>
                    <ul class="list-group">
                        @forelse ($branch->branchPhones as $phone)
                            <li class="list-group-item">
                                <a class="h5 link-info link-underline link-underline-opacity-0 link-opacity-50-hover" href="tel:{{$phone->phone}}">{{$phone->phone}}</a>
                            </li>
                        @empty
                            <li class="list-group-item"><h5 class="text-danger fw-bold">This branch don't have any phone numbers!</h5></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        @include('litle.blog');
    </div>
@endsection
