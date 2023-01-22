<script>
import { RouterLink, RouterView } from 'vue-router';
export default {

    setup() {


    }
}
</script>

<template>

    <div class="item">
        <h3 style="padding:15px; font-size:1.2rem; font-weight:bold;">Click on a link to start building your dream PC!</h3>
        <hr>
        <RouterLink to="/cpu"><p>CPU</p></RouterLink>
        <RouterLink to="/motherboard"><p>Motherboard</p></RouterLink>
        <RouterLink to="/gpu"><p>GPU</p></RouterLink>
        <RouterLink to="/ram"><p>RAM</p></RouterLink>
        <RouterLink to="/storage"><p>Storage</p></RouterLink>
        <RouterLink to="/power"><p>Power Supply</p></RouterLink>
        <RouterLink to="/custom"><p>Custom Item</p></RouterLink>
        <RouterLink to="/checkout"><p>Checkout</p></RouterLink>
    </div>
    
</template>