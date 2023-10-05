@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        @foreach ( $sponsors as $sponsor )
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">{{ $sponsor->name }}</div>
                    <div class="card-text"> </div>
                    <div class="card-text">€ {{ $sponsor->cost}}</div>
                    <a href="#" class="btn btn-primary">Attiva Sponsor</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection