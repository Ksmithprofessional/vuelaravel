<template>

<div class="grid grid-cols-3 w-full">

  <div class="border-r-4 p-4">

  <!-- left items menu -->
  <ul>
    <RouterLink to="/"><li>Home</li></RouterLink>
    <RouterLink to="/cpu"><li>CPU</li></RouterLink>
    <RouterLink to="/motherboard"><li>Motherboard</li></RouterLink>
    <RouterLink to="/gpu"><li>GPU</li></RouterLink>
    <RouterLink to="/ram"><li>RAM</li></RouterLink>
    <RouterLink to="/storage"><li>Storage</li></RouterLink>
    <RouterLink to="/power"><li>Power Supply</li></RouterLink>
    <RouterLink to="/custom"><li>Custom Item</li></RouterLink>
    <RouterLink to="/checkout"><li>Checkout</li></RouterLink>

  </ul>

  </div>
  <!-- should probably go in it's own component stored as the button to add or subtract items -->
  <div class="col-span-2 p-8">

    <!-- on item component if route = suchandsuch then get that item. store items in json data or sql table? -->
    <!-- leads to a warn that prop doesn't have anything done to it on most of the components -->
    <router-view @add="add" :quoteSubmit="quoteSubmit" :total="total"></router-view>

  </div>   

</div> 

<div class="checkout border-t-4 w-full fixed bottom-0 h-24 grid grid-cols-4" style="overflow:scroll">
  <div  class="col-span-2">

    <p v-for="item in quote" @click="deleteItem(item)">{{item[0]}}, £{{ item[1] }}, {{ item[2].value }}</p>
  </div>

  <p>Subtotal: £{{ subTotal }}</p>
  <p>Total(with 20% Vat): £{{ total }}</p>
  
</div>
</template>
<script>

import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue'
import Counter from './Counter.vue'
import Item from './Items.vue'
//this is the composition api, look up what needs to be in there/options api and learn differences
//also run npm run watch to get page to update
export default {

  component: {
    Counter, 
  },

  setup() {

    let quote = ref([]);

    let quoteSubmit = ref([]);

    let subTotal = ref(0);
    let total = ref(0);

    const add = (i) => {

      // needs two arguments, i == data, and count. Count should be passed up into items.vue and then should be passed into the emit.
      // adds multiple instances of same value, needs an "if exists in quote array, don't add again"
      quote.value.push(i);
      quoteSubmit.value.push(i[0], i[1], i[2].value);
      subTotal.value += i[1] * i[2].value;
      total.value = subTotal.value + (subTotal.value / 5); //20% vat calc
      // console.log(quoteSubmit.value)
    }

    const deleteItem = (i) => {

      const thing = quote.value.indexOf(i);

      subTotal.value -= i[1] * i[2].value;
      total.value = subTotal.value + (subTotal.value / 5);
      quote.value.splice(thing, 1);
      quoteSubmit.value.splice(thing, 1);

    }

    return {

      quote,
      quoteSubmit,
      add,
      subTotal,
      total,
      deleteItem
    }
    
  },

  mounted() {

  }

}
</script>