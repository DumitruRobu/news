<template>
    <div class="container mx-auto max-w-4xl my-8">
        <input placeholder="Title..." type="text" class="outline-none w-full border border-gray-400 p-2" v-model="form.title">
<!--        <form @submit.prevent="submitForm" class="space-y-8">-->
            <my-editor v-model="form.content"></my-editor>
<!--        </form>-->

<!--        <div class="input-group mb-2">-->
<!--            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">-->
<!--        </div>-->

        <button @click.prevent="submitForm" class="active:translate-y-1 hover:bg-black hover:text-white p-2 border border-gray-500 rounded">Submit</button>
    </div>
    <div v-if="theResponse">
        <p>{{theResponse}}</p>
    </div>

    <img src="../../../public/images/Ana.jpg" alt="Ana.jpg" class="w-[25%] m-2">
</template>

<script setup>
import {onMounted, ref} from 'vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import MyEditor from "../components/MyEditor.vue";
const theResponse = ref('');
const form = useForm({
    title:null,
    content: "<h3>Heading here!</h3><p>I'm running Tiptap with Vue.js! </p>",
});

function submitForm(){
    axios.post('/api/submitForm', {'title':form.title, 'content':form.content}).then(res =>{
        console.log(res.data);
        if(res){
            theResponse.value = res.data;
        }
    })
}


</script>

<style lang="scss" scoped>
</style>
