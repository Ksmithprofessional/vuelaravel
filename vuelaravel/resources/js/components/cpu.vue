<script>
import { ref } from 'vue'

    export default {

        emits: ['add'],
        props: ['quoteSubmit', 'total'],
        setup (context ) {

            let info =  [["AMD Ryzen 9 3900X", 330, ref(0)], ["Intel Core i7-13700KF ", 422, ref(0)], 
                        ["AMD Ryzen 7 7700X", 361, ref(0)]]


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

    <div class="grid grid-cols-3 w-fit" v-for="data in info">
        <h2 class="col-span-3">{{ data[0] }}:</h2>
        <p class="col-span-3">£{{ data[1] }}</p>

        <p>{{ data[2].value }}</p>
        <button type="button" class="inline-block bg-indigo-400 text-white leading-normal shadow-md hover:bg-indigo-500 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value ++">+</button>
        <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value --" v-if="data[2].value > 0">-</button>
        <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" v-if="data[2].value === 0">-</button>
    
        <!-- need add to pass count and item up to welcome emit add? -->
        <button @click="$emit('add', data)" v-if="data[2].value > 0">Add to quote</button>
        <button v-if="data[2].value === 0">Add to quote</button>
    
    </div>
    
</template>