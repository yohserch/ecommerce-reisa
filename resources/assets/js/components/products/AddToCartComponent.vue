<template>
    <div class="buttons">
        <input type="text" v-model="quantity">
        <div class="quantity-modifier">
            <a href="" @click="addQuantity"><i class="material-icons">expand_less</i></a>
            <a href="" @click="lessQuantity"><i class="material-icons">expand_more</i></a>
        </div>
        <button @click="addToCart">{{message}}</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: 'Agregar al carrito',
                endPoint: '/in_shopping_carts',
                quantity: "1"
            }
        },
        props: { product: {type: Object} },
        methods: {
            addToCart() {
                axios({
                    method: 'POST',
                    url: this.endPoint,
                    data: {
                        product_id : this.product.id,
                        amount: this.quantity
                    },
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                }).then((response) => {
                    swal({
                        type: "success",
                        text: response.data.message
                    });
                    window.store.commit("increment");
                    this.quantity = "1";
                }).catch((error) => {
                    swal({
                        type: "error",
                        title: "Ocurrio un error",
                        text: error.message
                    })
                });
            },
            addQuantity(event) {
                event.preventDefault();
                var q = parseInt(this.quantity) + 1;
                this.quantity = q.toString();
            },
            lessQuantity(event) {
                event.preventDefault();
                var q = parseInt(this.quantity) - 1;
                if (q < 0) {
                    q = 0;
                }
                this.quantity = q.toString();
            }
        }

    }
</script>
