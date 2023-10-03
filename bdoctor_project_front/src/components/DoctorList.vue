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
    selectedOption: '',
  }),

  computed: {
    slicedDoctors() {
      return this.doctors.slice(0, 5);
    }
  },
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
      axios.get(endpoint + 'doctors').then(res => { this.doctors = res.data })
    },

    fetchFilteredDoctors() {
      this.doctors = [];

      // Se nessun filtro è attivo
      if (!this.specializationFilter && !this.averageFilter) this.fetchDoctors();

      // Se è attivo solo il filtro delle specializzazioni
      else if (this.specializationFilter && !this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          let flag = 0;
          res.data.forEach((doctor) => {
            doctor.specializations.forEach((specialization) => {
              if (specialization.id == this.specializationFilter) flag = 1;
            })
            if (flag) this.doctors.push(doctor);
            flag = 0;
          })
        })
      }

      // Se è attivo solo il filtro della media dei voti
      else if (!this.specializationFilter && this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          let averages = [];

          res.data.forEach((doctor) => {
            let sum = 0;

            doctor.ratings.forEach((rating) => {
              sum += parseInt(rating.vote);
            })
            // console.log(sum);
            const roundedRating = Math.round(sum / doctor.ratings.length);
            console.log(roundedRating);
            averages.push(roundedRating);
          })

          res.data.forEach((doctor, index) => {
            if (averages[index] >= this.averageFilter) this.doctors.push(doctor);
          })
        })
      }

      // Se sono attivi entrambi i filtri
      else {
        axios.get(endpoint + 'doctors').then(res => {
          let flag = 0;
          let newDoctors = [];

          res.data.forEach((doctor) => {
            doctor.specializations.forEach((specialization) => {
              if (specialization.id == this.specializationFilter) flag = 1;
            })
            if (flag) newDoctors.push(doctor);
            flag = 0;
          })

          let averages = [];

          newDoctors.forEach((doctor) => {
            let sum = 0;

            doctor.ratings.forEach((rating) => {
              sum += parseInt(rating.vote);
            })
            const roundedRating = Math.round(sum / doctor.ratings.length);
            console.log(roundedRating);
            averages.push(roundedRating);
          })

          newDoctors.forEach((doctor, index) => {
            if (averages[index] >= this.averageFilter) this.doctors.push(doctor);
          })
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
    <div class="mx-3 d-flex justify-content-between">
      <h1>doctors</h1>
      <button type="button" class="btn d-flex align-items-center">Di più</button>
    </div>

    <form>
      <!-- Filtro specializzazione -->
      <select v-model="specializationFilter" @change="fetchFilteredDoctors()">
        <option value="0">Seleziona...</option>
        <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id.toString()">
          {{ specialization.name }}</option>
      </select>

      <!-- Filtro media voti -->
      <select v-model="averageFilter" @change="fetchFilteredDoctors()">
        <option value="0">Seleziona...</option>
        <option value="1"> 1 stella </option>
        <option value="2"> 2 stelle </option>
        <option value="3"> 3 stelle </option>
        <option value="4"> 4 stelle </option>
        <option value="5"> 5 stelle </option>
      </select>

    </form>

    <!-- DOCTOR LIST -->
    <ul class="doctor-list">
      <!-- DOCTOR CARD -->
      <li v-for="doctor in slicedDoctors">
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
                <p v-for="specialization in doctor.specializations" :key="specialization.id">{{ specialization.name }}</p>
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

.doctors-box {
  margin-top: 40px;
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
  background-color: red;
  height: 80px;
  width: 80px;
  border-radius: 50%;
  overflow: hidden;

  img {
    width: 100px;
  }
}

.doctor {
  display: flex;
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