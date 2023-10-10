<script >
const apiBaseUri = 'http://127.0.0.1:8000/api/doctors/';
const apiMessageUri = 'http://127.0.0.1:8000/api/messages';
const apiReviewUri = 'http://127.0.0.1:8000/api/reviews';
const apiRatingUri = 'http://127.0.0.1:8000/api/ratings';

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

        },
        review: {
            doctor_id: '',
            name: '',
            email: '',
            vote: '',
            text: ''
        }
    }),

    methods: {
        getDoctor() {
            const endpoint = apiBaseUri + this.$route.params.id;
            axios.get(endpoint)
                .then(res => {
                    this.doctor = res.data;
                    this.message.doctor_id = res.data.id;
                    this.review.doctor_id = res.data.id;
                })
                .catch(err => { console.error(err) })
        },
        sendMessage() {
            const endpointmes = apiMessageUri + `?name=${this.message.name}&last_name=${this.message.last_name}&text=${this.message.text}&email=${this.message.email}&doctor_id=${this.message.doctor_id}&date=2023-12-21`
            axios.post(endpointmes)
        },
        sendReviewAndRating() {
            if (this.review.vote && this.review.text) {
                const endpointreview = apiReviewUri + `?name=${this.review.name}&email=${this.review.email}&text=${this.review.text}&doctor_id=${this.review.doctor_id}`
                axios.post(endpointreview)
                const endpointrating = apiRatingUri + `?vote=${this.review.vote}&doctor_id=${this.review.doctor_id}`
                axios.post(endpointrating)
            } else if (this.review.text) {
                const endpointreview = apiReviewUri + `?name=${this.review.name}&email=${this.review.email}&text=${this.review.text}&doctor_id=${this.review.doctor_id}`
                axios.post(endpointreview)
            } else if (this.review.vote) {
                const endpointrating = apiRatingUri + `?vote=${this.review.vote}&doctor_id=${this.review.doctor_id}`
                axios.post(endpointrating)
            }
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
        <h1 class="text-center my-3 mb-5">Profilo Personale</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card profile-basic">
                    <div class="row g-0 m-4">
                        <div class="col-md-4">
                            <img v-if="doctor && doctor.profile_photo" :src="doctor.profile_photo" class="card-img-top"
                                alt="Doctor's Photo">
                            <img v-else src="../assets/img/placeholder.jpg" class="card-img-top">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body doctor-body">
                                <h5 class="card-title" v-if="doctor && doctor.user">Dr. {{ doctor.user.name }} {{
                                    doctor.user.last_name }}</h5>
                                <p class="card-text specializations">Specializzazioni: <small class="d-block"
                                        v-for="specialization in doctor.specializations" :key="specialization.id">
                                        {{ specialization.name }},
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
            <!-- Ultime recensioni ricevute -->
            <div class="col">

                <h5>Ultime recensioni ricevute</h5>
                <div class="accordion" v-for="review in   doctor.reviews  " :key="review.id">
                    <div class="accordion-item">
                        <div class="accordion-header d-flex justify-content-between align-items-center">
                            <h5>{{ review.name }}</h5>
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                :data-bs-target="'#collapseTwo' + review.id" aria-expanded="false"
                                aria-controls="collapseTwo">
                                mostra
                            </button>

                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{{ review.text }}</p>
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
                                <h3 class="mb-4">Invia un messaggio</h3>
                                <label for="exampleInputEmail1" class="form-label">Nome<span class="text-danger">*(campo
                                        obbligatorio)*</span></label>
                                <input v-model="message.name" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cognome<span class="text-danger">*(campo
                                        obbligatorio)*</span></label>
                                <input v-model="message.last_name" type="text" class="form-control" id="exampleInputEmail2"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email<span class="text-danger">*(campo
                                        obbligatorio)*</span></label>
                                <input v-model="message.email" type="email" class="form-control" id="exampleInputEmail3"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-12 mb-3">
                                <form @submit="sendMessage()">
                                    <h5 class="card-title">Messaggio</h5>
                                    <textarea v-model="message.text" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button class="btn">invia messaggio</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Col per la card per le future recensioni -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form @submit="sendReviewAndRating()">
                                <div class="mb-3">
                                    <h3 class="mb-4">Invia una recensione</h3>
                                    <label for="exampleInputEmail1" class="form-label">Nome<span
                                            class="text-secondary">*(opzionale)</span></label>
                                    <input v-model="review.name" type="text" class="form-control" id="exampleInputName1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email<span
                                            class="text-secondary">*(opzionale)</span></label>
                                    <input v-model="review.email" type="text" class="form-control" id="examplelast_name2"
                                        aria-describedby="emailHelp">
                                </div>
                                <label for="exampleFormControlTextarea1" class="form-label">Recensione
                                    scritta</label>
                                <textarea v-model="review.text" class="form-control" id="exampleFormControlTextarea2"
                                    rows="3"></textarea>
                                <label for="exampleFormControlTextarea1" class="form-label my-3">Valuta da 1 a
                                    5</label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" v-model="review.vote" type="radio"
                                            name="inlineRadioOptions" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="ms-4 form-check-input" v-model="review.vote" type="radio"
                                            name="inlineRadioOptions" id="inlineRadio2" value="2">
                                        <label class="ms-2 form-check-label" for="inlineRadio2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="ms-4 form-check-input" v-model="review.vote" type="radio"
                                            name="inlineRadioOptions" id="inlineRadio3" value="3">
                                        <label class="ms-2 form-check-label" for="inlineRadio3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="ms-4 form-check-input" v-model="review.vote" type="radio"
                                            name="inlineRadioOptions" id="inlineRadio4" value="4">
                                        <label class="ms-2 form-check-label" for="inlineRadio4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="ms-4 form-check-input" v-model="review.vote" type="radio"
                                            name="inlineRadioOptions" id="inlineRadio5" value="5">
                                        <label class="ms-2 form-check-label" for="inlineRadio5">5</label>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn">invia Recensione</button>
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
    background-color: #04D8C5;
    border-color: #04D8C5;
}

button {
    background-color: #04D8C5;
    color: white;
}

.card {
    border-color: #04D8C5;
}

.profile-basic {
    border: none;
}

.specializations {
    display: flex;
    flex-wrap: wrap;
}

.doctor-body {
    padding-top: 0;
}

.accordion-button {
    width: 155px;
    height: 20px;

}
</style>