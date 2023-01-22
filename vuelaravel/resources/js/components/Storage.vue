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