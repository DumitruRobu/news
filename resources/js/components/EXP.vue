<template>
    <div class="container mx-auto max-w-4xl my-8">
        <section v-if="editor"
                 class="buttons flex items-center flex-wrap gap-x-4 border-t border-l border-r  border-gray-400">
            <button @click="editor.chain().focus().toggleBold().run"
                    :disabled="!editor.can().chain().focus().toggleBold().run()"
                    :class="{'bg-gray-200 rounded font-bold':editor.isActive('bold')}"
                    class="p-1 m-1 font-bold hover:bg-gray-100 hover:rounded"
            >

                bold
            </button>

            <button @click="editor.chain().focus().toggleItalic().run"
                    :disabled="!editor.can().chain().focus().toggleItalic().run()"
                    :class="{'bg-gray-200 rounded italic':editor.isActive('italic')}"
                    class="p-1 m-1 italic hover:bg-gray-100 hover:rounded"
            >
                Italic
            </button>

            <button @click="editor.chain().focus().toggleUnderline().run"
                    :disabled="!editor.can().chain().focus().toggleUnderline().run()"
                    :class="{'bg-gray-200 rounded italic':editor.isActive('underline')}"
                    class="p-1 m-1 italic hover:bg-gray-100 hover:rounded"
            >
                Italic
            </button>
        </section>
        <editor-content :editor="editor"/>
    </div>
</template>

<script setup>
import {useEditor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'border border-gray-400 p-4 outline-none min-h-[12rem] max-h-[12rem] overflow-y-auto',
        },
    },
    content: "<p>I'm running Tiptap with Vue.js. 🎉</p>",
    extensions: [StarterKit],
})
</script>


<style scoped>

</style>
