<script>
import { ref } from 'vue'
import {useRoute} from 'vue-router'

    export default {

        emits: ['add'],
        props: ['data'],
        setup ( props, context ) {

            let currentRoute = useRoute().name;
            // console.log(currentRoute)

            let info = [];

            if (currentRoute === undefined) {

                info = [["Hello", 0, ref(0)]]
            } if (currentRoute === 'cpu') {

                info =  [["CPU", 10, ref(0)], ["Better CPU", 20, ref(0)]]
            }
            // should be something like data = if route = cpu {cpu array} if route = gpu {gpu array} etc
            let CPU =  [["CPU", 10, ref(0)], ["Better CPU", 20, ref(0)]]
            // console.log(CPU[0][2].value)
            // cpu.replace with count.value when + - pressed

            const add = (data) => {       
                context.emit("add", data)
            }

            return {

                info,
                add,
                currentRoute
            }
        },
        mounted() {

            // let currentRoute = {router: this.$router.params};
            // // let route = Object.values(currentRoute);
            // console.log(currentRoute)
            let currentRoute = useRoute();
            console.log(currentRoute)
        }


    }
</script>

<template>

    <div class="grid grid-cols-3 w-fit" v-for="data in info">
        <h2 class="col-span-3">{{ data[0] }}:</h2>
        <p class="col-span-3">£{{ data[1] }}</p>

        <p>{{ data[2].value }}</p>
        <button type="button" class="inline-block bg-indigo-400 text-white leading-normal shadow-md hover:bg-indigo-500 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value ++">+</button>
        <button type="button" class="inline-block bg-orange-400 text-white leading-normal shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg w-6 h-6" @click="data[2].value --">-</button>
    
        <!-- need add to pass count and item up to welcome emit add? -->
        <button @click="$emit('add', data)">Add to quote</button>
    
    </div>
    
</template>