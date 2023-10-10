@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="row g-0 m-4">
                        <div class="col-md-4">
                            {{-- Profile photo dashboard --}}
                            <img src="{{ $doctor->profile_photo ?? url('/user_placeholder.jpg') }}"class="card-img-top w-100"
                                alt="Doctor's Photo">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Dr. {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                                <p class="card-text">Specializzazione: {{ $doctor->specializations[0]->name }}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mt-4">
                                <hr>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <ul class="list-inline text-center">
                                            <li class="list-inline-item"><a href="#voti" class="btn btn-primary rounded-2">Voti</a></li>
                                            <li class="list-inline-item"><a href="#messaggi" class="btn btn-primary rounded-2">Messaggi</a></li>
                                            <li class="list-inline-item"><a href="#recensioni" class="btn btn-primary rounded-2">Recensioni</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="row g-0 m-4">
                        <div class="row">
                            <!-- Col per i Messaggi -->
                            <div class="col" id="messaggi">
                                <h5>Ultimi messagi ricevuti</h5>
                                <!-- Messages Accordions -->
                                <div id="accordion">
                                    @foreach ($messages as $message)
                                        @if ($message->doctor_id === $doctor->id)
                                            <div class="card mb-4">
                                                <div class="card-header" id="heading{{ $message->id }}">
                                                    <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                                        <span>Nome: {{ $message->name }} {{ $message->last_name }}</span>
                                                        <button class="btn btn-primary rounded-3" data-toggle="collapse" data-target="#collapse{{ $message->id }}">
                                                            Mostra di più
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $message->id }}" class="collapse" aria-labelledby="heading{{ $message->id }}" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p><strong>Email: </strong>{{ $message->email }}</p>
                                                        <p><strong>Contenuto: </strong>{{ $message->text }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="row g-0 m-4">
                        <div class="row">
                            <!-- Col per le Recensioni -->
                            <div class="col-md-8" id="recensioni">
                                <h5>Ultime recensioni ricevuti</h5>
                                <div class="mb-4">
                                    <!-- Aggiungiamo qui il contenuto per visualizzare le informazioni sui recensioni -->
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quae eveniet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Col per la sponsor -->
                <a href="{{ route('payments.index') }}">
                    {{-- Sponsor image --}}
                    <img src="{{ asset('sponsor.png') }}" alt="sponsor image" class="card-img-top w-100 rounded mb-3">
                </a>
                <!-- GRAFICO -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistiche account</h5>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    @vite(['resources/js/grafic.js'])
</script>
