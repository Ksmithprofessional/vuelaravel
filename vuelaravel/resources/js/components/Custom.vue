<script>
import { ref } from 'vue'

    export default {

        props: ['quoteSubmit', 'total'],
        setup ( props, context ) {

            const submitForm = (title, quantity, price) => {

                let amount = ref(quantity);

                let data = [title, price, amount];
                // console.log(data);
                context.emit("add", data);
            }

            return {

                submitForm,

            }
        }

    }
</script>

<template>

    <div class="w-fit">

        <form @submit.prevent="submitForm(title, quantity, price, description)">
            <fieldset>
                <legend>Add a custom item</legend>
                <label for="custom-title">Title</label>
                <input type="input" id="custom-title" v-model="title" placeholder="Short description of your custom item">
            
                <label for="quantity">Quantity</label>
                <input type="input" id="quantity" v-model="quantity" placeholder="How many do you want?">

                <label for="price">Price</label>
                <input type="input" id="price" v-model="price" placeholder="How much do you think you should pay? (we'll email you if you undercut it)">

                <!-- <label for="description">Description</label>
                <textarea id="description" v-model="description" placeholder="Longer description of your custom item"></textarea> -->

                <button>Add to quote</button>
            </fieldset>
        </form>
    
    </div>
    
</template>