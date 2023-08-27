<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5>Nama Customer</h5>
                        <h4>{{ detailCustomer.nama }}</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Email</h5>
                        <h4>{{ detailCustomer.email }}</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>No Hp</h5>
                        <h4>{{ detailCustomer.no_hp }}</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Gender</h5>
                        <h4>{{ detailCustomer.gender }}</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Tanggal Lahir</h5>
                        <h4>{{ detailCustomer.tanggal_lahir }}</h4>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Daftar Alamat
                        <router-link :to="{ name: 'customer.add' }" class="btn btn-sm btn-primary float-end">Add Alamat</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Penerima</th>
                                    <th>No Hp Penerima</th>
                                    <th>Nama Alamat</th>
                                    <th>Detail Alamat</th>
                                    <th class="text-center">Kode Pos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(alamat,index) in detailCustomer.alamat" :key="index">
                                    <td class="text-center">{{ alamat.id }}</td>
                                    <td>{{ alamat.nama_penerima }}</td>
                                    <td>{{ alamat.no_hp }}</td>
                                    <td>{{ alamat.nama_alamat }}</td>
                                    <td>{{ alamat.detail_alamat }}</td>
                                    <td class="text-center">{{ alamat.kode_pos }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios'
import {onMounted, ref} from 'vue'
import { useRouter, useRoute } from 'vue-router'

export default {
    setup(){
        let detailCustomer = ref([]);

        const router = useRouter();
        const route = useRoute();
    

        onMounted(() => {
            axios.get(`customer/${route.params.id}`)
            .then((result) => {
                detailCustomer.value = result.data.data
                console.log(detailCustomer)
            }).catch((err) => {
                console.log(err.response)
            });
        });

        return {
            detailCustomer
        }
    }
}
</script>