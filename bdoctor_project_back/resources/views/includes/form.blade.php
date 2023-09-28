@if ($doctor->exists)
    <form method="POST" action="{{ route('admin.doctor.update', $doctor) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.doctor.store') }}" enctype="multipart/form-data">
@endif

@csrf

<div class="row">

    {{-- Campo foto profilo --}}
    <div class="col-6">
        <div class="mb-3">
            <label for="profile_photo" class="form-label">Foto profilo</label>
            <input type="file" accept=".jpeg,.jpg,.png"
                class="form-control @error('profile_photo') is-invalid @elseif(old('profile_photo')) is-valid @enderror"
                id="profile_photo" name="profile_photo" value="{{ old('profile_photo', $doctor->profile_photo) }}">
            @error('profile_photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Campo CV --}}
    <div class="col-6">
        <div class="mb-3">
            <label for="cv" class="form-label">Curriculum Vitae</label>
            <input type="file" accept=".pdf"
                class="form-control @error('cv') is-invalid @elseif(old('cv')) is-valid @enderror"
                id="cv" name="cv" value="{{ old('cv', $doctor->cv) }}">
            @error('cv')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Campi specifici dell'edit --}}
    @if ($doctor->exists)

        {{-- Campo specializzazioni --}}
        <p class="mt-4">Specializzazioni <span class="text-danger">*</span></p>
        <fieldset>
            @foreach ($specializations as $specialization)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                        id="{{ $specialization->name }}" name="specialization[]"
                        @foreach ($doctor->specializations as $doctor_spec) @if ($doctor_spec->id == $specialization->id) checked @endif @endforeach>
                    <label class="form-check-label" for="{{ $specialization->name }}">
                        {{ ucfirst($specialization->name) }}
                    </label>
                </div>
            @endforeach
            @error('specialization')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </fieldset>

        {{-- Campo indirizzo --}}
        <div class="col-4 mt-5">
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('address') is-invalid @elseif(old('address')) is-valid @enderror"
                    id="address" name="address" value="{{ old('address', $doctor->address) }}" required>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

    @endif

    {{-- Campo numero di telefono --}}
    <div class="col-2 mt-5">
        <div class="mb-3">
            <label for="phone_number" class="form-label">Numero di telefono</label>
            <input type="text" minlength="10" maxlength="10"
                class="form-control @error('phone_number') is-invalid @elseif(old('phone_number')) is-valid @enderror"
                id="phone_number" name="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-1"></div>

    {{-- Campo prestazioni --}}
    <div class="mt-4">
        <div class="mb-3">
            <label for="performances" class="form-label">Prestazioni</label>
            <textarea class="form-control" id="performances" name="performances" rows="5">{{ old('performances', $doctor->performances) }}</textarea>
        </div>
    </div>

    {{-- Campo prestazioni --}}
    <div class="mt-4">
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $doctor->description) }}</textarea>
        </div>
    </div>

    {{-- Bottoni --}}

    <div class="col-1">
        <button type="submit" class="btn btn-success">Salva</button>
    </div>

</div>
</form>
