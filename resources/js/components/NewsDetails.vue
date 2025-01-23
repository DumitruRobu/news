<template>
    <div v-if="theContent">
        <p>{{theContent.title}}</p>
        <img :src="theContent.image">
        <p>{{theContent.content}}</p>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import {useRoute, useRouter} from 'vue-router';

const route = useRoute();
const router = useRouter();

const theContent = ref([]);

function getInfo() {
    axios.get(`/api/getNewsInfo/${route.params.id}`).then(res => {
        theContent.value = res.data.data;
        console.log(res.data.data);
    })
}

onMounted(() => {
    getInfo();
})

</script>

<style scoped>

</style>
