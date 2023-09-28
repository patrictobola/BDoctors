<script >
export default {
  name: 'Footer',
  data: () => ({}),
}
</script>

<template>
  <div class="footer-box ">
    <!-- CONTACTS -->
    <div class="media580">
      <div class="d-flex ms-3 pt-5">
        <div>
          <h1>Contatti</h1>
          <ul>
            <li>Matteo</li>
            <li>Gioele</li>
            <li>Patric</li>
            <li>Giacomo</li>
            <li>Stefan</li>
          </ul>
        </div><!-- SOCIALS -->
        <div class="socials">
          <h1>Social</h1>
          <ul>
            <li>Matteo</li>
            <li>Gioele</li>
            <li>Patric</li>
            <li>Giacomo</li>
            <li>Stefan</li>
          </ul>
        </div>
      </div>
      <div class="sponsor-box">
        <h1 class="sponsor ">Sponsor</h1>
        <ul class="ms-3">
          <li>Boolean</li>
          <li>Matteo</li>
          <li>Gioele</li>
          <li>Patric</li>
          <li>Giacomo</li>
          <li>Stefan</li>
        </ul>
      </div>
      <!-- SPONSOR -->

    </div>

    <p class="text-center pt-5"><strong>copiright</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
      esse
      cumque itaque molestias repellendus mollitia </p>
  </div>
</template>

<style scoped>
.footer-box {
  width: 100%;
  height: 580px;
  background-color: rgb(11, 94, 26);
  color: white;
  margin-top: 90px;
}

ul {
  list-style: none;
}

.sponsor-box {
  margin-left: 20px;
}

.sponsor {
  margin-top: 48px;
}

.socials {
  margin-left: 80px;
}

@media screen and (min-width: 580px) {
  .footer-box {
    height: 400px;

  }

  .media580 {
    display: flex;
  }


  .sponsor-box {
    margin-left: 80px;
  }
}
</style>