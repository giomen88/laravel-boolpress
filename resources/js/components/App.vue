<template>
  <div id="app">
    <AppHeader />
    <main>
      <router-view></router-view>
      <!-- <HomePage /> -->
    </main>
  </div>
</template>

<script>
import AppHeader from "./AppHeader";
// import HomePage from "./pages/HomePage.vue";
export default {
  name: "App",
  components: { AppHeader },
};
</script>

