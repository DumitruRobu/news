<template>
    <p>Cereri inregistrate:</p>
    <div v-if="cereri">
        <p v-for="cerere in cereri" class="w-[50%]">
            {{cerere.id}}. {{cerere.nume}}
                <img :src="cerere.imagine" alt="imagine.jpg" class="w-[50%]">
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
