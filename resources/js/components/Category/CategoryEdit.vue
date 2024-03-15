<template>
    <div class="container">
        <router-link :to="{ name: 'category.show', params:{id: this.$route.params.id}}">Back to Show</router-link>
        <h2>Edit Category</h2>
        <div class="w-50">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" v-model="categoryName" class="form-control" id="categoryName" placeholder="Category Name">
            </div>
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Description</label>
                <input type="text" v-model="categoryDescription" class="form-control" id="categoryDescription" placeholder="Category Description"
                       :disabled="!isAllowEditDescription">
            </div>
            <div class="form-check">
                <input class="form-check-input" v-model="active" type="checkbox" value="" id="active" :checked="active">
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
        </div>
        <br>
        <button type="button" @click.prevent="update()" class="btn btn-primary">Submit</button>
    </div>
</template>

<script>

export default {
    name: "CategoryEdit",

    data() {
        return {
            categoryName: '',
            categoryDescription: '',
            active: true,
        };
    },

    mounted() {
        this.getItem();
    },

    computed: {
        isDisabled()
        {
            return this.categoryName.trim()
        },

        isAllowEditDescription() {
            return this.$store.getters.description
        }
    },

    methods: {

        getItem() {
            axios.get(`/api/categories/${this.$route.params.id}`)
                .then(res => {
                    // console.log(this.$route)
                    this.categoryName = res.data.data.category_name;
                    this.categoryDescription = res.data.data.category_description;
                    this.active = res.data.data.active;
                })
        },

        update() {
            axios.patch(`/api/categories/${this.$route.params.id}`, {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then(() => {
                    this.$router.push({name: 'category.show', params: {id: this.$route.params.id}})
                    alert("Category updated successfully!")
                })
        },
    }
}
</script>

<style scoped>

</style>
