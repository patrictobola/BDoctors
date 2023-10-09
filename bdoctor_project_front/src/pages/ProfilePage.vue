<script >
const apiBaseUri = 'http://127.0.0.1:8000/api/doctors/';
const apiMessageUri = 'http://127.0.0.1:8000/api/messages';
import axios from 'axios';

export default {
    name: 'ProfilePage',

    data: () => ({
        doctor: null,

        message: {
            doctor_id: '',
            name: '',
            last_name: '',
            email: '',
            text: '',

        }
    }),

    methods: {
        getDoctor() {
            const endpoint = apiBaseUri + this.$route.params.id;
            axios.get(endpoint)
                .then(res => {
                    this.doctor = res.data;
                    this.message.doctor_id = res.data.id;
                })
                .catch(err => { console.error(err) })
        },
        sendMessage() {
            const endpointmes = apiMessageUri + `?name=${this.message.name}&last_name=${this.message.last_name}&text=${this.message.text}&email=${this.message.email}&doctor_id=${this.message.doctor_id}`
            axios.post(endpointmes)
        },

        initializeBraintree() {
            axios.get('/braintree/client-token')
                .then(response => {
                    const clientToken = response.data.clientToken;
                })
                .catch(error => {
                    console.error(error);
                });
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
                            <img v-if="doctor && doctor.profile_photo" :src="doctor.profile_photo" class="card-img-top"
                                alt="Doctor's Photo">
                            <img v-else src="../assets/img/placeholder.jpg" class="card-img-top">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title" v-if="doctor && doctor.user">Dr. {{ doctor.user.name }} {{
                                    doctor.user.last_name }}</h5>
                                <p class="card-text">Specializzazioni: <small class="d-block"
                                        v-if="doctor && doctor.specialization"
                                        v-for="specialization, index in doctor.specializations" :key="specialization.id">
                                        {{ specialization.name }}
                                    </small>
                                </p>
                                <div class="mt-3">
                                    <h5>Media voti</h5>
                                    <!-- Inseriamo il codice per visualizzare le recensioni qui -->
                                    <p>
                                        <!-- v-if="doctor && doctor.rating" -->
                                        <font-awesome-icon v-for="i in 5" :key="i"
                                            :icon="i <= voteAverage ? ['fas', 'star'] : ['far', 'star']" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <!-- Col messaggi dottori -->
                <div class="col-md-6">
                <div class="card px-3 pt-4">
                    <div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome<span
                                    class="text-danger">*</span></label>
                            <input v-model="message.name" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cognome<span
                                    class="text-danger">*</span></label>
                            <input v-model="message.last_name" type="email" class="form-control" id="exampleInputEmail2"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email<span
                                    class="text-danger">*</span></label>
                            <input v-model="message.email" type="email" class="form-control" id="exampleInputEmail3"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <form @submit="sendMessage()">
                                        <h5 class="card-title">Invia un messaggio</h5>
                                        <textarea v-model="message.text" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button class="btn btn-success">invia messaggio</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Col per la card per le future recensioni -->
            <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <h5 class="card-title">Invia una Recensione</h5>
                                        <label for="exampleFormControlTextarea1" class="form-label">Recensione
                                            scritta</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
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
                                                    id="inlineRadio2" value="option2">
                                                <label class="ms-2 form-check-label" for="inlineRadio2">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio3" value="option3">
                                                <label class="ms-2 form-check-label" for="inlineRadio3">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio4" value="option4">
                                                <label class="ms-2 form-check-label" for="inlineRadio4">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="ms-4 form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio5" value="option5">
                                                <label class="ms-2 form-check-label" for="inlineRadio5">5</label>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button class="btn btn-success">invia Recensione</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </div>
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