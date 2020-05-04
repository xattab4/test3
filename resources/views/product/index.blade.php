@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-4 card-group">
                    <div class="card mb-4" style="width: 18rem;">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{$product->title}}" />
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->price}} $</p>
                        </div>
                      </div>
                </div>
            @empty
                <div class="col-12">    
                    <p class="lead text-center">Products empty :(</p>
                </div>
            @endforelse
        </div>

        {{$products->links()}}
    </div>
@endsection
