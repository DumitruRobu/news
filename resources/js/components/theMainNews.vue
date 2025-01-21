<template>
    <p>The Main News Feed!</p>

    <!--    <div class="flex gap-2">-->
    <!--        <div class="mainNews mt-1">-->
    <!--            <p><span class="p-1 bg-[#DA0000] text-white">ULTIMA ORĂ:</span>-->
    <!--                Noi artifacte care demonstreaza existenta templierilor gasite la Viena.-->
    <!--                Ce au reușit să afle oamenii de știință despre viața templierilor și-->
    <!--                de ce Italia își înainteaza dreptul la lucrările arheologice?-->
    <!--            </p>-->
    <!--            <img src="templiers.jpg">-->
    <!--        </div>-->

    <!--        <div class="flex flex-col">-->
    <!--            <div>-->
    <!--                <img class="w-[455px]" src="autumn.jpg">-->
    <!--                <p>Ce spun meteorologii despre toamna 2025?-->
    <!--                    Se așteaptă să avem cea mai călduroasă toamnă din ultimele 100 de ani.-->
    <!--                </p>-->
    <!--            </div>-->

    <!--            <div>-->
    <!--                <img class="w-[455px]" src="i.jpg">-->
    <!--                <p>Dar tu ti-ai facut deja planurile pentru vara?-->
    <!--                    Top destinatii alese de moldoveni pentru acest an. Se asteapta o majorare a preturilor pentru-->
    <!--                    vacanta?-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


</template>

<script setup>

import {ref, onMounted} from 'vue'

const news = ref({});

function selectAllNews() {
    axios.get('/api/getNews').then(res => {
        news.value = res.data.news;
    });
}
onMounted( ()=>{
    selectAllNews();
})

</script>

<style lang="scss" scoped>
//.mainNews {
//    margin-left: 5%;
//
//
//    img {
//        width: 589px;
//        height: 380px;
//    }
//
//    p {
//        font-weight: bold;
//        font-size: 20px;
//    }
//}
//
//.rightSide {
//}
</style>
