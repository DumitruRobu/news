<template>
    <div v-if="result">
        <p v-html="result.content"></p>
        <p class="text-blue-500">And nooow!</p>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue'


</script>

<style scoped>

</style>
