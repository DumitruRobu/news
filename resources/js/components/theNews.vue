<template>
    <div class="theBanner">
        <div class="theOptions">
            <img class="w-[125px] h-[70%]" src="proLogo.png">
            <button>Jurnale de Stiri</button>
            <button>Ultimele Stiri</button>
            <button>Program TV</button>
            <button>Contacte</button>
        </div>
    </div>

    <div class="theNewsContent">
            <the-main-news></the-main-news>
    </div>

</template>

<script>
import TheMainNews from "./theMainNews.vue";

export default {
    name: "theNews",
    components: {TheMainNews}
}
</script>

<style scoped>
.theBanner {
    width: 100%;
    background: linear-gradient(to right,
    rgb(33, 162, 243), /* Less intense on the left */
    rgb(25, 71, 220), /* More intense in the middle */
    rgb(0, 27, 107)); /* Less intense on the right */
    height: 70px;
    display: flex;
    color: white;
    align-items: center;
    font-weight: bold;
    box-shadow: 0 0 65px rgba(184, 184, 184, 0.5);
}
.theOptions{
    width:70%;
    display:flex;
    justify-content: space-between;
    margin:1px auto;
}
</style>
