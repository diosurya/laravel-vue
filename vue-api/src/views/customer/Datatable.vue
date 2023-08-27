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
                        <div class="table-responsive">
                            <DataTable :data="customers" :columns="columns" :options="{responsive:true, autoWidth:false, dom:'Bfrtip'}" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>Gender</th>
                                        <th>Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </DataTable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios"
import DataTable from "datatables.net-vue3"
import DataTableLib from "datatables.net-bs5"
import ButtonsHtml5 from "datatables.net-buttons-bs5"
import 'datatables.net-responsive-bs5'
DataTable.use(DataTableLib);
DataTable.use(ButtonsHtml5);

import { onMounted, ref } from "vue";
export default {
    name: "Datatable",
    components : {DataTable},
    setup() {
        let customers = ref([]);
        let columns = ref([
            {data:null, render:function(data,type,row,meta)
            {return `${meta.row+1}`}},
            {data:'nama'},
            {data:'email'},
            {data:'no_hp'},
            {data:'gender'},
            {data:'tanggal_lahir'},
        ]);
        let buttones = ref([
            {
                title: 'Excel',
                extends:'excelHtml5',
                text: '<i class="fa-solid fa-file-excel"></i> Excel',
                className: 'btn btn-success'
            }
        ]);

        onMounted(() => {
            axios.get('http://127.0.0.1:8000/api/customer')
            .then((result) => {
                customers.value = result.data.data
                console.log(customers)
            }).catch((err) => {
                console.log(err.response)
            });
        });

        function destroy(id, index)
        {
            axios.delete(
                `customer/${id}`
             )
             .then(() => {
                customers.value.splice(index, 1)
                consoler.log('success')
             }).catch((err) => {
                console.log(err.response.data)
             });
        }

        return {
            customers,
            columns,
            destroy,
            buttones
        }
    }
}
</script>

<style scoped>
@import 'datatables.net-bs5'
</style>