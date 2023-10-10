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
                                            <li class="list-inline-item"><a href="#voti"
                                                    class="btn btn-primary rounded-2">Voti</a></li>
                                            <li class="list-inline-item"><a href="#messaggi"
                                                    class="btn btn-primary rounded-2">Messaggi</a></li>
                                            <li class="list-inline-item"><a href="#recensioni"
                                                    class="btn btn-primary rounded-2">Recensioni</a></li>
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
                                                        <button class="btn btn-primary rounded-3" data-toggle="collapse"
                                                            data-target="#collapse{{ $message->id }}">
                                                            Mostra di più
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $message->id }}" class="collapse"
                                                    aria-labelledby="heading{{ $message->id }}" data-parent="#accordion">
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
                            <div class="col" id="recensioni">
                                <h5>Ultime recensioni ricevuti</h5>
                                 <!-- Recensioni Accordions -->
                                <div class="mb-4">
                                    <div id="accordion">
                                        @foreach ($reviews as $review)
                                            @if ($review->doctor_id === $doctor->id)
                                                <div class="card mb-4">
                                                    <div class="card-header" id="heading{{ $review->id }}">
                                                        <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                                            <span>Nome: {{ $review->name }}</span>
                                                            <button class="btn btn-primary rounded-3" data-toggle="collapse"
                                                                data-target="#collapse{{ $review->id }}">
                                                                Mostra di più
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse{{ $review->id }}" class="collapse"
                                                        aria-labelledby="heading{{ $review->id }}" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p><strong>Email: </strong>{{ $review->email }}</p>
                                                            <p><strong>Contenuto: </strong>{{ $review->text }}</p>
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
                        <h5 class="card-title">Statistiche messaggi ricevuti</h5>
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

<script type="module">
    const messages = @json($messages);

    const messagesGen = @json($messagesGen2022);
    const messagesFeb = @json($messagesFeb2022);
    const messagesMar = @json($messagesMar2022);
    const messagesApr = @json($messagesApr2022);
    const messagesMag = @json($messagesMag2022);
    const messagesGiu = @json($messagesGiu2022);
    const messagesLug = @json($messagesLug2022);
    const messagesAug = @json($messagesAug2022);
    const messagesSet = @json($messagesSet2022);
    const messagesOtt = @json($messagesOtt2022);
    const messagesNov = @json($messagesNov2022);
    const messagesDec = @json($messagesDec2022);



    console.log(messages)
    const ctx = document.getElementById('myChart');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Nov', 'Dec','Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Aug', 'Set', 'Ott'],
            datasets: [{
                label: '# of Messages',
                data: [messagesGen.length, messagesFeb.length, messagesMar.length, messagesApr.length, messagesMag.length, messagesGiu.length, messagesLug.length, messagesAug.length, messagesSet.length, messagesOtt.length, messagesNov.length, messagesDec.length ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
