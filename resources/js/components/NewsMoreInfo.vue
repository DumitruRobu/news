<template>
    <div class="flex flex-col items-center justify-center">
        <!-- Title -->
        <p class="font-light w-[40%] text-lg">{{ theContent.title }}</p>

        <!-- Image -->
        <img class="w-[40%]" v-if="theContent.image" :src="`/${theContent.image}`" alt="imgNew">

        <div class="prose" v-html="theContent.content"></div>
        <!-- Processed Content -->
<!--        <div v-if="processedContent" class="w-[40%] text-justify">-->
<!--            <p v-for="(paragraph, index) in processedContent" :key="index" v-html="paragraph"></p>-->
<!--        </div>-->

    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();

const theContent = ref({});
const processedContent = ref([]);
function getInfo() {
    axios.get(`/api/getNewsInfo/${route.params.id}`).then((res) => {
        theContent.value = res.data.data;
        // formatContent(res.data.data.content);
    });
}

// function formatContent(content) {
//     if (!content) return;
//
//     // Split content into sentences and paragraphs
//     const sentences = content.split('. ').map((s) => s.trim());
//     if (sentences.length === 0) return;
//
//     // Make the first sentence bold and create paragraphs
//     const paragraphs = [];
//     let currentParagraph = `<strong>${sentences.shift()}.</strong>`;
//
//     sentences.forEach((sentence) => {
//         if (currentParagraph.split('.').length - 1 >= 3) {
//             paragraphs.push(currentParagraph);
//             currentParagraph = sentence+'.';
//         } else {
//             currentParagraph += ' ' + sentence + '.';
//         }
//     });
//
//     if (currentParagraph) {
//         paragraphs.push(currentParagraph);
//     }
//
//     // Save formatted paragraphs
//     processedContent.value = paragraphs;
//     console.log(processedContent.value);
// }

onMounted(() => {
    getInfo();
});
</script>

<style scoped>
/*p {*/
/*    margin-bottom: 1em;*/
/*    text-indent: 2em;*/
/*}*/
</style>
