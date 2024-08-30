<script setup>
import AccordionPanel from '../../components/AccordionPanel.vue';

import WordHighlighter from "vue-word-highlighter";


import { ref } from 'vue';



const query = ref('')
const faqs = ref(null);

const showAllgemein = ref(false) // hiding it by default
const showServices = ref(false) // hiding it by default
const showFilme = ref(false) // hiding it by default
const showZahlung = ref(false) // hiding it by default



let data = [];

async function getData() {
  const url = "http://localhost:8000/api/questions";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const json = await response.json();
    // clean up the response data
    Object.keys(json).forEach(key => {
      data = json[key];
    });

 faqs.value = data

  } catch (error) {
    console.error(error.message);
  }
}


getData()

</script>

<template>
  <main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden myColor">
      <div class="w-full max-w-2xl mx-auto px-4 md:px-6 py-24">

        <h1 class="text-2xl font-light text-slate-400 mb-4 text-center">Häufig gestellte Fragen</h1>

        <div class="">
          <!-- ##################################### START: Searchbox ################################################ -->
                <div class="  flex items-center justify-center">
                    <input class="rounded-2xl w-3/4 h-10 " type='input' placeholder='Filter Search' v-model='query'/>
                </div>
        
        <!-- ##################################### END:  Searchbox  ################################################ -->
          <!-- ##################################### START: Navbar ################################################ -->
          <div class=" flex flex-row space-x-4 justify-center mx-auto lg:w-full md:w-5/6 xl:shadow-small-blue pb-20 pt-10 h-full">

                <button class=" basis-1/4 block w-1/2 py-10 text-center border lg:w-1/4 rounded-2xl bg-gray-200 hover:bg-green-800 shadow-xl " @click="showAllgemein = !showAllgemein">
                  <img src="../../../../../public/img/folder_open_w.svg" class="block mx-auto" id="allgemein">

                  <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6 text-white" >
                      Allgemein
                  </p>
                </button>
      
                <button class="basis-1/4 block w-1/2 py-10 text-center border lg:w-1/4 rounded-2xl bg-gray-200 hover:bg-green-800 shadow-xl" @click="showServices = !showServices">
                  <img src="../../../../../public/img/front_hand_w.svg" class="block mx-auto" >

                  <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6 text-white" >
                      Services
                  </p>
                </button>

                <button class="  basis-1/4 block w-1/2 py-10 text-center border lg:w-1/4 rounded-2xl bg-gray-200 hover:bg-green-800 shadow-xl" @click="showFilme = !showFilme">
                  <img src="../../../../../public/img/videocam_w.svg" class="block mx-auto">

                  <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6 text-white" >
                      Filme
                  </p>
                </button>

                <button class="  basis-1/4 block w-1/2 py-10 text-center border lg:w-1/4 rounded-2xl bg-gray-200 hover:bg-green-800 shadow-xl" @click="showZahlung = !showZahlung">
                  <img src="../../../../../public/img/videocam_w.svg" class="block mx-auto">

                  <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6 text-white" >
                      Zahlungen
                  </p>
                </button>
          </div>
        
          <!-- ##################################### END: Navbar ################################################ -->
          <!-- ##################################### START: Accordion ################################################ -->
          <div v-for="(faq, index) in faqs" :key="index">

          <div v-if="showAllgemein">
            <div v-if="faq.category.category === 'Allgemein'">
              <AccordionPanel :ariaQuestion="faq.question"  :question="faq.question"  :text="faq.answer" :id="`faqs-${index}`"  class="shadow-lg">
                        <!-- ################################# Highlighter-->
                        <div class='root_accordion'>
                              <WordHighlighter :query= "query" splitBySpace= "true" >{{ faq.answer}}​ </WordHighlighter >
                        </div>
              </AccordionPanel> 
            </div>
          </div>
            <div v-else-if="showServices">
              <div v-if="faq.category.category === 'Services'">
              <AccordionPanel :ariaQuestion="faq.question"  :question="faq.question"  :text="faq.answer" :id="`faqs-${index}`"  class="shadow-lg">
                        <!-- ################################# Highlighter-->
                        <div class='root_accordion'>
                              <WordHighlighter :query= "query" splitBySpace= "true" >{{ faq.answer}}​ </WordHighlighter >
                        </div>
              </AccordionPanel> 
            </div>
            </div>
            <div v-else-if="showFilme">
                <div v-if="faq.category.category === 'Filme'">
                  <AccordionPanel :ariaQuestion="faq.question"  :question="faq.question"  :text="faq.answer" :id="`faqs-${index}`"  class="shadow-lg">
                            <!-- ################################# Highlighter-->
                            <div class='root_accordion'>
                                  <WordHighlighter :query= "query" splitBySpace= "true" >{{ faq.answer}}​ </WordHighlighter >
                            </div>
                  </AccordionPanel> 
              </div>
            </div>
            <div v-else-if="showZahlung">
              <div v-if="faq.category.category === 'Zahlung'">
              <AccordionPanel :ariaQuestion="faq.question"  :question="faq.question"  :text="faq.answer" :id="`faqs-${index}`"  class="shadow-lg">
                        <!-- ################################# Highlighter-->
                        <div class='root_accordion'>
                              <WordHighlighter :query= "query" splitBySpace= "true" >{{ faq.answer}}​ </WordHighlighter >
                        </div>
              </AccordionPanel> 
            </div>
          </div>
        </div>
<!-- ##################################### END: Accordion ################################################ -->
      </div>
    </div>
  </main>
</template>

<style scoped>
 input[type='text'] {
   margin-bottom: 20px;
   padding: 10px;
 }

 
 .root_accordion {
		width: 400px;
		margin: 0 auto;
	}

	.root_accordion p {
		text-align: right;
		font-size: 0.7em;
		margin: 0;
	}

	ul {
		list-style:  none;
		width: 50px 0;
		padding: 0;
		background-color: #fafafa;
		border-radius: 5px;
		border: 1px solid #ddd;
	}

	li {
		text-align: left;
		padding: 20px;
		border-bottom: 1px solid #ddd;
	}

	li:nth-last-of-type(1) {
		border-bottom: none;
	}

  .myColor{
      background-color:#fafafa;
  }
</style>
