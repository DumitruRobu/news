<template>
    <div class="theParentBlock" v-if="news.length > 0">
        <div class="newsDiv" v-for="new1 in news">
            <router-link :to="{name:'NewsMoreInfo', params:{id:new1.id}}">
                <img :src="new1.image">
                <p>{{ new1.title }}</p>
            </router-link>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue'

const news = ref([]);

async function getResults() {
    try {
        const response = await axios.get('/api/getNews');
        news.value = response.data.data;

    } catch (error) {
        console.error('Error during data fetching ' + error);
    }
}

onMounted(() => {
    getResults();
})

</script>

<style lang="scss" scoped>
.theParentBlock {
    display: flex;
    flex-wrap: wrap;
    margin-left: 5%;
    margin-top: 10px;
    gap: 10px;

}

img {
    width: 300px;
    height: 200px;
}

.newsDiv {
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    padding:3px;
    //box-shadow: 0 0 65px rgba(184, 184, 184, 0.5);

    p {
        width: 300px;

        &:hover {
            color: #143b9a;

        }
    }

    &:hover {
        background-color: #dedede;
    }
}
</style>
