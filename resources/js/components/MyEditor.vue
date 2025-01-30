<template>
    <div class="container mx-auto max-w-4xl my-8">
        <section v-if="editor"
                 class="text-gray-700 buttons flex items-center flex-wrap gap-x-4 border-t border-l border-r p-4 border-gray-400">
            <button @click="editor.chain().focus().toggleBold().run"
                    :disabled="!editor.can().chain().focus().toggleBold().run()"
                    :class="{'bg-gray-200 rounded font-bold':editor.isActive('bold')}"
                    class="p-1 m-1 font-bold hover:bg-gray-100 hover:rounded"
            >
                <BoldIcon :size="24" title="Bold"/>
                <!--                <i class="fa-solid fa-bold"></i>-->
                <!--                merge si cu font awesome-->
            </button>

            <button @click="editor.chain().focus().toggleItalic().run"
                    :disabled="!editor.can().chain().focus().toggleItalic().run()"
                    :class="{'bg-gray-200 rounded italic':editor.isActive('italic')}"
                    class="p-1 m-1 italic hover:bg-gray-100 hover:rounded"
            >
                <ItalicIcon :size="24" title="Italic"/>
                <!--                <i class="fa-solid fa-italic"></i>-->
            </button>

            <button @click="editor.chain().focus().toggleUnderline().run"
                    :disabled="!editor.can().chain().focus().toggleUnderline().run()"
                    :class="{'bg-gray-200 rounded underline':editor.isActive('underline')}"
                    class="p-1 m-1 hover:bg-gray-100 hover:rounded"
            >
                <UnderlineIcon :size="24" title="Underline"/>
            </button>

            <button @click="editor.chain().focus().toggleStrike().run"
                    :disabled="!editor.can().chain().focus().toggleStrike().run()"
                    :class="{'bg-gray-200 rounded line-through':editor.isActive('strike')}"
                    class="p-1 m-1 hover:bg-gray-100 hover:rounded"
            >
                <StrikeIcon :size="24" title="Strike"/>
            </button>

            <button @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                    :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
                <H1Icon :size="24" title="Heading1"/>
            </button>
            <button @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                    :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
                <H2Icon :size="24" title="Heading2"/>
            </button>
            <button @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                    :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
                <H3Icon :size="24" title="Heading3"/>
            </button>
            <button @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                    :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
                <H4Icon :size="24" title="Heading4"/>
            </button>


            <button @click="editor.chain().focus().toggleBulletList().run"
                    :disabled="!editor.can().chain().focus().toggleBulletList().run()"
                    :class="{'bg-gray-200 rounded font-bold':editor.isActive('bulletList')}"
                    class="p-1 m-1 hover:bg-gray-100 hover:rounded"
            >
                <BulletedListIcon :size="24" title="Bulleted list"/>
            </button>


            <button @click="editor.chain().focus().toggleOrderedList().run"
                    :disabled="!editor.can().chain().focus().toggleOrderedList().run()"
                    :class="{'bg-gray-200 rounded text-lime-700 font-bold':editor.isActive('orderedList')}"
                    class="p-1 m-1 hover:bg-gray-100 hover:rounded"
            >
                <NumberedListIcon :size="24" title="Numbered List icon"/>
            </button>

            <button @click="editor.chain().focus().toggleCodeBlock().run()"
                    :class="{ 'is-active': editor.isActive('codeBlock') }">
                <xmlIcon :size="24" title="Code"/>
            </button>

            <button @click="editor.chain().focus().toggleBlockquote().run()"
                    :class="{ 'is-active': editor.isActive('blockquote') }">
                <QuoteIcon :size="24" title="Block quote"/>
            </button>
            <button @click="editor.chain().focus().setHorizontalRule().run()">
                <HorizontalLineIcon :size="24" title="Horizontal line"/>
            </button>
            <!--            <button @click="editor.chain().focus().setHardBreak().run()">-->
            <!--                Hard break-->
            <!--            </button>-->


            <button @click="editor.chain().focus().unsetAllMarks().run"
                    :disabled="!editor.can().chain().focus().unsetAllMarks().run()"
                    class="p-1 m-1 hover:bg-gray-100 hover:rounded"
            >
                <UnsetMarks :size="24" title="Unset marks"/>
            </button>


            <button class="p-1 m-1 disabled:text-gray-400"
                    @click="editor.chain().focus().undo().run()"
                    :disabled="!editor.can().chain().focus().undo().run()"
            >
                <UndoIcon :size="24" title="Undo"/>
            </button>

            <button @click="editor.chain().focus().redo().run"
                    :disabled="!editor.can().chain().focus().redo().run()"
                    class="p-1 m-1 disabled:text-gray-400"
            >
                <RedoIcon :size="24" title="Redo"/>
            </button>

        </section>
        <editor-content :editor="editor"/>
    </div>
</template>

<script setup>
import {useEditor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
import BoldIcon from 'vue-material-design-icons/FormatBold.vue';
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue';
import UnderlineIcon from 'vue-material-design-icons/FormatUnderline.vue';
import StrikeIcon from 'vue-material-design-icons/FormatStrikethroughVariant.vue';
import H1Icon from 'vue-material-design-icons/FormatHeader1.vue';
import H2Icon from 'vue-material-design-icons/FormatHeader2.vue';
import H3Icon from 'vue-material-design-icons/FormatHeader3.vue';
import H4Icon from 'vue-material-design-icons/FormatHeader4.vue';
import BulletedListIcon from 'vue-material-design-icons/FormatListBulleted.vue';
import NumberedListIcon from 'vue-material-design-icons/FormatListNumbered.vue';
import xmlIcon from 'vue-material-design-icons/xml.vue';
import QuoteIcon from 'vue-material-design-icons/FormatQuoteClose.vue';
import HorizontalLineIcon from 'vue-material-design-icons/Minus.vue';
import UndoIcon from 'vue-material-design-icons/Undo.vue';
import RedoIcon from 'vue-material-design-icons/Redo.vue';
import UnsetMarks from 'vue-material-design-icons/CloseOutline.vue';
import {ref} from 'vue';
import {Head, Link} from '@inertiajs/vue3';

const props = defineProps({
    modelValue: String,
})
const emit = defineEmits(['update:modelValue'])

const editor = useEditor({
    content: props.modelValue,
    onUpdate: ({editor}) =>{
        // console.log(editor.getHTML());
        emit('update:modelValue', editor.getHTML())
    },
    extensions: [StarterKit, Underline],

    editorProps: {
        attributes: {
            class: 'prose max-w-none border border-gray-400 p-4 outline-none min-h-[12rem] max-h-[12rem] overflow-y-auto',
        },
    },
})


</script>


<style lang="scss" scoped>

</style>
