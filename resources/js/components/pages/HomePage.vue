<template>
  <div class="container">
    <h1 class="mt-3">LISTA POST</h1>
    <div class="post-list d-flex flex-wrap">
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import PostCard from "../PostCard.vue";
export default {
  name: "HomePage",
  components: { PostCard },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    fetchPosts() {
      axios
        .get("http://localhost:8000/api/posts")
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.err(err);
        });
    },
  },
  mounted() {
    this.fetchPosts();
  },
};
</script>
<style>
.post-list {
  margin: 0 -20px;
}
</style>