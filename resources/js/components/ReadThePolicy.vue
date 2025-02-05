<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <p>Read the policy here:</p>
        <p>(c) by IT Group all right reserved!</p>

        <div class="flex gap-4">
            <button class="border border-1 px-5 py-1 rounded hover:bg-[#EB7D97] hover:text-white transition duration-500">
                <router-link :to="{name:'AddImg'}">Previous</router-link>
            </button>
            <button class="border border-1 px-5 py-1 rounded hover:bg-[#83B3AD] hover:text-white transition duration-500" @click.prevent="registerRequest">
                Submit request
            </button>
        </div>
    </div>
</template>

<script>
import { usePeopleStore } from '../../../stores/people.js'
import router from "../router";
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
    methods:{
        registerRequest(){
            let formData = new FormData();
            formData.append('nume', this.peopleStore.name);
            formData.append('imagine', this.peopleStore.imagine);

            axios.post('/api/registerRequest', formData, {
                headers:{
                    'Content-Type':'multipart/form-data'
                }
            }).then(res =>{
                console.log('Request has been successfully added!');
                this.peopleStore.name = null;
                this.peopleStore.imagine = null;

                router.push({name:'Final'});
            }).catch(err =>{
                console.log("An error has occured", err);
            })
        }
    }
}
</script>

<style scoped>

</style>
