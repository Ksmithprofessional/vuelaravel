<template>

<div class="grid grid-rows-[95px_1fr] w-full h-[85vh]">

  <div class="menu bg-[#282634] text-white">

    <img src="../../../public/logo.png">

    <!-- left items menu  bg-[#36454F]-->

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

  <div class="main">
  <!-- should probably go in it's own component stored as the button to add or subtract items -->
    <div class="main-sub-container p-12 w-[80%] my-0 mx-auto">
      <!-- on item component if route = suchandsuch then get that item. store items in json data or sql table? -->
      <!-- leads to a warn that prop doesn't have anything done to it on most of the components -->
      <router-view @add="add" :quoteSubmit="quoteSubmit" :total="total"></router-view>

    </div>  
  
  </div>

</div> 

<div class="checkout fixed h-[15vh] bg-[#282634] text-white">
  <div class="checkout-sub grid grid-cols-4 my-0 mx-auto w-[80%]">
    <div class="quote-items col-span-2 p-3 px-2">

      <p style="hover{color:red; cursor:pointer;}" v-for="item in quote" @click="deleteItem(item)">{{item[0]}}, £{{ item[1] }}, {{ item[2] }}</p>
    </div>

    <p class=" sub-total py-3 px-2">Subtotal: £{{ subTotal }}</p>
    <p class="total py-3 px-2">Total(+ 20% Vat): £{{ total }}</p>
  
  </div>
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

      // console.log(i)
      let item = i[0];
      let cost = i[1];
      let quantity = i[2];
      let data = [item, cost, quantity]
      // console.log(quote.value.indexOf(i));
      // quote.value.forEach(element => console.log(element));
      // works if i don't push data as an array

      let check = '';

      let checkQuote = quote.value.forEach(element => {
        
        // console.log(element.indexOf(item));
        if (element.indexOf(item) === 0) {
          check = true;
        }
      
      });
      // console.log(checkQuote)
      if (check === true) {
        alert('Item already in quote, please delete it if you want to add it again');
        // successfully blocks multiple entries of i but not data. Needs to probably alert that though
      } else {
      // needs two arguments, i == data, and count. Count should be passed up into items.vue and then should be passed into the emit.
      // adds multiple instances of same value, needs an "if exists in quote array, don't add again"
      quote.value.push(i);
      quoteSubmit.value.push(i);
      subTotal.value += cost * quantity;
      total.value = subTotal.value + (subTotal.value / 5); //20% vat calc
      // console.log(quoteSubmit.value)
      // console.log(quote.value.forEach());
      }
    }

    const deleteItem = (i) => {

      const thing = quote.value.indexOf(i);

      subTotal.value -= i[1] * i[2];
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