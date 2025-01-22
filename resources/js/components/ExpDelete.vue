<template>
<div v-if="Object.keys(theContent).length > 0">
    <p>{{theContent.id}}</p>
    <p>{{theContent.title}}</p>
    <div>{{theContent.content}}</div>
    <img :src="theContent.image">
</div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
const theContent = ref({});

function getInfo(){
    axios.get('/api/getNewsInfo/0').then(res =>{
         theContent.value = res.data;
        console.log(res.data);
    })
}

onMounted(()=>{
    getInfo();
})

</script>

<style scoped>

</style>
