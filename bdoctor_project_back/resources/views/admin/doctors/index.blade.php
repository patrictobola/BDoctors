@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $doctor->profile_photo) }}" class="card-img-top w-25" alt="Doctor's Photo">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Doctor {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                        <p class="card-text">{{ $doctor->description }}</p>
                    </div>
                </div>
                <div class="card my-3">
                    <h5 class="card-title m-2">Informazioni Personali</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Phone: {{ $doctor->phone_number }}</li>
                        <li class="list-group-item">Address: {{ $doctor->address }}</li>
                        <li class="list-group-item">Performances: {{ $doctor->performances }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Specializzazione</h5>
                        <p class="card-text">{{ $doctor->specializations[1]->name }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Curriculum Vitae</h5>
                            <p class="card-text">{{ $doctor->cv }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="card-body">
                <a href="{{ asset('storage/' . $doctor->cv) }}">Visualizza cv</a>
            </div>
        <a class="btn btn-success" href="{{ route('admin.doctor.edit', $doctor) }}">Modifica</a>
            <div class="div">
        <form action="{{route('admin.doctor.destroy', $doctor)}}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
    @endsection