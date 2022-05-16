@extends('layouts.backoffice')

@section('content')
    <form action="/product-categories/" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name"> 
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_category_id">Product Category</label>
            <select name="product_category_id" id="product_category_id">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection