@extends('layouts.navbar')

@section('content')
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div  class="form-group">
            <label for="name" class="form-label">Nome Prodotto</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="description" class="form-label">Descrizione Prodotto</label>
            <input name="description" id="description" class="form-control"></input>
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" id="image" class="form-control">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" name="price" id="price" min="0" class="form-control">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="quantity" class="form-label">Quantità</label>
            <input type="number" min="1" value="1" class="form-control" name="quantity">
            <select name="product_category_id" id="product_category_id" class="mt-1">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mt-2">Aggiungi Prodotto</button>
    </form>
@endsection