<script setup>
function redirect(){
  window.location.href = "login";
}
</script>

<template>


<div class="container mt-5 ">
    <div class="h-screen flex items-center justify-center">
    <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"  @click = "redirect">Redirect to Admin-Page
    </Button>
    </div>
</div>
</template>
