<script >
export default {
  name: 'DoctorList',
  data: () => ({}),
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
      <li class="lines">
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
      </li>
      <!-- DOCTOR CARD -->
      <li class="lines">
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
      </li>
      <!-- DOCTOR CARD -->
      <li class="lines">
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
      </li>
      <li class="lines">
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
      </li>
    </ul>
  </div>
</template>

<style scoped>
.lines {
  border: 1px dashed black;
}

.doctors-box {
  margin-top: 40px;
}

button {
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