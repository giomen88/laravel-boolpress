<template>
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        {{ post.category }}
      </div>
      <div class="card-body">
        <h4 class="card-title">{{ post.title }}</h4>
        <address>Autore: {{ post.user_id.name }}</address>
        <p class="card-text">{{ post.content }}</p>
        <router-link href="#" class="btn btn-primary">Apri</router-link>
      </div>
      <div class="card-footer text-muted">Creato il: {{ post.created_at }}</div>
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
  