<!--
https://eugenkiss.github.io/7guis/tasks/#counter
-->

<template>
    <button type="button" class="btn btn-secondary" @click="incrementCount">Count {{ count }}</button>
</template>

<script>
import { ref } from 'vue'
export default {
    setup() {
        const count = ref(0);

        const incrementCount = () => {
            count.value++;
        };

        return {
            count,
            incrementCount
        };
    },

    mounted() {
        // this.$parent.$refs.table.tableLog();
    }
};

</script>

