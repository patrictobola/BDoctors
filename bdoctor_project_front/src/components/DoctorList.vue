<script >
import axios from 'axios';
import { adjust } from 'fontawesome';
const endpoint = 'http://127.0.0.1:8000/api/';

export default {
  name: 'DoctorList',

  data: () => ({
    specializations: [],
    doctors: [],
    specializationFilter: 0,
    averageFilter: 0,
    reviewsFilter: 0
  }),

  watch: {
    specializationFilter(newVal) {
      switch (newVal) {
        case '1':
          this.$router.push('/ginecologo');
          break;
        case '2':
          this.$router.push('/ortopedico');
          break;
        case '3':
          this.$router.push('/dermatologo');
          break;
        case '4':
          this.$router.push('/nutrizionista');
          break;
        case '5':
          this.$router.push('/psicologo');
          break;
        case '6':
          this.$router.push('/oculista');
          break;
        case '7':
          this.$router.push('/urologo');
          break;
        case '8':
          this.$router.push('/otorino');
          break;
        case '9':
          this.$router.push('/cardiologo');
          break;
        case '10':
          this.$router.push('/dentista');
          break;
        default:
          this.$router.push('/');
          break;
      }
    },
    // Watch for changes in the route and update the select value
    $route(to, from) {
      const selectedOption = this.getOptionFromRoute(to.path);
      if (selectedOption !== null) {
        this.specializationFilter = selectedOption;
      }
    },
  },

  methods: {
    getOptionFromRoute(route) {
      if (route === '/ginecologo') {
        return '1';
      } else if (route === '/ortopedico') {
        return '2';
      } else if (route === '/dermatologo') {
        return '3';
      } else if (route === '/nutrizionista') {
        return '4';
      } else if (route === '/psicologo') {
        return '5';
      } else if (route === '/oculista') {
        return '6';
      } else if (route === '/urologo') {
        return '7';
      } else if (route === '/otorino') {
        return '8';
      } else if (route === '/cardiologo') {
        return '9';
      } else if (route === '/dentista') {
        return '10';
      } else {
        return null;
      }
    },
    fetchSpecializations() {
      axios.get(endpoint + 'specializations').then(res => { this.specializations = res.data })
    },

    fetchDoctors() {
      axios.get(endpoint + 'doctors').then(res => { this.doctors = res.data.data })
    },

    orderDoctorsByReviews(doctors) {
      let reviews = [];
      let index;
      let newDoctors = [];
      let blacklist = [];

      doctors.forEach((doctor) => {
        reviews.push(doctor.reviews.length)
      })

      if (this.reviewsFilter == 1) {

        for (let j = 0; j < doctors.length; j++) {
          let min = 999999;
          for (let i = 0; i < reviews.length; i++) {
            if (reviews[i] <= min && !blacklist.includes(i)) {
              min = reviews[i];
              index = i;
            }
          }
          blacklist.push(index);
          newDoctors.push(doctors[index]);
        }

      }
      else {

        for (let j = 0; j < doctors.length; j++) {
          let max = -1;
          for (let i = 0; i < reviews.length; i++) {
            if (reviews[i] >= max && !blacklist.includes(i)) {
              max = reviews[i];
              index = i;
            }
          }
          blacklist.push(index);
          newDoctors.push(doctors[index]);
        }
      }
      return newDoctors;
    },

    fetchFilteredDoctors() {
      this.doctors = [];
      let newDoctors = [];

      // Se nessun filtro è attivo
      if (!this.specializationFilter && !this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          newDoctors = res.data.data;
          if (this.reviewsFilter) this.doctors = this.orderDoctorsByReviews(newDoctors);
          else this.doctors = newDoctors;
        })
      }

      // Se è attivo solo il filtro delle specializzazioni
      else if (this.specializationFilter && !this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          let flag = 0;
          res.data.data.forEach((doctor) => {
            doctor.specializations.forEach((specialization) => {
              if (specialization.id == this.specializationFilter) flag = 1;
            })
            if (flag) newDoctors.push(doctor);
            flag = 0;
          })
          if (this.reviewsFilter) this.doctors = this.orderDoctorsByReviews(newDoctors);
          else this.doctors = newDoctors;
        })
      }

      // Se è attivo solo il filtro della media dei voti
      else if (!this.specializationFilter && this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          let averages = [];

          res.data.data.forEach((doctor) => {
            let sum = 0;

            doctor.ratings.forEach((rating) => {
              sum += parseInt(rating.vote);
            })
            // console.log(sum);
            const roundedRating = Math.round(sum / doctor.ratings.length);
            console.log(roundedRating);
            averages.push(roundedRating);
          })

          res.data.data.forEach((doctor, index) => {
            if (averages[index] >= this.averageFilter) newDoctors.push(doctor);
          })

          if (this.reviewsFilter) this.doctors = this.orderDoctorsByReviews(newDoctors);
          else this.doctors = newDoctors;
        })
      }

      // Se sono attivi entrambi i filtri
      else {
        axios.get(endpoint + 'doctors').then(res => {
          let flag = 0;
          let filteredDoctors = [];

          res.data.data.forEach((doctor) => {
            doctor.specializations.forEach((specialization) => {
              if (specialization.id == this.specializationFilter) flag = 1;
            })
            if (flag) filteredDoctors.push(doctor);
            flag = 0;
          })

          let averages = [];

          filteredDoctors.forEach((doctor) => {
            let sum = 0;

            doctor.ratings.forEach((rating) => {
              sum += parseInt(rating.vote);
            })
            const roundedRating = Math.round(sum / doctor.ratings.length);
            console.log(roundedRating);
            averages.push(roundedRating);
          })

          filteredDoctors.forEach((doctor, index) => {
            if (averages[index] >= this.averageFilter) newDoctors.push(doctor);
          })

          if (this.reviewsFilter) this.doctors = this.orderDoctorsByReviews(newDoctors);
          else this.doctors = newDoctors;
        })
      }
    }
  },

  mounted() {
    this.fetchSpecializations();
    if (this.specializationFilter !== 0) {
      this.fetchFilteredDoctors()
    } else this.fetchDoctors();
  }

}
</script>

