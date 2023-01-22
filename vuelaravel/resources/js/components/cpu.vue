<script>
import { ref } from 'vue'

    export default {

        emits: ['add'],
        props: ['quoteSubmit', 'total'],
        setup (context ) {

            let info =  [["AMD Ryzen 9 3900X", 330, ref(0)], ["Intel Core i7-13700KF ", 422, ref(0)], 
                        ["AMD Ryzen 7 7700X", 361, ref(0)]]


            // this doesn't even do anything
            const add = (data) => {      
                context.emit("add", data)
            }

            const isZero = (i) => {

                if (i === 0) {
                    console.log('no');
                    return true;
                } else {
                    console.log('yes');
                    return false;
                }
            }

            return {

                info,
                add,
                isZero
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