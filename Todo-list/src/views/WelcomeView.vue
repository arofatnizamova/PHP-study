<template>
    <div class="text-center">
      <h1>Добро пожаловать!</h1>
      <p>Вы зарегистрированы и вошли в систему.</p>
      <button @click="logout" class="btn btn-outline-danger">
      Выйти
    </button>
    </div>
  </template>
  
  <script setup>
    import { useRouter } from 'vue-router';
    
    const router = useRouter();
    
    const logout = () => {
      localStorage.removeItem('token');
      localStorage.removeItem('user_id');
      router.push('/login');
    };
  </script>