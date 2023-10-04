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
      <div class="d-flex justify-content-between nav-box w-100">
        <!-- Logo Img -->
        <figure class="px-4 d-flex justify-content-center image-container">
          <img src="../assets/img/logo_Bdoctor (1).png" alt="Logo Bdoctor">
        </figure>
        <!-- Links Navbar -->
        <div class="d-flex px-4">
          <div class="navbar navbar-links" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active d-min me-3" aria-current="page" href="#">Home</a>
              <a class="nav-link active d-min me-3" aria-current="page" href="#">Dottori</a>
              <a class="nav-link active d-min me-3" aria-current="page" href="#">Recensioni</a>
              <a class="nav-link active d-min me-3" aria-current="page" href="#">Contatti</a>
              <div class="d-flex align-items-center"><a class="nav-link login-btn active text-white btn-nav"
                  href="http://127.0.0.1:8000/login">Login</a>
                <a class="nav-link active text-white btn-nav" href="http://127.0.0.1:8000/register">Sei un Professionista
                  sanitario?</a>
              </div>

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

.image-container {
  padding: 0px;
  margin: 0px;
}

.login-btn {
  height: 45px;
}

.nav-link {
  padding: 0;
}

.navbar {
  height: 100px;
}

.nav-box {
  height: 100px;
}

/* Logo Navbar */
img {
  max-width: 100px;
}

.d-min {
  display: none;
}

.navbar-nav {
  display: flex;
  align-items: center;
  flex-direction: row;
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

  .d-min {
    display: block;
  }
}
</style>
