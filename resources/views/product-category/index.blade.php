@extends('layouts.backoffice')

@section('content')
    @if(session('hasError'))
        <div>
            @if(session($action === 'destroy'))
                Action not allowed
            @endif
        </div>
    @endif
    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="/product-categories/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                        <form class="d-inline" action="/product-categories/{{ $category->id }}" method="POST">
                        @csrf()    
                        @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection