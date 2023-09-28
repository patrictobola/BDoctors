@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Specializzazione</h5>
                        @foreach ($doctor->specializations as $specialization)
                            <p>{{ $specialization->name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Curriculum Vitae</h5>
                        <p class="card-text">{{ $doctor->cv }}</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-end">
                    <a href="{{ asset('storage/' . $doctor->cv) }}">Visualizza cv</a>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class="btn btn-success mx-2" href="{{ route('admin.doctor.edit', $doctor) }}">Modifica</a>
                    <!-- FORM PER DELETE -->
                    <form action="{{ route('admin.doctor.destroy', $doctor) }}" method="POST" class="delete-form"
                        data-bs-toggle="modal" data-bs-target="#modal">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
