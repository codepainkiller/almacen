<template>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['products'],
        mounted: function () {
            console.log('Component Table ready.')
        }

    }
</script>
