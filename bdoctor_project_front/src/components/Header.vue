<script>
export default {
  name: 'Header',
  data: () => ({}),

}
</script>

<template>
  <header>
    <div class="d-flex p-2 justify-content-between">
      <button type="button" class="btn btn-outline-light">profile</button>
      <button type="button" class="btn btn-outline-light">options</button>
    </div>

    <div class="d-flex px-2 justify-content-between nav flex-shirnk">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Specializzazzione
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Ratings
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
  width: 480px;
  background-image: linear-gradient(rgb(22, 178, 50), transparent);
}

.nav {
  padding-top: 40px;
}
</style>
