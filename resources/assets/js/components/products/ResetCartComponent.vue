<template>
    <button class="btn btn-danger" v-show="count > 0" @click="reset">Vaciar carrito</button>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data() {
        return {
            endPoint: '/in_shopping_carts/reset',
            // count: this.$store.getters.getProds
        }
    },
    props: {
        refresh: {type: Function}
    },
    computed: {
        ...mapGetters({
            count: 'getProds'
        })
    },
    methods: {
        reset() {
            axios({
                method: "POST",
                url: this.endPoint,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then((success) => {
                swal({
                    type: 'success',
                    text: success.data.message
                });
                window.store.commit('set', 0);
                this.refresh();
            }).catch((error)=> {
                swal({
                    type: 'error',
                    text: error.data.message
                })
            })
        }
    }
}
</script>
