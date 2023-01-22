<script>
import { ref } from 'vue'

    export default {

        emits: ['add'],
        props: ['quoteSubmit', 'total'],
        setup ( props, context ) {

            let info =  [["EVGA 750 GQ, 80+ Gold Certified 750W", 164, ref(0)], 
                        ["ASUS ROG Thor 850, 80+ Platinum Certified 850W", 284, ref(0)], 
                        ["Corsair RMX Series (RM750X), 80+ Gold Certified 750W", 250, ref(0)]]


            const add = (data) => {       
                context.emit("add", data)
            }

            return {

                info,
                add
            }
        }

    }
</script>

<template>

    <div class="py-3 item" v-for="data in info">
        <h2 class="">{{ data[0] }}</h2>
        <p class="">£{{ data[1] }}</p>

        <p>{{ data[2].value }}</p>
        <button class="plus-button" @click="data[2].value ++">+</button>
        <button class="minus-button" @click="data[2].value --" v-if="data[2].value > 0">-</button>
        <button class="minus-button" v-if="data[2].value === 0">-</button>
    
        <!-- need add to pass count and item up to welcome emit add? -->
        <button class="quote-add" @click="$emit('add', [data[0], data[1], data[2].value])" v-if="data[2].value > 0">Add to quote</button>
        <button class="quote-add" v-if="data[2].value === 0">Add to quote</button>
    
    </div>
    
</template>