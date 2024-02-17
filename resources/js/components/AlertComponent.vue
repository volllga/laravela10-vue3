<template>
    <div v-if="errors" class="alert-container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" @click="clearErrors" aria-label="Close"></button>
            <ul>
                <li v-for="(error, key) in errors" :key="key">{{ error.join(', ') }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        errors: Array,
    },

    methods: {
        clearErrors() {
            this.$emit('clear-errors');
        },
    },
};
</script>

<style scoped>
.alert-container {
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 1000;
}

</style>
