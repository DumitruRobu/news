<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Hello from main menu component</p>
        <p>For submitting the form, pls click
            <router-link :to="{name:'Personal'}"><u>here</u></router-link>
        </p>
    </div>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
export default {
    name: "MainMenuComponent",
    computed:{
        peopleStore(){
            return usePeopleStore()
        }
    },
    mounted(){
        this.peopleStore.currentStep = 0;
    },
}
</script>

<style scoped>

</style>