<template>
  <!-- DOCTORS -->
  <div class="doctors-box">
    <div class="d-flex justify-content-between">
      <h1>doctors</h1>
      <button type="button" class="btn d-flex align-items-center">Di più</button>
    </div>

    <form>
      <!-- Filtro specializzazione -->
      <label for="specialization">Specializzazione: </label>
      <select id="specialization" v-model="specializationFilter" @change="fetchFilteredDoctors()">
        <option value="0">Seleziona...</option>
        <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id.toString()">
          {{ specialization.name }}</option>
      </select>

      <!-- Filtro media voti -->
      <label for="average" class="ms-2">Media voti minima: </label>
      <select id="average" v-model="averageFilter" @change="fetchFilteredDoctors()">
        <option value="0">Seleziona...</option>
        <option value="1"> 1 stella </option>
        <option value="2"> 2 stelle </option>
        <option value="3"> 3 stelle </option>
        <option value="4"> 4 stelle </option>
        <option value="5"> 5 stelle </option>
      </select>

      <!-- Filtro numero di recensioni -->
      <label for="reviews" class="ms-2">Ordina per numero di recensioni: </label>
      <select id="reviews" v-model="reviewsFilter" @change="fetchFilteredDoctors()">
        <option value="0">Seleziona...</option>
        <option value="1"> Crescente </option>
        <option value="2"> Decrescente </option>
      </select>

    </form>

    <!-- DOCTOR LIST -->
    <ul class="doctor-list">
      <!-- DOCTOR CARD -->
      <li v-for="doctor in doctors">
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image mb-3">
              <img v-if="doctor.profile_photo" :src="doctor.profile_photo">
              <img v-else src="placeholder">
            </div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 ">{{ doctor.user.name }} {{ doctor.user.last_name }}</h5>
                <p class="ms-2 m-0">Specializzazioni: </p>
                <div class="spec-list d-flex">
                  <p class="ms-2 m-0" v-for="specialization in doctor.specializations" :key="specialization.id">{{
                    specialization.name }},</p>
                </div>

                <p class="ms-2 m-0">Prestazioni: {{ doctor.performances }}</p>
              </div>
            </div>
          </div>
        </a>
      </li>
    </ul>
  </div>
</template>

<style lang="scss" scoped>
a {
  text-decoration: none;
  color: black;
}

ul {
  padding: 0;
}

.doctors-box {
  margin-top: 40px;
  padding: 0 100px;
}

.btn {
  background-color: rgb(22, 178, 50);
  color: white;
  height: 35px;
}

.doctor-list {
  width: 100%;

}

.doc-image {
  height: 80px;
  width: 80px;
  border-radius: 50%;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;

  img {
    width: 100px;
  }
}

.spec-list {
  flex-wrap: wrap;
}

.doctor {
  display: flex;
  width: 100%;
  flex-shrink: 0;
}

.des {
  display: none;
}

li {
  list-style: none;
  margin-top: 15px;
  margin-right: 15px;
  border: 4px solid rgba(22, 178, 51, 0.274);
  border-radius: 42px 10px 10px 42px;
}

@media screen and (min-width: 580px) {
  li {
    padding-right: 20px;

  }
}

@media screen and (min-width: 990px) {
  ul {
    display: flex;
  }

  li {
    margin-right: 10px;
    border: 4px solid rgba(22, 178, 51, 0.274);
    border-radius: 42px 10px 10px 10px;
  }

  .doctor {
    height: 100%;
    display: block;
  }

  .des {
    display: block;
  }
}
</style>