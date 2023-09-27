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
                            <img src="{{ asset('storage/' . $doctor->profile_photo) }}" class="card-img-top"
                                alt="Doctor's Photo">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Dr. {{ $doctor->user->name }} {{ $doctor->user->last_name }}</h5>
                                <p class="card-text">Specializzazione: {{ $doctor->specializations[0]->name }}</p>
                                <!-- Spazio per le recensioni -->
                                <div class="mt-3">
                                    <h5>Recensioni</h5>
                                    <!-- Inseriamo poi qui il codice per visualizzare le recensioni -->
                                    <p>stelle stelle stelle stelle stelle</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mt-4">
                                <hr>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <ul class="list-inline text-center">
                                            <li class="list-inline-item"><a href="#voti">Voti</a></li>
                                            <li class="list-inline-item"><a href="#messaggi">Messaggi</a></li>
                                            <li class="list-inline-item"><a href="#recensioni">Recensioni</a></li>
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
                            <!-- Col per i Voti -->
                            <div class="col-md-8" id="voti">
                                <div class="mb-4">
                                    <h5 class="mb-3">Voti</h5>
                                    <!-- Aggiungiamo qui il contenuto per visualizzare le informazioni sui voti -->
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quae eveniet,
                                        odio labore aut cumque, tenetur repudiandae tempore odit quibusdam pariatur nihil et
                                        repellendus perferendis deleniti omnis. Amet, doloribus illo.
                                        Aperiam quaerat asperiores tempora minima veniam recusandae. Totam tempore
                                        recusandae consequatur, vel ex sunt dolore unde fugiat cupiditate culpa perspiciatis
                                        explicabo iusto atque voluptatem. Voluptatibus modi tempora quo repellat dolores.
                                        Quis perferendis odit sint modi harum repellendus, maiores dolorum quae suscipit
                                        itaque placeat quod corporis laudantium quam sed excepturi iste commodi quos illum
                                        nam. Exercitationem reiciendis velit necessitatibus aliquam tempore!
                                        Natus tempore aliquid vel inventore iusto quo, cum ipsum illo facere quaerat optio
                                        esse magni illum, necessitatibus earum sunt omnis! Praesentium animi fuga quas?
                                        Totam atque veniam illum inventore officia.
                                        Dolorem facilis excepturi voluptatem maxime explicabo veritatis dolores ut placeat
                                        optio asperiores, iste, aliquam, eius rerum nesciunt pariatur rem in velit eos!
                                        Accusamus sunt modi minima molestias excepturi iste dignissimos!
                                        Distinctio eos quibusdam, minus doloremque error pariatur adipisci vero dolores,
                                        inventore iusto, sint fugiat. Modi nesciunt quos laudantium rem quas, eius deserunt
                                        deleniti a aliquam animi iste ipsa cum perspiciatis.
                                        Totam quas laudantium hic voluptate odit quo ratione a facilis vitae sunt quae
                                        cupiditate, ut fugiat aliquid adipisci maiores eaque laboriosam iste fuga labore
                                        dolorem? Iure quas sit ipsa omnis!
                                        Magni doloribus, sit nesciunt expedita excepturi ratione iure recusandae ullam quod
                                        sunt tenetur eveniet, cupiditate eaque quisquam. Molestiae eaque reiciendis placeat
                                        assumenda, quae possimus perferendis repellendus! Minus, illum! At, voluptates!
                                        Veritatis totam labore recusandae. Vero eligendi fuga et doloribus alias voluptas
                                        non eius inventore sapiente, vel consequuntur dolores, facilis eveniet accusamus ea
                                        sed quisquam amet voluptate veniam deleniti soluta laborum.
                                        Fugiat provident a illum iste impedit cum voluptatum sunt sed. Inventore et rem
                                        dignissimos voluptatibus odio? Assumenda voluptatibus nemo, rem veniam sapiente
                                        officia nostrum voluptatum numquam quo consectetur consequuntur deserunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="row g-0 m-4">
                        <div class="row">
                            <!-- Col per i Messaggi -->
                            <div class="col-md-8" id="messaggi">
                                <div class="mb-4">
                                    <h5 class="mb-3">Messaggi</h5>
                                    <!-- Aggiungiamo qui il contenuto per visualizzare le informazioni sui messaggi -->
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quae eveniet,
                                        odio labore aut cumque, tenetur repudiandae tempore odit quibusdam pariatur nihil et
                                        repellendus perferendis deleniti omnis. Amet, doloribus illo.
                                        Aperiam quaerat asperiores tempora minima veniam recusandae. Totam tempore
                                        recusandae consequatur, vel ex sunt dolore unde fugiat cupiditate culpa perspiciatis
                                        explicabo iusto atque voluptatem. Voluptatibus modi tempora quo repellat dolores.
                                        Quis perferendis odit sint modi harum repellendus, maiores dolorum quae suscipit
                                        itaque placeat quod corporis laudantium quam sed excepturi iste commodi quos illum
                                        nam. Exercitationem reiciendis velit necessitatibus aliquam tempore!
                                        Natus tempore aliquid vel inventore iusto quo, cum ipsum illo facere quaerat optio
                                        esse magni illum, necessitatibus earum sunt omnis! Praesentium animi fuga quas?
                                        Totam atque veniam illum inventore officia.
                                        Dolorem facilis excepturi voluptatem maxime explicabo veritatis dolores ut placeat
                                        optio asperiores, iste, aliquam, eius rerum nesciunt pariatur rem in velit eos!
                                        Accusamus sunt modi minima molestias excepturi iste dignissimos!
                                        Distinctio eos quibusdam, minus doloremque error pariatur adipisci vero dolores,
                                        inventore iusto, sint fugiat. Modi nesciunt quos laudantium rem quas, eius deserunt
                                        deleniti a aliquam animi iste ipsa cum perspiciatis.
                                        Totam quas laudantium hic voluptate odit quo ratione a facilis vitae sunt quae
                                        cupiditate, ut fugiat aliquid adipisci maiores eaque laboriosam iste fuga labore
                                        dolorem? Iure quas sit ipsa omnis!
                                        Magni doloribus, sit nesciunt expedita excepturi ratione iure recusandae ullam quod
                                        sunt tenetur eveniet, cupiditate eaque quisquam. Molestiae eaque reiciendis placeat
                                        assumenda, quae possimus perferendis repellendus! Minus, illum! At, voluptates!
                                        Veritatis totam labore recusandae. Vero eligendi fuga et doloribus alias voluptas
                                        non eius inventore sapiente, vel consequuntur dolores, facilis eveniet accusamus ea
                                        sed quisquam amet voluptate veniam deleniti soluta laborum.
                                        Fugiat provident a illum iste impedit cum voluptatum sunt sed. Inventore et rem
                                        dignissimos voluptatibus odio? Assumenda voluptatibus nemo, rem veniam sapiente
                                        officia nostrum voluptatum numquam quo consectetur consequuntur deserunt.</p>
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
                                <div class="mb-4">
                                    <h5 class="mb-3">Recensioni</h5>
                                    <!-- Aggiungiamo qui il contenuto per visualizzare le informazioni sui recensioni -->
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quae eveniet,
                                        odio labore aut cumque, tenetur repudiandae tempore odit quibusdam pariatur nihil et
                                        repellendus perferendis deleniti omnis. Amet, doloribus illo.
                                        Aperiam quaerat asperiores tempora minima veniam recusandae. Totam tempore
                                        recusandae consequatur, vel ex sunt dolore unde fugiat cupiditate culpa perspiciatis
                                        explicabo iusto atque voluptatem. Voluptatibus modi tempora quo repellat dolores.
                                        Quis perferendis odit sint modi harum repellendus, maiores dolorum quae suscipit
                                        itaque placeat quod corporis laudantium quam sed excepturi iste commodi quos illum
                                        nam. Exercitationem reiciendis velit necessitatibus aliquam tempore!
                                        Natus tempore aliquid vel inventore iusto quo, cum ipsum illo facere quaerat optio
                                        esse magni illum, necessitatibus earum sunt omnis! Praesentium animi fuga quas?
                                        Totam atque veniam illum inventore officia.
                                        Dolorem facilis excepturi voluptatem maxime explicabo veritatis dolores ut placeat
                                        optio asperiores, iste, aliquam, eius rerum nesciunt pariatur rem in velit eos!
                                        Accusamus sunt modi minima molestias excepturi iste dignissimos!
                                        Distinctio eos quibusdam, minus doloremque error pariatur adipisci vero dolores,
                                        inventore iusto, sint fugiat. Modi nesciunt quos laudantium rem quas, eius deserunt
                                        deleniti a aliquam animi iste ipsa cum perspiciatis.
                                        Totam quas laudantium hic voluptate odit quo ratione a facilis vitae sunt quae
                                        cupiditate, ut fugiat aliquid adipisci maiores eaque laboriosam iste fuga labore
                                        dolorem? Iure quas sit ipsa omnis!
                                        Magni doloribus, sit nesciunt expedita excepturi ratione iure recusandae ullam quod
                                        sunt tenetur eveniet, cupiditate eaque quisquam. Molestiae eaque reiciendis placeat
                                        assumenda, quae possimus perferendis repellendus! Minus, illum! At, voluptates!
                                        Veritatis totam labore recusandae. Vero eligendi fuga et doloribus alias voluptas
                                        non eius inventore sapiente, vel consequuntur dolores, facilis eveniet accusamus ea
                                        sed quisquam amet voluptate veniam deleniti soluta laborum.
                                        Fugiat provident a illum iste impedit cum voluptatum sunt sed. Inventore et rem
                                        dignissimos voluptatibus odio? Assumenda voluptatibus nemo, rem veniam sapiente
                                        officia nostrum voluptatum numquam quo consectetur consequuntur deserunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Col per la card per i futuri grafici -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafici Futuri</h5>
                        <!-- Contenuto dei futuri grafici qui -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
