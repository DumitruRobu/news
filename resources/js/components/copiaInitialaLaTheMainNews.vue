<template>

    <div v-if="Object.keys(news).length > 0" class="theMainTitle flex gap-5">

        <div class="ml-[10%] w-[50%] flex flex-col gap-5">

            <div class="hover:cursor-pointer">
                <p class="text-2xl">{{ news[0].title }}</p>
                <img :src=news[0].image style="width:100%">
            </div>

            <div class="w-[100%] flex gap-4">
                <div>
                    <div class="hover:cursor-pointer">
                        <img :src=news[1].image style="width:100%; height:200px;">
                        <p>{{ news[1].title }}</p>
                    </div>

                    <div class="hover:cursor-pointer">
                        <img :src=news[2].image style="width:100%; height:200px;">
                        <p>{{ news[2].title }}</p>
                    </div>
                </div>

                <div>
                    <div class="hover:cursor-pointer">
                        <img :src=news[3].image style="width:100%;height:200px;">
                        <p>{{ news[3].title }}</p>
                    </div>

                    <div class="hover:cursor-pointer">
                        <img :src=news[4].image style="width:100%;height:200px;">
                        <p>{{ news[4].title }}</p>
                    </div>
                </div>
            </div>

            <div class="w-[100%] flex gap-4">
                <div>
                    <div>
                        <img :src=news[1].image style="width:100%;height:200px;">
                        <p>{{ news[1].title }}</p>
                    </div>

                    <div>
                        <img :src=news[1].image style="width:100%;height:200px;">
                        <p>{{ news[1].title }}</p>
                    </div>
                </div>

                <div>
                    <div>
                        <img :src=news[1].image style="width:100%;height:200px;">
                        <p>{{ news[1].title }}</p>
                    </div>

                    <div>
                        <img :src=news[1].image style="width:100%;height:200px;">
                        <p>{{ news[1].title }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[30%] flex flex-col mt-4">
            <div class="mb-5">
                <img :src=news[1].image style="width:550px">
                <p class="bg-gray-200 w-[93%] font-extralight">{{ news[1].title }}</p>
            </div>
            <div class="mb-5">
                <img :src=news[2].image style="width:550px">
                <p class="font-extralight w-[93%]">{{ news[2].title }}</p>
            </div>
            <div class="mb-5">
                <img :src=news[1].image style="width:550px">
                <p>{{ news[1].title }}</p>
            </div>
            <div class="mb-5">
                <img :src=news[1].image style="width:550px">
                <p>{{ news[1].title }}</p>
            </div>
            <div class="mb-5">
                <img :src=news[1].image style="width:550px">
                <p>{{ news[1].title }}</p>
            </div>
            <div class="mb-5">
                <img :src=news[1].image style="width:550px">
                <p>{{ news[1].title }}</p>
            </div>
        </div>
    </div>


</template>

<script setup>

import {ref, onMounted} from 'vue'

const news = ref({});

function selectAllNews() {
    axios.get('/api/getNews').then(res => {
        news.value = res.data.data;
        console.log(res.data.data);
    });
}

onMounted(() => {
    selectAllNews();
})

</script>

<style lang="scss" scoped>
p:hover {
    color: #7070e7;

}
</style>
