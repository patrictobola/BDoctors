<script >
// import axios from 'axios';
// const endpoint = '';
export default {
  name: 'NewsList',
  data: () => ({ reviews: [] }),
  // methods: {
  //   fetchReviews() {
  //     axios.get(endpoint).then((res) => {
  //       this.reviews = res.data
  //       console.log('REVIEWS AXIOS', res.data)
  //     })
  //   }
  // },
  // created() {
  //   this.fetchdoctors()
  // }
}
</script>

<template>
  <!-- REVIEWS -->
  <div class="reviews-box">
    <h1 class="ms-3">Reviews</h1>
    <!-- REVIEWS LIST -->
    <ul>
      <!-- REVIEWS CARD -->
      <li>
        <a href="#" alt="review">
          <div class="review mx-3">
            <!-- REVIEWS INFO -->
            <div class="mt-3">
              <h5 class="ms-3 m-0">title</h5>
              <div class="ms-3 m-0">rating</div>
              <p class="ms-3 m-0">chi?</p>
              <p class="ms-3 m-0">contnet</p>
            </div>
          </div>
        </a>

      </li>
      <!-- REVIEWS CARD -->
      <li>
        <a href="#" alt="review">
          <div class="review mx-3">
            <!-- REVIEWS INFO -->
            <div class="mt-3">
              <h5 class="ms-3 m-0">title</h5>
              <div class="ms-3 m-0">rating</div>
              <p class="ms-3 m-0">chi?</p>
              <p class="ms-3 m-0">contnet</p>
            </div>
          </div>
        </a>

      </li>
      <!-- REVIEWS CARD -->
      <li>
        <a href="#" alt="review">
          <div class="review mx-3">
            <!-- REVIEWS INFO -->
            <div class="mt-3">
              <h5 class="ms-3 m-0">title</h5>
              <div class="ms-3 m-0">rating</div>
              <p class="ms-3 m-0">chi?</p>
              <p class="ms-3 m-0">contnet</p>
            </div>
          </div>
        </a>

      </li>
    </ul>
  </div>
</template>

<style scoped>
.reviews-box {
  margin-top: 70px;
}

.review {
  height: 150px;
  border: 3px solid rgba(63, 223, 92, 0.349);
  border-radius: 0px 25px 25px 25px;
}

a {
  text-decoration: none;
  color: black;
}

li {
  list-style: none;
  margin-top: 15px;
}

ul {
  width: 100%;
  padding-left: 0;
}

@media screen and (min-width: 780px) {
  ul {
    display: flex;
  }

  li {
    width: 250px;
  }

  .review {
    height: 250px;
  }
}
</style>