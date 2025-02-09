<template>
    <div class="container mx-auto max-w-4xl my-8">
        <input placeholder="Title..." type="text" class="outline-none w-full border border-gray-400 p-2" v-model="form.title">
<!--        <form @submit.prevent="submitForm" class="space-y-8">-->
            <my-editor v-model="form.content"></my-editor>
<!--        </form>-->

<!--        <div class="input-group mb-2">-->
<!--            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">-->
<!--        </div>-->
        <input class="block mb-2" type="file" @change="updateFile">
        <div v-if="fileRegistered" >
            <img class="mx-auto w-[20%]" :src="fileRegistered">
        </div>

        <button @click.prevent="submitForm" class="active:translate-y-1 hover:bg-black hover:text-white p-2 border border-gray-500 rounded">Submit</button>
    </div>
    <div v-if="theResponse">
        <p>{{theResponse}}</p>
    </div>

<!--    <img src="../../../public/storage/images/Ana.jpg" alt="Ana.jpg" class="w-[25%] m-2">-->
</template>

<script setup>
import { usePeopleStore } from '../../../stores/people.js'
import {onMounted, ref, computed} from 'vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import MyEditor from "../components/MyEditor.vue";
import router from "../router";
const theResponse = ref('');
const fileRegistered = ref('');
const form = useForm({
    title:null,
    content: "<h3>Heading here!</h3><p>I'm running Tiptap with Vue.js! </p>",
});

const peopleStore = usePeopleStore();

function submitForm(){
    // axios.post('/api/submitForm', {'title':form.title, 'content':form.content}).then(res =>{
    //     console.log(res.data);
    //     if(res){
    //         theResponse.value = res.data;
    //     }
    // })

        let formData = new FormData();
        formData.append('title', form.title);
        formData.append('content', form.content);
        formData.append('image', peopleStore.imagine);

        axios.post('/api/submitForm', formData, {
            headers:{
                'Content-Type':'multipart/form-data'
            }
        }).then(res =>{
            console.log('Request has been successfully added!');
            peopleStore.name = null;
            peopleStore.imagine = null;

            router.push({name:'Final'});
        }).catch(err =>{
            console.log("An error has occured", err);
        })
}
function updateFile(event){
    const file = event.target.files[0];
    if (file) {
        fileRegistered.value = URL.createObjectURL(file); //pentru preview
        peopleStore.imagine = file; //pentru baza de date coloana imagine
        console.log(peopleStore.imagine);
    }
}

</script>

<style lang="scss" scoped>
</style>
