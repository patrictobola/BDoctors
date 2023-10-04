<script >
import axios from 'axios';
const endpoint = 'http://127.0.0.1:8000/api/reviews';
export default {
  name: 'NewsList',
  data: () => ({
    reviews: [],
    ratings: [],
    prevPageURI: null,
    nextPageURI: null,
    links: null,
  }),
  methods: {
    fetchReviews(uri = endpoint) {
      axios.get(uri).then(res => {
        this.prevPageURI = res.data.prev_page_url
        this.nextPageURI = res.data.next_page_url

        this.reviews = res.data.data
        this.links = res.data.links
        console.log(res)
        console.log(this.links)

      })
    }
  },
  created() {
    this.fetchReviews()
  }
}
</script>

<template>
  <!-- REVIEWS -->
  <div class="reviews-box" id="reviews-box">
    <h1 class="ms-3 mb-4">Reviews</h1>
    <!-- REVIEWS CARD -->
    <ul>
      <div class="row">
        <li v-for="review in reviews " class="reviews pe-3">
          <a href="#" alt="review">
            <div class="review mx-3">
              <div class="mt-3">
                <h5 class="ms-3 m-0">{{ review.name }}</h5>
                <p class="ms-3 m-0">{{ review.text }}</p>
              </div>
            </div>
          </a>
        </li>
      </div>
    </ul>
    <nav aria-label="Page navigation example">
      <ul class="pagination my-5">
        <li v-for="link in links" class="page-item" :class="link.active ? 'active' : ''"><a class="page-link"
            :class="link.url ? '' : 'disabled'" href="#reviews-box" @click="fetchReviews(link.url)"
            v-html="link.label"></a></li>
      </ul>
    </nav>
  </div>
</template>

<style scoped>
.reviews-box {
  margin-top: 70px;
  padding: 0 25px;
}

.review {
  height: 150px;
  border: 3px solid rgba(63, 223, 92, 0.349);
  border-radius: 0px 25px 25px 25px;
}

a {
  text-decoration: none;
  /* padding: 0; */
  color: black;
}

li.reviews {
  list-style: none;
  margin-top: 15px;
}

ul {
  width: 100%;
  padding-left: 0;
}

.pagination>.active>a {
  background-color: rgb(22, 178, 50);
  border: none;
}

.page-item {
  margin-top: 15px;
  margin-right: 15px;
}

.pagination {
  display: flex;
  flex-wrap: wrap;
}

.page-link {
  border: 1px solid rgb(22, 178, 50);
  border-radius: 10px;
}

.disabled {
  background-color: rgba(1, 80, 14, 0.274);
}

@media screen and (min-width: 780px) {
  ul {
    display: flex;
  }

  li.reviews {
    width: calc(100% / 5)
  }

  .row {
    margin-right: 0;
  }

  .review {
    height: 250px;
  }
}

@media screen and (min-width: 990px) {
  .reviews-box {
    padding: 0 80px;
  }
}
</style>