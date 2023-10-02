<script >
import axios from 'axios';
const endpoint = 'http://127.0.0.1:8000/api/';

export default {
  name: 'DoctorList',
  data: () => ({
    specializations: [],
    doctors: []
  }),
  // methods: {
  //   fetchDocors() {
  //     axios.get(endpoint).then((res) => {
  //       this.doctors = res.data
  //       console.log('DOCTORS AXIOS', res.data)
  //     })
  //   }
  // },
  // created() {
  //   this.fetchdoctors()
  // }
  methods: {
    fetchSpecializations() {
      axios.get(endpoint + 'specializations').then(res => { this.specializations = res.data })
    },
    fetchDoctors() {
      axios.get(endpoint + 'doctors').then(res => { this.doctors = res.data })
    }
  },
  mounted() {
    this.fetchSpecializations();
    this.fetchDoctors();
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
      <select>
        <option value="0">Seleziona...</option>
        <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id">{{
          specialization.name }}</option>
      </select>
    </form>
    <!-- DOCTOR LIST -->
    <ul class="doctor-list" v-for="doctor in     doctors.slice(0, 5)    ">
      <!-- DOCTOR CARD -->
      <li>
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image">
              <img v-if="profile_photo" :src="doctor.profile_photo" :alt="user.name user.last_name">
              <img v-else src="placeholder" :alt=" user.name user.last_name ">
            </div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 ">{{ user.name }}{{ user.last_name }}</h5>
                <p class="ms-2 m-0">specialization</p>
                <p class="ms-2 m-0">prestazioni:{{ doctor.performances }}</p>
                <p class="des ms-2">{{ doctor.specialization }}</p>
              </div>
            </div>
          </div>
        </a>
      </li>
    </ul>
  </div>
</template>

<style scoped>
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
}

.doctor {
  height: 100%;
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
    height: 300px;
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