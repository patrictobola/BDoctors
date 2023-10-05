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
    <h1 class="pt-5">Sei un professionista? Fatti conoscere!</h1>
    <div class="pt-5"><button>Sign up</button>
      <button> Sponsor</button>
    </div>
    <h2 class="mt-5">Gia "tot" ne stanno usufruendo!</h2>
  </div>
</template>

<style scoped>
.sponsor-box {
  height: 400px;
  background-color: rgb(22, 178, 50);
  margin-top: 70px;
  color: white;
}

button {
  border: rgb(19, 145, 42) 3px solid;
  padding: 17px 38px;
  color: rgb(18, 122, 37);
  border-radius: 15px;
  font-size: 20px;
  margin-left: 40px;
}
</style>