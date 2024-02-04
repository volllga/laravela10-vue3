<!--
https://eugenkiss.github.io/7guis/tasks/#counter
-->

<template>
    <button type="button" class="btn btn-secondary" @click="count++">Count {{ count }}</button>
</template>

<script setup>
import { ref } from 'vue'
// export default {
//     name: 'CounterComponent',
// }

const count = ref(0)
</script>

