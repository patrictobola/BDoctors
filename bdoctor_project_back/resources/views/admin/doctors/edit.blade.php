@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if ($user_id == $doctor->id)
            @include('includes.form')
        @else
            <h1>Not found</h1>
        @endif
    </div>
@endsection
