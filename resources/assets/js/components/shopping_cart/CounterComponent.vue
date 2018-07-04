<template>
    <a href="/carrito" class="btn-carrito">
        <i class="material-icons">shopping_cart</i> Ver carrito&nbsp;
        <span> ( {{productsCount}} )</span>
    </a>
</template>


<script>
    export default {
        props: ["count"],
        created() {
            window.store.commit("set", this.count)
        },
        computed: {
            productsCount() {
                return window.store.state.productsCount;
            }
        }
    }
</script>
