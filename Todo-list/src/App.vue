<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/login">Вход</RouterLink>
        <RouterLink to="/register">Регистрация</RouterLink>
      </nav>
    </div>
  </header>
  <main>
    <RouterView />
  </main>

</template>
<style>
  body{
    background: white;
  }
  #app {
  display: block;
  place-items: center;
  height: 100vh;
  max-width: 2280px;
}

  
</style>