@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="card">
            <img src="{{ $doctor->profile_photo }}" class="card-img-top w-25" alt="Doctor's Photo">
            <div class="card-body">
                <h5 class="card-title">Doctor {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                <p class="card-text">{{ $doctor->description }}</p>
                <p class="card-text">Specializzato in: {{ $doctor->specializations[1]->name }}</p>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Phone: {{ $doctor->phone_number }}</li>
                <li class="list-group-item">Address: {{ $doctor->address }}</li>
                <li class="list-group-item">Performances: {{ $doctor->performances }}</li>
            </ul>
            <div class="card-body">
                <p class="card-text">{{ $doctor->cv }}</p>
            </div>
        </div>
    </div>
@endsection
