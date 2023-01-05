<template>

  <!-- <button type="button" class="inline-block bg-indigo-400 text-white leading-normal shadow-md hover:bg-indigo-500 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="count++">+</button>
  <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="count--">-</button> -->
</template>

<script>

import { ref } from 'vue'
//this is the composition api, look up what needs to be in there/options api and learn differences
//also run npm run watch to get page to update
export default {

  props: ['count'],
    setup() {
        
      // const count = ref(0)
      // console.log(count.value);
      // create count function to count++ and --, possibly emit an update total function to pass an array
      // with the current count in it? 

      // expose to template and other options API hooks
      return {
      // count
      }
    },

  mounted() {
    //fires when initialised
    // console.log(this.count)
    
  },
  name: 'Counter',

}
</script>