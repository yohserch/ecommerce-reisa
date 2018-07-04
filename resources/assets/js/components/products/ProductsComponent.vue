<template>
    <material-transition-group tag="div"class="row">
        <product-card-component :key="product.id" :data-index="index" v-for="(product, index) in products" v-bind:product="product">
        </product-card-component>
    </material-transition-group>
</template>


<script>
export default {
    data() {
        return {
            products : [],
            endpoint: '/products'
        }
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
            axios.get(this.endpoint).then((response) => {
                console.log(response);
                this.products = response.data.data;
            });
        }
    }
}
</script>
