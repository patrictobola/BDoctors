<script>
// import axios from 'axios';
// const endpoint = '';
export default {
  name: 'Header',
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
  <header>
    <div class="d-flex p-2 justify-content-between">
      <button type="button" class="btn btn-outline-light">profile</button>
      <button type="button" class="btn btn-outline-light">options</button>
    </div>

    <div class="d-flex px-2 nav flex-shirnk">
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Specializzazzione
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Ratings
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Messaggi
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
      </div>
    </div>

  </header>
</template>

<style scoped>
header {
  height: 300px;
  width: 100%;
  background-image: linear-gradient(rgb(22, 178, 50), transparent);
}

.nav {
  padding-top: 40px;
  justify-content: space-between;
}

.btn {
  border: 3px solid white;
  font-size: 20px;
}

@media screen and (min-width: 580px) {
  .nav {
    justify-content: space-around;
  }
}

@media screen and (min-width: 780px) {
  li {
    padding-right: 20px;
  }
}
</style>
