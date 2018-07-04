<template>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="card">
            <h2 class="card-header bg-primary">
                <a :href="`/products/${product.short_name}`" class="text-white">{{ product.title }}</a>
            </h2>
            <div class="card-body">
                <div class="card-text">
                    {{product.description}}
                </div>
            </div>
            <div class="card-footer text-center">
                Precio: {{product.humanPrice}}
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        product: {
            type: Object
        }
    }
}
</script>
