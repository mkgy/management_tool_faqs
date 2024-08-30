<script setup>
import Header from './components/partials/Header.vue';
import Nav from './components/partials/Navigation.vue';

</script>


<template>
  <Nav />
  <Header />
    <!--- render router view -->
    <router-view></router-view>

</template>


