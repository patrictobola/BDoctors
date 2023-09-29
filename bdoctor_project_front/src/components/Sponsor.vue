<script >
// import axios from 'axios';
// const endpoint = '';
export default {
  name: 'Sponsor',
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
  <div class="sponsor-box text-center">
    <h1 class="pt-5">Sei un professionista?, fatti conoscere!</h1>
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