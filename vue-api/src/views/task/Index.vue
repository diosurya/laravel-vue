<template>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h2>POSTS</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" v-model="filterSearch" class="form-control mb-1" placeholder="Search">
                                </div>
                            </div>
                        </div> 
                        <table class="custom">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>User ID</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(post,index) in filterPosts" :key="index">
                                    <td class="text-center">{{ index+1 }}</td>
                                    <td>{{ post.userId }}</td>
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.body }}</td>
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
import { computed, onMounted, ref } from "vue";
export default {
    setup() {
        let posts = ref([]);
        const filterSearch = ref("");

        onMounted(() => {
            axios.get('https://jsonplaceholder.typicode.com/posts')
                .then((result) => {
                    posts.value = result.data.slice(0, 10)
                }).catch((err) => {
                    console.log(err.response)
            });
        });

        const filterPosts = computed(() => {
            return posts.value.filter((post) => {
                return post.title.includes(filterSearch.value)
            })
        })

        return {
            posts,
            filterPosts,
            filterSearch
        }
    }
}
</script>
<style>
table.custom {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
table.custom th, td  {
   
  text-align: left;
  padding: 16px;
}
table.custom tbody tr {
    background-color: green;
    color: #fff;
}
table.custom tr:nth-child(even){
    background-color: blue;
    color: #fff;

}

</style>