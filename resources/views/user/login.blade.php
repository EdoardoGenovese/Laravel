@extends('layouts.app')

@section('content')
    <form action="/login" method="POST">
        @csrf
        <div>
            <labele>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <labele>Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <button>Login</button>
        </div>
    </form>
@endsection