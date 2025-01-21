<template>
    <p class="text-center">Hello from home component</p>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
export default {
    name: "HomeComponent",
    computed:{
        peopleStore(){
            return usePeopleStore()
        }
    },
    mounted(){
        this.peopleStore.currentStep = 0;
    }
}
</script>

<style scoped>

</style>
