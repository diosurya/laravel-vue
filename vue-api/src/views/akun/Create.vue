<template>
    <div class="container my-3">
         <div class="row">
             <div class="col-md-12">
                 <div class="card mt-3">
                     <div class="card-header">
                         Add Data
                         <!-- <router-link :to="{ name: 'customer.add' }" class="btn btn-sm btn-primary float-end">Add Alamat</router-link> -->
                     </div>
                     <div class="card-body">
                         <form @submit.prevent="store()">
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama</label>
                                 <input type="text" class="form-control" id="nama" v-model="akun.nama">
                             </div>
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Saldo Awal</label>
                                 <input type="text" class="form-control" id="nama" v-model="akun.saldo">
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
         const akun = reactive({
             "nama": "",
             "saldo" : 0
         });
 
         const validation = ref([]);
 
         const router = useRouter();
 
         function store() {
             axios.post(
                 'akun',
                 akun
             )
             .then(() => {
                 router.push({
                     name: "akun.index"
                 })
             }).catch((err) => {
                 validation.value = err.response.data
             });
         }
 
         return {
             akun,
             validation,
             router,
             store
         }
 
     }
 
     
 }