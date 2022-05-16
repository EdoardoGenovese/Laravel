@extends('layouts.navbar')

@section('content')

    @foreach($products as $product)
        <div class="card mb-3" style="width: 18rem;">
            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p>{{ $product->price }}€</p>
                <p>Quantità: <input type="number" min="1" max="{{ $product->quantity }}" value="1"></input> di {{ $product->quantity }}</p>
                <button class="btn btn-primary">Aggiungi Al Carrello</button>
                <form class="d-inline" action="/products/{{ $product->id }}" method="POST">
                    @csrf()    
                    @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                </form>
                <a href="/products/{{ $product->id }}/edit" class="btn btn-success mt-2">Edit</a>
            </div>
        </div>
    @endforeach
    
@endsection