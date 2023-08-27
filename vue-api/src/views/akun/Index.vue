<template>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Akun</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        Akun List
                        <router-link :to="{ name: 'akun.add' }" class="btn btn-sm btn-primary float-end">Add Akun</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" v-model="search.value" class="form-control mb-1" placeholder="Name Customers">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Saldo</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(akun,index) in akuns" :key="index">
                                    <td class="text-center">{{ akun.id }}</td>
                                    <td>{{ akun.nama }}</td>
                                    <td>{{ akun.saldo }}</td>
                                    <td>{{ akun.created_at }}</td>
                                    <td>
                                        <!-- <router-link :to="{name: 'customer.detail', params:{id:akun.id}}" class="btn btn-sm btn-outline-success me-1">Detail</router-link>
                                        <router-link :to="{name: 'customer.edit', params:{id:akun.id}}" class="btn btn-sm btn-outline-primary me-1">Edit</router-link> -->
                                        <button class="btn btn-outline-danger btn-sm" @click.prevent="destroy(akun.id, index)">Delete</button>
                                    </td>
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
import { onMounted, ref, reactive } from "vue";
export default {
    setup() {
        let akuns = ref([]);
        
        let search = reactive({
            "value" : ''
        });

        onMounted(() => {
            axios.get('akun')
                .then((result) => {
                    akuns.value = result.data.data
                    console.log(akuns)
                }).catch((err) => {
                    console.log(err.response)
                });
        });
     
        
        function destroy(id, index)
        {
            axios.delete(
                `akun/${id}`
             )
             .then(() => {
                akuns.value.splice(index, 1)
             }).catch((err) => {
                console.log(err.response.data)
             });
        }

        return {
            akuns,
            destroy,
            search,
        }
    }
}
</script>