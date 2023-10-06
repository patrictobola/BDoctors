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
        },
    },

    computed: {
        voteAverage() {
            let sum = 0;
            this.doctor.ratings.forEach((rating) => {
                sum += parseFloat(rating.vote);
            })
            return Math.ceil(sum / this.doctor.ratings.length);
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
                            <img v-if="doctor && doctor.profile_photo" :src="doctor.profile_photo" class="card-img-top" alt="Doctor's Photo">
                            <img v-else src="../assets/img/placeholder.jpg" class="card-img-top" >
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title" v-if="doctor && doctor.user">Dr. {{ doctor.user.name }} {{ doctor.user.last_name }}</h5>
                                <p class="card-text">Specializzazioni: <small class="d-block" v-if="doctor && doctor.specialization"
                                        v-for="specialization, index in doctor.specializations" :key="specialization.id">
                                        {{ specialization.name }}
                                    </small>
                                </p>
                                <div class="mt-3">
                                    <h5>Recensioni</h5>
                                    <!-- Inseriamo il codice per visualizzare le recensioni qui -->
                                    <p>
                                        <font-awesome-icon v-for="i in 5" :key="i" v-if="doctor && doctor.rating"
                                            :icon="i <= voteAverage ? ['fas', 'star'] : ['far', 'star']" />
                                    </p>
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

                <div class="card px-3 pt-4">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome<span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cognome<span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email<span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        <h5 class="card-title">Invia un messaggio</h5>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button class="btn btn-success">inviamessaggio</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Col per la card per le future recensioni -->
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        <h5 class="card-title">Invia una Recensione</h5>
                                        <label for="exampleFormControlTextarea1" class="form-label">Recensione
                                            scritta</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <label for="exampleFormControlTextarea1" class="form-label my-3">Valuta da 1 a
                                            5</label>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option2">
                                                <label class="ms-2 form-check-label" for="inlineRadio1">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option3">
                                                <label class="ms-2 form-check-label" for="inlineRadio1">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option4">
                                                <label class="ms-2 form-check-label" for="inlineRadio1">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option5">
                                                <label class="ms-2 form-check-label" for="inlineRadio1">5</label>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button class="btn btn-success">invia Recensione</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



                <!-- Col per la card per i futuri messaggi -->

            </div>
        </div>
        <RouterLink class="btn btn-primary" :to="{ name: 'main' }">Torna Indietro</RouterLink>
    </div>
</template>

<style scoped>
.form-check-input:checked {
    background-color: rgb(22, 178, 50);
    border-color: rgb(22, 178, 50);
}
</style>