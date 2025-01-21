<template>
    <div class="flex gap-4 items-center justify-center mt-2" v-if="peopleStore.currentStep !== 0">
        <p v-for="step in peopleStore.totalSteps" class="roundedStep"
           :style="{backgroundColor: step-1 >= peopleStore.currentStep ? '#EB7D97' : '#83B3AD'}">
            {{step}}
        </p>
    </div>

    <div class="flex items-center justify-center gap-3 m-4">
        <router-link class="rounded hover:bg-gray-200 p-2" :to="{name:'Home'}">Home</router-link>
        <router-link class="rounded hover:bg-gray-200 p-2" :to="{name:'MainMenu'}">Main Menu</router-link>
        <router-link class="rounded hover:bg-gray-200 p-2" :to="{name:'News'}">News</router-link>
    </div>

    <router-view></router-view>
</template>

<script>
import {usePeopleStore} from '../../../stores/people.js'
import ProgressBar from "./ProgressBar.vue";

export default {
    name: "IndexComponent",
    components: {ProgressBar},

    computed: {
        peopleStore() {
            return usePeopleStore()
        }
    },
}
</script>

<style scoped>
.theLoadingBar{
    margin-top:10px;
    transition: width 0.3s ease-in-out;
    overflow: hidden;
    margin-left:1%;
}
.roundedStep{
    width: 50px;           /* Width of the circle */
    height: 50px;          /* Height of the circle (same as width to make it round) */
    border-radius: 50%;    /* Makes the element a perfect circle */
    display:flex;
    align-items: center;
    justify-content: center;
    color:white;
    transition: background-color 0.3s ease-in-out;
}
</style>
