<template>
<div class="flex flex-col gap-4 items-center justify-center">
    <p>Congrats!</p>
    <p>You successfully submitted the form!</p>
    <p>Go back to main menu <router-link :to="{name:'MainMenu'}"><u>here:</u></router-link></p>
</div>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
export default {
    name: "Final",
    computed:{
        peopleStore(){
            return usePeopleStore()
        }
    },
    mounted(){
        this.peopleStore.currentStep = 4;
    },
}
</script>

<style scoped>

</style>
