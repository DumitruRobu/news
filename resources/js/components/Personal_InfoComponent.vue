<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Lets add the info:</p>
        <input v-model="this.peopleStore.name" class="border border-1
        rounded p-2 outline-none" type="text" placeholder="numele">

        <button :disabled="!peopleStore.name" class="border border-1 px-5 py-1 rounded hover:bg-[#83B3AD] hover:text-white transition duration-500">
            <router-link v-if="peopleStore.name" :to="{name:'AddImg'}">Next</router-link>
            <span v-else>Enter the name</span>
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
button:disabled {
    background-color: lightgray; /* Optional: change the color for disabled buttons */
    color: darkgray; /* Optional: change text color for disabled buttons */
    cursor: not-allowed; /* Makes the cursor indicate the button is not clickable */
}

button:disabled:hover {
    background-color: lightgray; /* Prevent hover background color change when disabled */
    color: darkgray; /* Prevent hover text color change when disabled */
    font-weight: normal; /* Reset font-weight */
}

</style>
