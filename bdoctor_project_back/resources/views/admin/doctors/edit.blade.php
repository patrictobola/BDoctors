@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="card">
            <form action="{{ route('admin.doctor.update', $doctor) }}" method="POST" novalidate>
                @method('PUT')
                @csrf
                <img src="{{ old('profile_photo', $doctor->profile_photo) }}" class="card-img-top w-25" alt="Doctor's Photo">
                <input class="form-control" type="file" id="profile_photo" name="profile_photo"
                    placeholder="cambia il file dell'immagine">
                <div class="card-body">
                    <h5 class="card-title">Doctor {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                    <p class="card-text">
                        <label for="description" class="form-label">descrizione</label>
                        <textarea class="form-control" id="description" name="description"
                            value="{{ old('description', $doctor->description) }}"></textarea>
                    </p>
                    <p class="card-text">
                        <label for="specializations" class="form-label">Specializzato in:</label>
                        <textarea class="form-control" id="specializations" name="specializations"
                            value="{{ old('specializations', $doctor->specializations[1]->name) }}"></textarea>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="phone_number" class="form-label">Phone</label>
                        <input type="number" id="phone_number" name="phone_number"
                            value="{{ old('phone_number', $doctor->phone_number) }}">
                    </li>
                    <li class="list-group-item">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" value="{{ old('address', $doctor->address) }}"></textarea>
                    </li>
                    <li class="list-group-item">
                        <label for="performances" class="form-label">Performances</label>
                        <textarea class="form-control" id="performances" name="performances"
                            value="{{ old('performances', $doctor->performances) }}"></textarea>
                    </li>
                </ul>
                <div class="card-body">

                    <label for="cv" class="form-label card-text">Cv</label>
                    <textarea class="form-control" id="cv" name="cv" value="{{ old('cv', $doctor->cv) }}"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
                </div>
            </form>
        </div>
    </div>
@endsection
