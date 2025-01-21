<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Add a img here!</p>

        <div class="flex gap-4">
            <button>
                <router-link :to="{name:'Personal'}">Previous</router-link>
            </button>
            <button>
                <router-link :to="{name:'ReadPolicy'}">Next</router-link>
            </button>
        </div>

    </div>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
export default {
    name: "ImageAdd",
    computed:{
        peopleStore(){
            return usePeopleStore()
        }
    },
    mounted() {
        this.peopleStore.currentStep = 2;
    }
}
</script>

<style scoped>

</style>
