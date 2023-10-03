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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="d-flex justify-content-between  w-100">
        <!-- Logo Img -->
        <figure class="px-4 d-flex justify-content-center">
          <img src="../assets/img/logo_Bdoctor (1).png" alt="Logo Bdoctor">
        </figure>
        <!-- Links Navbar -->
        <div class="d-flex px-4">
          <div class="collapse navbar-collapse navbar-links" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link active" aria-current="page" href="#">Dottori</a>
              <a class="nav-link active" aria-current="page" href="#">Recensioni</a>
              <a class="nav-link active" aria-current="page" href="#">Contatti</a>
              <a class="nav-link active text-white btn-nav" href="#">Login</a>
              <a class="nav-link active text-white btn-nav" href="#">Sei un Professionista sanitario?</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<style scoped>
header {
  height: 200px;
  width: 100%;
  background-image: linear-gradient(rgb(22, 178, 50), transparent);
}

.navbar {
  height: 100px;
}

/* Logo Navbar */
img {
  max-width: 100px;
}

/* Buttons Navbar */
.btn-nav {
  border-radius: 10px;
  margin-left: 20px;
  background-color: #20c997;
  padding: 10px 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
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
