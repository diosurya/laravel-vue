<template>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Customer</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        Customer List
                        <router-link :to="{ name: 'customer.add' }" class="btn btn-sm btn-primary float-end">Add Customer</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" v-model="search.value" class="form-control mb-1" placeholder="Name Customers">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button class="btn btn-outline-success" @click.prevent="getData()" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Gender</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(customer,index) in customers" :key="index">
                                    <td class="text-center">{{ customer.id }}</td>
                                    <td>{{ customer.nama }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.no_hp }}</td>
                                    <td>{{ customer.gender }}</td>
                                    <td>{{ customer.tanggal_lahir }}</td>
                                    <td>
                                        <router-link :to="{name: 'customer.detail', params:{id:customer.id}}" class="btn btn-sm btn-outline-success me-1">Detail</router-link>
                                        <router-link :to="{name: 'customer.edit', params:{id:customer.id}}" class="btn btn-sm btn-outline-primary me-1">Edit</router-link>
                                        <button class="btn btn-outline-danger btn-sm" @click.prevent="destroy(customer.id, index)">Delete</button>
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
        let customers = ref([]);
        
        let search = reactive({
            "value" : ''
        });

        onMounted(() => {
            getData();
        });
        function getData(){
            if(search.value != ''){
                axios.get(`http://127.0.0.1:8000/api/search/${search.value}`)
                .then((result) => {
                    customers.value = result.data.data
                    console.log(customers)
                }).catch((err) => {
                    console.log(err.response)
                });
            }else {
                axios.get('http://127.0.0.1:8000/api/customer')
                .then((result) => {
                    customers.value = result.data.data
                    console.log(customers)
                }).catch((err) => {
                    console.log(err.response)
                });
            }
        }
        
        function destroy(id, index)
        {
            axios.delete(
                `customer/${id}`
             )
             .then(() => {
                customers.value.splice(index, 1)
             }).catch((err) => {
                console.log(err.response.data)
             });
        }

        return {
            customers,
            destroy,
            search,
            getData
        }
    }
}
</script>