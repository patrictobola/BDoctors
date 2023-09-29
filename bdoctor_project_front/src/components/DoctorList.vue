<script >
// import axios from 'axios';
// const endpoint = '';
export default {
  name: 'DoctorList',
  data: () => ({ doctors: [] }),
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
}
</script>

<template>
  <!-- DOCTORS -->
  <div class="doctors-box">
    <div class="mx-3 d-flex justify-content-between">
      <h1>doctors</h1>
      <button type="button" class="btn d-flex align-items-center">Di più</button>
    </div>
    <!-- DOCTOR LIST -->
    <ul class="doctor-list">
      <!-- DOCTOR CARD -->
      <li>
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image"></div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 ">name</h5>
                <p class="ms-2 m-0">specialization</p>
                <p class="ms-2 m-0">prestazioni:(come non hai mai provato)</p>
                <p class="des ms-2">description</p>
              </div>
            </div>
          </div>
        </a>
      </li>
      <!-- DOCTOR CARD -->
      <li>
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image"></div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 m-0">name</h5>
                <p class="ms-2 m-0">specialization</p>
                <p class="ms-2 m-0">prestazioni:(come non hai mai provato)</p>
                <p class="des ms-2">description</p>
              </div>
            </div>
          </div>
        </a>

      </li>
      <!-- DOCTOR CARD -->
      <li>
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image"></div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 m-0">name</h5>
                <p class="ms-2 m-0">specialization</p>
                <p class="ms-2 m-0">prestazioni:(come non hai mai provato)</p>
                <p class="des ms-2">description</p>
              </div>
            </div>
          </div>
        </a>

      </li>
      <li>
        <a href="#" alt="doctor name">
          <div class="doctor">
            <!-- DOCTOR-IMG -->
            <div class="doc-image"></div>
            <!-- DOCTOR INFO -->
            <div>
              <div>
                <h5 class="ms-2 m-0">name</h5>
                <p class="ms-2 m-0">specialization</p>
                <p class="ms-2 m-0">prestazioni:(come non hai mai provato)</p>
                <p class="des ms-2">description</p>
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