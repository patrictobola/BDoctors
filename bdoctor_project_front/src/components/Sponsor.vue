<script >
// import axios from 'axios';
// const endpoint = 'http://127.0.0.1:8000/api/';
export default {
  name: 'Sponsor',
  // data: () => ({
  //   doctors: [],
  //   sponsored: [],
  //   totSponsored:0,

  // }),
  // methods: {
  //   fetchDoctors() {
  //     axios.get(endpoint + 'doctors').then(res => { this.doctors = res.data })
  //     this.doctors.forEach((doctor) => {
  //       if (doctor.sponsor) {
  //         this.sponsored.push(doctor)
  //       }
  //     })
  //     this.totSponsored=this.sponsored.length;
  //   },
  // },
  // created() {
  //   this.fetchdoctors()
  // }
}
</script>

<template>
  <div class="sponsor-box text-center">
    <div class="buttons-banner">
      <button class="left-button">Registrati</button>
      <button class="left-button">Sponsor</button>
    </div>
  </div>
</template>

<style scoped>
.sponsor-box {
  position: relative;
  height: 500px;
  margin-top: 70px;
  color: white;
  background-image: url(../assets/img/banner.png);
  background-position: 0px -20px;
  background-size: cover;
}

.buttons-banner {
  position: absolute; 
  bottom: 10px; 
  left: 90px;
}

.left-button {
  border: 0;
  color: black;
  padding: 17px 38px;
  background-color: #03C3A5;
  border-radius: 15px;
  font-size: 20px;
  margin-right: 20px;
  transition: background-color 0.3s, box-shadow 0.3s;
}
.left-button:hover {
  color: white;
  background-color: #04D8C5; 
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.2);
}
</style>
