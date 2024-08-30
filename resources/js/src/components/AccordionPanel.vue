<script setup>
  import { ref } from 'vue';

  const props = defineProps({
    question: { type: String, required: true },
    ariaQuestion: { type: String, required: true },
  });

  const showPanel = ref(false);

  const togglePanel = (event) => {
    showPanel.value = !showPanel.value;
  }

</script>

<template>
  <div class="panel container mb-4 border-2 rounded-lg shadow-sm ">
  <!-- <div class="panel container mb-4 border-2 rounded-3xl shadow-sm "> -->

    <button
      :arial-controls="'accordion-content-' + ariaQuestion"
      :id="'accordion-control-' + ariaQuestion"
      @click.prevent="togglePanel"
      class="p-4 w-full border-b-2 font-semibold flex flex-row items-center justify-between">
      {{ question }}
      <!-- default = false It is only true (in that case the minus sign is shown) when the button is clicked on-->
      <span class="material-icons" v-if="showPanel">remove</span>
      <span class="material-icons" v-else>add</span>
      
    </button>
<div :aria-hidden="!showPanel" :id="'content-' + ariaQuestion" class="p-4" v-if="showPanel"><slot></slot></div>
  </div>

  
</template>