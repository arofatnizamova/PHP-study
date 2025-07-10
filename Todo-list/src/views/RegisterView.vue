<template>
    <div class="container mt-5">
      <h1 class="mb-4 fw-bold text-center text-black">Регистрация</h1>
      <form @submit.prevent="handleRegister">
        <input v-model="name" type="text" required placeholder="Имя" class="form-control mb-2" />
        <input v-model="email" type="email" required placeholder="Email" class="form-control mb-2" />
        <input v-model="password" type="password" required placeholder="Пароль" class="form-control mb-2" />
        <button type="submit" class="btn btn-dark w-100">Зарегистрироваться</button>
      </form>
      <div v-if="errorMessage" class="text-danger mt-2">{{ errorMessage }}</div>
      <p class="mt-4 text-center">Есть акаунт? <router-link to="/Login"><span class="fw-bold">Войти</span></router-link></p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        errorMessage: ''
      };
    },
    methods: {
      async handleRegister() {
        try {
          const formData = new FormData();
          formData.append('name', this.name);
          formData.append('email', this.email);
          formData.append('password', this.password);
  
          const response = await fetch('/public/backend/handler.php', {
            method: 'POST',
            body: formData
          });
  
          const result = await response.json();
          console.log('Ответ сервера:', result);
  
          if (result.success) {
            this.$router.push('/login'); 
          } else {
            this.errorMessage = result.message || 'Ошибка при регистрации';
          }
        } catch (err) {
          this.errorMessage = 'Ошибка соединения с сервером';
        }
      }
    }
  };
  </script>
  