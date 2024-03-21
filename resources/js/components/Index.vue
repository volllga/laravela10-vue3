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
                    <router-link :to="{ name: 'category.index' }" class="breadcrumb">Categories</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'employee' }" class="breadcrumb">Employees</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'invoice' }" class="breadcrumb">Invoices</router-link>
                </li>
            </ol>
        </nav>
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
