<template>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Mutations</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        Mutations List
                    </div>
                    <div class="card-body">
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control mb-1" placeholder="Name Customers">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button class="btn btn-outline-success" @click.prevent="getData()" type="button" id="button-addon2">Search</button>
                            </div>
                        </div> -->
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Jumlah Saldo Yang Dikirim</th>
                                    <th>Nama Pengirim</th>
                                    <th>Saldo Awal</th>
                                    <th>Saldo Akhir</th>
                                    <th>Nama Penerima</th>
                                    <th>Saldo Awal</th>
                                    <th>Saldo Akhir</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(mutation,index) in mutations" :key="index">
                                    <td class="text-center">{{ no++ }}</td>
                                    <td>{{ mutation.jumlah_saldo_tf }}</td>
                                    <td>{{ mutation.nama_pengirim }}</td>
                                    <td>{{ mutation.saldo_awal_pengirim }}</td>
                                    <td>{{ mutation.saldo_akhir_pengirim }}</td>
                                    <td>{{ mutation.nama_penerima }}</td>
                                    <td>{{ mutation.saldo_awal_penerima }}</td>
                                    <td>{{ mutation.saldo_akhir_penerima }}</td>
                                    <td>{{ mutation.created_at }}</td>
                                    <td class="text-success fw-bold">Berhasil</td>
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
import axios from "axios"
import { onMounted, ref } from "vue";
export default {
    setup() {
        let no =1;
        let mutations = ref([]);

        onMounted(() => {
            axios.get('mutations')
                .then((result) => {
                    mutations.value = result.data.data
                    console.log(mutations)
                }).catch((err) => {
                    console.log(err.response)
            });
        });

        return {
            no,
            mutations
        }
    }
}
</script>