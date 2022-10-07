<template>
  <div class="card text-center">
    <div class="card-header">
      <!-- {{ post.category.label }} -->
    </div>
    <div class="card-body d-flex flex-column">
      <h3 class="card-title">{{ post.title }}</h3>
      <address><strong>Autore:</strong> {{ post.user_id.name }}</address>
      <p class="card-text">{{ post.content }}</p>
      <small>Creato: {{ post.created_at }}</small>
      <small>Modificato: {{ post.updated_at }}</small>
    </div>
    <div class="card-footer text-muted">
      <router-link :to="{ name: PostDetailsPage }" class="btn btn-primary"
        ><i class="fa-solid fa-magnifying-glass mr-2"></i>Apri Post</router-link
      >
    </div>
  </div>
</template>
  
<script>
export default {
  name: "PostCard",
  props: {
    post: Object,
  },
};
</script>
<style scoped>
.card {
  margin: 10px;
  width: calc(100% / 4 - 20px);
}
</style>
  