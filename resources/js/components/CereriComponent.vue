<template>
    <p>Cereri inregistrate:</p>
    <div v-if="cereri" class="flex flex-wrap items-center justify-center">
        <p v-for="cerere in cereri" class="w-[10%] m-2 block float-left">
            {{cerere.id}}. {{cerere.nume}}
                <img :src="'storage/' + cerere.imagine" alt="imagine.jpg" class="w-[100%] p-1 m-1 min-w-[150px]">
<!--            <img src="../../../public/images/Ana.jpg" alt="Ana.jpg" class="w-[25%] m-2">-->
        </p>
    </div>
</template>

<script>
export default {
    name: "CereriComponent",
    data(){
        return{
            cereri:null,
        }
    },
    methods:{
        getAllCereri(){
            axios.get('/api/getAllCereri').then(res =>{
                this.cereri = res.data.cereri;
                console.log(this.cereri);
            })
        }
    },
    mounted() {
        this.getAllCereri();
    }
}
</script>

<style scoped>

</style>
