<template>
    <button class="remove-btn" @click="removeFromCart"><i class="material-icons">clear</i></button>
</template>

<script>
export default {
    data() {
        return {
            endPoint: '/in_shopping_carts'
        }
    },
    props: {
        product: {type: Object},
        refresh: {type: Function}
    },
    methods: {
        removeFromCart() {
            axios({
                method: 'DELETE',
                url: this.endPoint+'/'+this.product.shop_id,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                swal({
                    type: "success",
                    text: response.data.message
                });
                window.store.commit("decrement");
                this.refresh();
            }).catch((error) => {
                swal({
                    type: "error",
                    text: error.data.message
                })
            });
        }
    }
}
</script>
