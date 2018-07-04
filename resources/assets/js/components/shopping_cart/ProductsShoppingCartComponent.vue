<template>
    <div>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th></th>
            </tr>
        </thead>
        <material-transition-group tag="tbody">
            <tr :key="index" :data-index="index" v-for="(product, index) in products">
                <td class="text-uppercase">{{product.title}}</td>
                <td>{{product.amount}}</td>
                <td>{{product.humanPrice}}</td>
                <td><remove-product-btn :product="product" :refresh="fetchProducts"></remove-product-btn></td>
            </tr>
            <tr :key="products.length + 1" :data-index="products.length + 1" class="table-active">
                <td>Total</td>
                <td></td>
                <td></td>
                <td>{{total}}</td>
            </tr>
        </material-transition-group>
    </table>
    <reset-cart-btn :refresh="fetchProducts"></reset-cart-btn>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                endPoint: 'carrito/productos',
                products: [],
            }
        },
        created() {
            this.fetchProducts();
        },
        computed: {
            total() {
                let cents = this.products.reduce((acumulator, currentObj) => {
                    return acumulator + (currentObj.numberPrice * currentObj.amount)
                }, 0)
                return `$${cents/100}`;
            }
        },
        methods: {
            fetchProducts() {
                axios.get(this.endPoint).then(response => {
                    this.products = response.data.data;
                })
            }
        }
    }
</script>
