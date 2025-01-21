<template>
    <span class="bg-gray-200 text-red-200">{{peopleStore.currentStep}}</span>

</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'

export default {
    name: "ProgressBar",
    computed:{
        peopleStore(){
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
</style>
