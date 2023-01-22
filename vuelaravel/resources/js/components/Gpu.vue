<script>
import { ref } from 'vue'

    export default {

        emits: ['add'],
        props: ['quoteSubmit', 'total'],
        setup ( props, context ) {

            let info =  [["MSI GeForce RTX 3060 VENTUS", 356, ref(0)], ["EVGA Geforce RTX 3080 Ti FTW3 Ultra", 2500, ref(0)], 
                        ["ASROCK Radeon RX 6900 XT PGD 16G OC ", 812, ref(0)]]


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