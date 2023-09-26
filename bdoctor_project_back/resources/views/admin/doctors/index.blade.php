@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="card">
            <img src="{{ asset('storage/' . $doctor->profile_photo) }}" class="card-img-top w-25" alt="Doctor's Photo">
            <div class="card-body">
                <h5 class="card-title">Doctor {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                <p class="card-text">{{ $doctor->description }}</p>
                <p class="card-text">Specializzato in:</p>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Phone: {{ $doctor->phone_number }}</li>
                <li class="list-group-item">Address: {{ $doctor->address }}</li>
                <li class="list-group-item">Performances: {{ $doctor->performances }}</li>
            </ul>
            <div class="card-body">
                <a href="{{ asset('storage/' . $doctor->cv) }}">Visualizza cv</a>
            </div>
        </div>
        <a class="btn btn-success" href="{{ route('admin.doctor.edit', $doctor) }}">Modifica</a>
    </div>
@endsection
