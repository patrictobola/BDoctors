@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if ($doctor->id == $user_id)
            <div class="row">
                {{-- Foto profilo --}}
                <div class="col-md-5">
                    <div class="card">
                        <img src="{{ $doctor->profile_photo ? asset('storage/' . $doctor->profile_photo) : url('/user_placeholder.jpg') }}"class="card-img-top w-25"
                            alt="Doctor's Photo">
                    </div>
                </div>

                <div class="col-md-8">

                    {{-- Nome, cognome e descrizione --}}
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title">Doctor {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                            <p class="card-text">{{ $doctor->description }}</p>
                        </div>
                    </div>

                    {{-- Telefono, indirizzo e prestazioni --}}
                    <div class="card my-3">
                        <h5 class="card-title m-2">Informazioni Personali</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Phone: {{ $doctor->phone_number }}</li>
                            <li class="list-group-item">Address: {{ $doctor->address }}</li>
                            <li class="list-group-item">Performances: {{ $doctor->performances }}</li>
                        </ul>
                    </div>

                    {{-- Specializzazioni --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Specializzazioni</h5>
                            @foreach ($doctor->specializations as $specialization)
                                <p>{{ $specialization->name }}</p>
                            @endforeach
                        </div>
                    </div>

                    {{-- Curriculum --}}
                    @if ($doctor->cv)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Curriculum Vitae</h5>
                                <a href="{{ asset('storage/' . $doctor->cv) }}">Visualizza cv</a>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end mt-3">

                        {{-- Pulsante di modifica --}}
                        <a class="btn btn-success mx-2" href="{{ route('admin.doctor.edit', $doctor) }}">Modifica</a>
                    </div>
                </div>
            </div>
        @else
            <h1>Not found</h1>
        @endif
    </div>
@endsection
