<template>
    <div class="container">
        <TodoList/>
    </div>
    <div class="text-center">
      <button @click="logout" class="btn btn-outline-danger">
      Выйти
    </button>
    </div>
  </template>
  
  <script setup>
    import { useRouter } from 'vue-router';
    import TodoList from '@/components/TodoList.vue';
    
    const router = useRouter();
    
    const logout = () => {
      localStorage.removeItem('token');
      localStorage.removeItem('user_id');
      router.push('/login');
    };
  </script>