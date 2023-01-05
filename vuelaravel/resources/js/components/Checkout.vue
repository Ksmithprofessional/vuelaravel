<script>
import { ref } from 'vue'

    export default {

        props: ['quoteSubmit', 'total'],

        setup ( props, context ) {



            return {

               

            }
        }

    }
</script>

<template>

    <div class="w-fit">

        <form>

            <label for="email">Email address:</label>
            <input id="email" placeholder="Email@email.email">
            <textarea id="quote" v-model="quoteSubmit" readonly></textarea>
            <input id="total" v-model="total" readonly>
            <button>Checkout</button>
        </form>
    
    </div>
    
</template>