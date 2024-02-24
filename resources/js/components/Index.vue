<template>
    <div>
        <nav aria-label="breadcrumb" style="margin-left: 20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/home" class="breadcrumb">Home</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link to="/first" class="breadcrumb">First</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link to="/categories" class="breadcrumb">Categories</router-link>
                </li>
            </ol>
        </nav>
        <hr>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
