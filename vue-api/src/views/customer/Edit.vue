<template>
    <div class="container my-3">
         <div class="row">
             <div class="col-md-12">
                 <div class="card mt-3">
                     <div class="card-header">
                         Edit Data
                         <!-- <router-link :to="{ name: 'customer.add' }" class="btn btn-sm btn-primary float-end">Add Alamat</router-link> -->
                     </div>
                     <div class="card-body">
                         <form @submit.prevent="update()">
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama</label>
                                 <input type="text" class="form-control" id="nama" v-model="customer.nama">
                             </div>
                             <div class="mb-3">
                                 <label for="formFile" class="form-label">Foto</label>
                                 <input class="form-control" type="file" id="formFile">
                             </div>
                             <div class="mb-3">
                                 <label for="email" class="form-label">Email address</label>
                                 <input type="email" class="form-control" id="email" v-model="customer.email">
                             </div>
                             <div class="mb-3">
                                 <label for="no_hp" class="form-label">No HP</label>
                                 <input type="text" class="form-control" id="no_hp" v-model="customer.no_hp">
                             </div>
                             <div class="mb-3">
                                 <label for="no_hp" class="form-label">Gender</label>
                                 <select class="form-select" aria-label="Default select example" v-model="customer.gender">
                                     <option selected>Pilih Gender</option>
                                     <option value="Laki - laki">Laki - laki</option>
                                     <option value="Perempuan">Perempuan</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                 <input type="text" class="form-control" id="tanggal_lahir" v-model="customer.tanggal_lahir">
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
 import { useRouter, useRoute } from 'vue-router'
 export default {
     setup(){
         let customer = reactive({
             "nama": "",
             "foto" : "https://via.placeholder.com/400x400.png/005544?text=molestias",
             "email": "",
             "no_hp": "",
             "gender": "",
             "tanggal_lahir": "",
         });
 
         const validation = ref([]);
 
         const router = useRouter();
         const route = useRoute();
         
         onMounted(() => {
            axios.get(`customer/${route.params.id}`)
            .then((result) => {
                customer.nama = result.data.data.nama
                customer.foto = result.data.data.foto
                customer.email = result.data.data.email
                customer.no_hp = result.data.data.no_hp
                customer.gender = result.data.data.gender
                customer.tanggal_lahir = result.data.data.tanggal_lahir
            }).catch((err) => {
                console.log(err.response.data)
            });
         });

         function update() {
             axios.patch(
                `customer/${route.params.id}`,
                 customer
             )
             .then(() => {
                 router.push({
                     name: "customer.index"
                 });
             }).catch((err) => {
                 validation.value = err.response.data
             });
         }
 
         return {
             customer,
             validation,
             router,
             update
         }
 
     }
 
     
 }