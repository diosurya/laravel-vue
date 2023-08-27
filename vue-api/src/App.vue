<template>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <router-link :to="{name: 'customer.index'}" class="navbar-brand">Api Apps</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link :to="{name: 'customer.index'}" class="nav-link active" >Customer</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'akun.index'}" class="nav-link active" >Akun</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'transactions.transfer'}" class="nav-link active" >Transfer</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'transactions.mutations'}" class="nav-link active" >Mutations</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'task.index'}" class="nav-link active" >Task</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'landing.index'}" class="nav-link active" >Landing</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <router-view></router-view>
</template>

<script>
export default {
  name: 'App',
  
}
</script>
