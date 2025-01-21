// stores/counter.js
import { defineStore } from 'pinia'

export const usePeopleStore = defineStore('people', {
    state: () => {
        return {
            person: 0,
            name: null,
            currentStep:0,
            totalSteps:4,
        }
    },
    actions: {

    },
})
