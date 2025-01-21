<template>
    <div v-if="news.length" class="theMainTitle flex gap-5">

        <!-- Main Highlighted News -->
        <div class="ml-[10%] w-[50%] flex flex-col gap-5">
            <div>
                <p>{{ news[0].title }}</p>
                <img :src="news[0].image" style="width:100%">
            </div>

            <!-- Two Columns of News -->
            <div v-for="(group, groupIndex) in groupedNews(news.slice(1), 2)" :key="groupIndex" class="w-[100%] flex gap-4">
                <div v-for="(item, itemIndex) in group" :key="itemIndex">
                    <div>
                        <img :src="item.image" style="width:550px">
                        <p>{{ item.title }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar News -->
        <div class="w-[30%] flex flex-col mt-4">
            <div v-for="(item, index) in news.slice(5)" :key="index">
                <img :src="item.image" style="width:550px">
                <p>{{ item.title }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const news = ref([]);

// Fetching news from the backend
async function selectAllNews() {
    try {
        const response = await axios.get("/api/getNews");
        news.value = response.data.data;
    } catch (error) {
        console.error("Error fetching news:", error);
    }
}

// Utility function to group the news into chunks (e.g., 2 items per group)
function groupedNews(array, size) {
    return array.reduce((acc, curr, index) => {
        if (index % size === 0) acc.push([]);
        acc[acc.length - 1].push(curr);
        return acc;
    }, []);
}

onMounted(() => {
    selectAllNews();
});
</script>

<style lang="scss" scoped>
// Your existing styles can stay here
</style>
