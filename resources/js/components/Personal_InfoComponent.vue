<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Lets add the info:</p>
        <input v-model="this.peopleStore.name" class="border border-1 rounded p-2" type="text" placeholder="numele">
        <button class="border border-1 p-2 rounded">
            <router-link :to="{name:'AddImg'}">Next</router-link>
        </button>

    </div>

</template>

<script>
import {usePeopleStore} from '../../../stores/people.js'

export default {
    name: "Personal_InfoComponent",

    computed: {
        peopleStore() {
            return usePeopleStore()
        }
    },
    mounted() {
        this.peopleStore.currentStep = 1;
    },
    data() {
        return {
            name: null,
        }
    }
}
</script>

<style scoped>

</style>
