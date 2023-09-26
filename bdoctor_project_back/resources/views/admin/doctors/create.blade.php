@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('admin.doctor.store') }}">
            @csrf

            <div class="mb-3">
                <label for="specialization" class="form-label">Specialization</label>
                <select name="specialization" id="specialization">
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number">
            </div>
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Insert your profile photo</label>
                <input type="text" class="form-control" name="profile_photo" id="profile_photo">
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">Insert your CV</label>
                <input type="text" class="form-control" name="cv" id="cv">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="mb-3">
                <label for="performances" class="form-label">Performances</label>
                <textarea name="performances" class="form-control" id="performances" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
