<script >
export default {
  name: 'Sponsor',
  data: () => ({}),
}
</script>

<template>
  <div class="sponsor-box text-center">
    <h1 class="pt-5">Sei un professionista?, fatti conoscere!</h1>
    <div class="pt-5"><button>Sign up</button>
      <button class="ms-5"> Sponsor</button>
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
  padding: 10px 8px;
  color: rgb(18, 122, 37);
  border-radius: 15px;
}
</style>