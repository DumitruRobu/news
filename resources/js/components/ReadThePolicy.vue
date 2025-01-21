<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Read the policy here:</p>
        <p>(c) by IT Group all right reserved!</p>

        <div class="flex gap-4">
            <button>
                <router-link :to="{name:'AddImg'}">Previous</router-link>
            </button>
            <button>
                <router-link :to="{name:'Final'}">Submit</router-link>
            </button>
        </div>
    </div>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
export default {

    name: "ReadThePolicy",
    computed:{
        peopleStore(){
            return usePeopleStore()
        }
    },
    mounted(){
        this.peopleStore.currentStep = 3;
    },
}
</script>

<style scoped>

</style>
