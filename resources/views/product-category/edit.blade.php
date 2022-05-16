@extends('layouts.backoffice')

@section('content')
    <form action="/product-categories/{{ $productCategory->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $productCategory->name }}"> 
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="product-category">Product Category</label>
            <select name="product-category" id="product_category_id">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">@if($category->id === $productCategory->product_category_id) selcted @endif{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-primary">Edit</button>
        </div>
    </form>
@endsection