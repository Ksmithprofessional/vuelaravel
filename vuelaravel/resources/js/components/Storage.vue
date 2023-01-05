<script>
import { ref } from 'vue'

    export default {

        emits: ['add'],
        props: ['quoteSubmit', 'total'],
        setup ( props, context ) {

            let info =  [["Crucial P2 500GB 3D NAND PCIe Gen3 X4 NVMe M.2-2280 Internal SSD", 35, ref(0)], 
                        ["Sabrent Rocket 500GB PCIe 4.0 NVMe M.2-2280 Internal SSD", 46, ref(0)], 
                        ["Western Digital 500 GB Caviar Green SATA 3 Gb/s Intellipower 32 MB Cache Bulk/OEM Desktop Hard Drive ", 79, ref(0)]]


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
    <!-- Should be it's own component but not 100% sure how to emit it all the way up, maybe work it out later? -->

    <div class="grid grid-cols-3 w-fit" v-for="data in info">
        <h2 class="col-span-3">{{ data[0] }}:</h2>
        <p class="col-span-3">£{{ data[1] }}</p>

        <p>{{ data[2].value }}</p>
        <button type="button" class="inline-block bg-indigo-400 text-white leading-normal shadow-md hover:bg-indigo-500 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value ++">+</button>
        <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value --" v-if="data[2].value > 0">-</button>
        <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" v-if="data[2].value === 0">-</button>
    
        <button @click="$emit('add', data)" v-if="data[2].value > 0">Add to quote</button>
        <button v-if="data[2].value === 0">Add to quote</button>
    
    </div>
    
</template>