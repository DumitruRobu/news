<template>
    <div v-if="news.length > 0" class="w-[50%]">
        <p>{{news[0].title}}</p>
        <img :src="news[0].image">
    </div>

    <div>

    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue'

const news = ref([]);
async function getResults(){
    try{
        const response = await axios.get('/api/getNews');
        news.value = response.data.data;

    }catch (error){
        console.error('Error during data fetching ' + error);
    }
}
onMounted(()=>{
    getResults();
})

</script>

<style scoped>

</style>
