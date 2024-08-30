<script setup>
</script>

<template>
  <nav class="w-full p-8 bg-white">

<div class="flex flex-row flex-wrap items-center justify-center text-center  bg-white gap-y-6 gap-x-12 md:justify-between">
    <img src="../../../../../public/img/main-logo.svg" alt="logo-ct" class="w-40" />
    <ul class="flex flex-wrap items-center gap-y-2 gap-x-8">
      <li>
        <router-link :to="{ name: 'home' }"  class="block font-sans text-base antialiased font-normal leading-relaxed transition-colors text-blue-gray-900 hover:text-blue-500 focus:text-blue-500">Startseite</router-link>
        
      </li>
      <li>
          <router-link :to="{ name: 'posts.tags' }"  class="block font-sans text-base antialiased font-normal leading-relaxed transition-colors text-blue-gray-900 hover:text-blue-500 focus:text-blue-500"aria-current="page">Tags</router-link>
      </li>
      <li>
          <router-link :to="{ name: 'posts.faqs' }"  class="block font-sans text-base antialiased font-normal leading-relaxed transition-colors text-blue-gray-900 hover:text-blue-500 focus:text-blue-500"aria-current="page">FAQs</router-link>
      </li>
      <li>
          <router-link :to="{ name: 'posts.login' }"  class="block font-sans text-base antialiased font-normal leading-relaxed transition-colors text-blue-gray-900 hover:text-blue-500 focus:text-blue-500"aria-current="page">Admin</router-link>
      </li>
      
    </ul>
    
  </div>
    </nav>
</template>