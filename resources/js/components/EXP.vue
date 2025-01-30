<template>
    <div class="container mx-auto max-w-4xl my-8">
        <input type="text" class="w-full border border-gray-400 p-2 mb-2" v-model="form.title">
        <form @submit.prevent="submitForm" class="space-y-8">
            <my-editor v-model="form.content"></my-editor>

        </form>

        <button @click.prevent="submitForm" class="hover:bg-green-600 hover:text-white p-2 border border-gray-200 rounded">Submit</button>

    </div>
</template>

<script setup>
import {ref} from 'vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import MyEditor from "../components/MyEditor.vue";
const form = useForm({
    title:null,
    content: "<h3>Heading here</h3><p>I'm running Tiptap with Vue.js! </p>",
});

function submitForm(){

}
</script>

<style lang="scss" scoped>
</style>
