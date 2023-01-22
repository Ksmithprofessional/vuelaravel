<script>
import { ref } from 'vue'

    export default {

        props: ['quoteSubmit', 'total'],

        setup ( props, context ) {

            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            let error = ref('');
            let email = ref('');

            // doesn't work, fix
            const checkForm = (e) => {

                const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (regex.test(email.value) === false) {
                    
                    document.querySelector('#email').style = 'border-color:red;';
                    error.value = 'Invalid email address';
                    console.log(total.value);
                    e.preventDefault();
                } else if (total.value === '0') {

                    document.querySelector('#quote').style = 'border-color:red;';
                    document.querySelector('#total').style = 'border-color:red;';
                    document.querySelector('#email').style = 'border-color:black;';
                    error.value = 'Please add something to the quote';
                    e.preventDefault();
                }
            }

            return {

               csrf,
               checkForm,
               error,
               email,

            }
        }

    }
</script>

<template>

    <div class="w-fit">

        <form method="POST" action="/checkout" @submit="checkForm">

            <fieldset>
                <legend>Checkout</legend>
                <!-- needed the csrf token, had to add it elsewhere with the hidden field here -->
                <input type="hidden" name="_token" :value="csrf">
                <label for="email">Email address:</label>
                <input id="email" name="email" v-model="email" placeholder="Email@email.email">
                <label for="quote">Quote:</label>
                <textarea id="quote" name="quote" v-model="quoteSubmit" readonly></textarea>
                <label for="total">Total:</label>
                <input id="total" name="price" v-model="total" readonly>
                <button type="submit" class="quote-add">Checkout</button>
                <p style="margin-top:10px; color:red;">{{ error }}</p>
            </fieldset>
        </form>
    
    </div>
    
</template>