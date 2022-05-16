@extends('layouts.navbar')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <h5 class="card-title">{{ $product->name }}</h5>
                </td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}€</td>
            </tr>            
            @endforeach
        </tbody>
    </table>
    <p>Prezzo Totale: </p>
    <button class="btn btn-success">Acquista</button>
@endsection