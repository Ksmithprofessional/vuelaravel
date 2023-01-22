<script>
import { ref } from 'vue'

    export default {

        props: ['quoteSubmit', 'total'],
        setup ( props, context ) {

            let error = ref('');

            const submitForm = (title, quantity, price) => {

                if (title === undefined || title === '') {

                    error.value = 'Please provide a short description'
                    document.querySelector('#custom-title').style = 'border-color:red;'
                } else if (quantity === undefined || quantity === '') {

                    error.value = 'Please provide a quantity'
                    // console.log('hello2')
                    document.querySelector('#custom-title').style = 'border-color:black;'
                    document.querySelector('#quantity').style = 'border-color:red;'
                } else if (/\D/.test(quantity)) { 
                    
                    error.value = 'Quantity must be a number'
                    // console.log('match')
                    document.querySelector('#custom-title').style = 'border-color:black;'
                    document.querySelector('#quantity').style = 'border-color:red;'
                } else if (price === undefined || price === '') {

                    error.value = 'Please provide a price'
                    // console.log(error.value)
                    document.querySelector('#custom-title').style = 'border-color:black;'
                    document.querySelector('#quantity').style = 'border-color:black;'
                    document.querySelector('#price').style = 'border-color:red;'
                } else if (/\D/.test(price)) { 
                    
                    error.value = 'Price must be a number'
                    // console.log('match2')
                    document.querySelector('#custom-title').style = 'border-color:black;'
                    document.querySelector('#quantity').style = 'border-color:black;'
                    document.querySelector('#price').style = 'border-color:red;'
                } else if (title !== undefined && quantity !== undefined && price !== undefined && /\D/.test(quantity) === false && /\D/.test(price) === false) {

                    // let amount = quantity;

                    let data = [title, price, quantity];
                    // console.log(title);
                    context.emit("add", data);
                    error.value = '';
                    document.querySelector('#custom-title').style = 'border-color:black;'
                    document.querySelector('#quantity').style = 'border-color:black;'
                    document.querySelector('#price').style = 'border-color:black;'
                }
            }

            return {

                submitForm,
                error,

            }
        }

    }
</script>

<template>

    <div class="w-fit">

        <form class="custom-form" @submit.prevent="submitForm(title, quantity, price, description)">
            <fieldset>
                <legend>Add a custom item</legend>
                <label for="custom-title">Title</label>
                <input type="input" id="custom-title" v-model="title" placeholder="Short description of your item">
            
                <label for="quantity">Quantity</label>
                <input type="input" id="quantity" v-model="quantity" placeholder="How many do you want?">

                <label for="price">Price</label>
                <input type="input" id="price" v-model="price" placeholder="How much do you want to pay?">

                <!-- <label for="description">Description</label>
                <textarea id="description" v-model="description" placeholder="Longer description of your custom item"></textarea> -->

                <button class="quote-add">Add to quote</button>
                <p style="margin-top:10px; color:red;">{{ error }}</p>
            </fieldset>
        </form>
    
    </div>
    
</template>