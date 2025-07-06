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
