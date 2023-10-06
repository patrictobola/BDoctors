<script >
import axios from 'axios';
import { adjust, fill } from 'fontawesome';
const endpoint = 'http://127.0.0.1:8000/api/';

export default {
  name: 'DoctorList',

  data: () => ({
    specializations: [],
    doctors: [],
    specializationFilter: 0,
    averageFilter: 0,
    reviewsFilter: 0,
    links: null,
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
    fillSpecialization() {
      const selectedOption = this.getOptionFromRoute(this.$route.path);
      if (selectedOption !== null) {
        this.specializationFilter = selectedOption;
      }
    },

    fetchSpecializations() {
      axios.get(endpoint + 'specializations').then(res => { this.specializations = res.data })
    },

    fetchDoctors(uri = endpoint + 'doctors') {
      axios.get(uri).then(res => {
        this.doctors = res.data.data
        this.links = res.data.links
      })
    },

    fetchFilteredDoctors() {
      this.doctors = [];
      let newDoctors = [];

      // Se nessun filtro è attivo
      if (!this.specializationFilter && !this.averageFilter) {
        axios.get(endpoint + 'doctors').then(res => {
          newDoctors = res.data.data;
          this.links = res.data.links
          if (this.reviewsFilter) this.doctors = this.orderDoctorsByReviews(newDoctors);
          else this.doctors = newDoctors;
        })
      }

      // Se è attivo solo il filtro delle specializzazioni
      else if (this.specializationFilter && !this.averageFilter) {

        if (this.specializationFilter == '0') {
          axios.get(endpoint + 'doctors').then(res => {
            newDoctors = res.data.data;
            this.links = res.data.links
            if (this.reviewsFilter != '0') this.doctors = this.orderDoctorsByReviews(newDoctors);
            else this.doctors = newDoctors;
          })
        }
        else {
          axios.get(endpoint + 'doctors/specialization/' + this.specializationFilter).then(res => {
            let flag = 0;
            res.data.data.forEach((doctor) => {
              doctor.specializations.forEach((specialization) => {
                if (specialization.id == this.specializationFilter) flag = 1;
              })
              if (flag) {
                newDoctors.push(doctor);
                this.links = res.data.links
                flag = 0;
              }
            })
            if (this.reviewsFilter != '0') this.doctors = this.orderDoctorsByReviews(newDoctors);
            else this.doctors = newDoctors;
          })
        }
      }
    },

  },

  mounted() {
    this.urlRoute = this.$route.path;
    this.fillSpecialization();
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
      <h1>Ultimi professionisti registrati:</h1>
      <button type="button" class="btn d-flex align-items-center">Di più</button>
    </div>

    <form class="filetform">
      <!-- Filtro specializzazione -->
      <div class="my-2"><label for="specialization">Specializzazione: </label>
        <select class="ms-2" id="specialization" v-model="specializationFilter" @change="fetchFilteredDoctors()">
          <option value="0">Seleziona...</option>
          <option v-for="specialization in specializations" :key="specialization.id"
            :value="specialization.id.toString()">
            {{ specialization.name }}</option>
        </select>
      </div>
    </form>

    <!-- DOCTOR LIST -->
    <ul class="doctor-list" id="doctor-list">
      <!-- DOCTOR CARD -->
      <li v-for="doctor in doctors">
        <RouterLink :to="{ name: 'profile', params: { id: doctor.id } }">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image mb-3">
              <img v-if="doctor.profile_photo" :src="doctor.profile_photo">
              <img v-else src="../assets/img/placeholder.jpg">
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
        </RouterLink>
      </li>
    </ul>
    <div class="d-flex">

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li v-for="link in links" class="page-item" :class="link.active ? 'active' : ''"><a class="page-link"
              :class="link.url ? '' : 'disabled'" href="#" @click="fetchDoctors(link.url)" v-html="link.label"></a></li>
        </ul>
      </nav>
    </div>
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
  padding: 0 25px;
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

.pagination>.active>a {
  background-color: rgb(22, 178, 50);
}

.pagination {
  flex-wrap: wrap;
}

.page-item {

  border: none;

  a {
    border: 1px solid rgb(22, 178, 50);
    border-radius: 10px;
  }
}

.disabled {
  background-color: rgba(1, 80, 14, 0.274);
}

select {
  border: none;
  background-color: rgba(22, 178, 51, 0.397);
  border-radius: 10px;
}

option {
  background-color: white;
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

  .doctors-box {

    padding: 0 100px;
  }

  .doctor {
    height: 100%;
    display: block;
  }

  .des {
    display: block;
  }

  .filetform {
    display: flex;
    justify-content: space-between;
  }
}
</style>