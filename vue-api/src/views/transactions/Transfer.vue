<template>
    <div class="container my-3">
         <div class="row">
             <div class="col-md-12">
                 <div class="card mt-3">
                     <div class="card-header">
                         Transfer Form
                         <!-- <router-link :to="{ name: 'customer.add' }" class="btn btn-sm btn-primary float-end">Add Alamat</router-link> -->
                     </div>
                     <div class="card-body">
                         <form @submit.prevent="store()">
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama Pengirim</label>
                                 <select class="form-select" id="id_pengirim" v-model="akunPengirim.id_pengirim">
                                    <option value="0">Select Akun</option>
                                    <option v-for="(akun, index) in DataAkuns" :key="index" :value="akun.id" >{{ akun.nama }}</option>
                                </select>
                             </div>
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama Penerima</label>
                                 <select class="form-select" id="id_pengirim" v-model="akunPengirim.id_penerima">
                                    <option value="0">Select Akun</option>
                                    <option v-for="(akun, index) in DataAkuns" :key="index" :value="akun.id" >{{ akun.nama }}</option>
                                </select>
                             </div>
                             <div class="mb-3">
                                 <label for="no_hp" class="form-label">Jumlah Saldo</label>
                                 <input type="number" class="form-control" id="jumlah_saldo" v-model="akunPengirim.jumlah_saldo">
                             </div>
                             <div class="mb-3">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </template>
 
 
 <script>
 import axios from 'axios'
 import {onMounted, ref, reactive} from 'vue'
 import { useRouter } from 'vue-router'
 export default {
     setup(){

        let DataAkuns = ref([]);
         const akunPengirim = reactive({
             "id_pengirim": 0,
             "id_penerima": 0,
             "jumlah_saldo": 0,
         });
 
         const validation = ref([]);
 
         const router = useRouter();

         onMounted(() => {
            axios.get('akun')
                .then((result) => {
                    DataAkuns.value = result.data.data
                    console.log(DataAkuns)
                }).catch((err) => {
                    console.log(err.response)
                });
        });
     
 
         function store() {
             axios.post(
                 'transactions/transfer',
                 akunPengirim
             )
             .then((e) => {
                console.log(e)
                 router.push({
                     name: "transactions.mutations"
                 })
             }).catch((err) => {
                console.log('error')
                 validation.value = err.response.data
             });
         }
 
         return {
            DataAkuns,
            akunPengirim,
             validation,
             router,
             store
         }
 
     }
 
     
 }