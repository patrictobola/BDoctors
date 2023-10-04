<script >
const apiBaseUri = 'http://127.0.0.1:8000/api/doctors/';
import axios from 'axios';

export default {
    name: 'ProfilePage',
    data: () => ({
        doctor: null,
    }),
    methods: {
        getDoctor() {
            const endpoint = apiBaseUri + this.$route.params.id;
            axios.get(endpoint)
                .then(res => { this.doctor = res.data; })
                .catch(err => { console.error(err) })
        }
    },
    created() {
        this.getDoctor();
    }
};
</script>

<template>
    <div class="container">
        <h1 class="text-center my-3">Profilo Personale</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="row g-0 m-4">
                        <div class="col-md-4">
                            <img :src="doctor.profile_photo" class="card-img-top" alt="Doctor's Photo">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Dr. {{ doctor.user.name }} {{ doctor.user.last_name }}</h5>
                                <p class="card-text">Specializzazione: {{ doctor.specializations[0].name }}</p>
                                <div class="mt-3">
                                    <h5>Recensioni</h5>
                                    <!-- Inseriamo il codice per visualizzare le recensioni qui -->
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
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
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
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
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
                                    <!-- Aggiungiamo qui il contenuto per visualizzare le informazioni sulle recensioni -->
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <!-- Col per la card per i futuri grafici -->
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grafici Futuri</h5>
                                <!-- Contenuto dei futuri grafici qui -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Col per la card per i futuri messaggi -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Messaggi Futuri</h5>
                            <!-- Contenuto dei futuri messaggi qui -->
                        </div>
                    </div>
                </div>
                <!-- Col per la card per le future recensioni -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recensioni Future</h5>
                            <!-- Contenuto delle future recensioni qui -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <RouterLink class="btn btn-primary" :to="{ name: 'main' }">Torna Indietro</RouterLink>
    </div>
</template>

<style scoped></style>