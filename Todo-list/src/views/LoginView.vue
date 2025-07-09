<template>
  <div class="container mt-5">
    <h1 class="mb-4 fw-bold text-center">Вход</h1>
    <form @submit.prevent="handleLogin">
      <input v-model="email" name="email" type="email" required placeholder="Email" class="form-control mb-2"/>
      <input v-model="password" name="password" type="password" required placeholder="Пароль"class="form-control mb-2"/>
      <button type="submit" class="btn btn-dark w-100">Войти</button>
    </form>
    <div v-if="errorMessage" class="text-danger mt-2">{{ errorMessage }}</div>
    <p class="mt-4 text-white">Нет акаунта? <router-link to="/register"><span class="fw-bold">Зарегестрируйтесь</span></router-link></p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: ''
    };
  },
  methods: {
    async handleLogin() {
      try {
        const formData = new FormData();
        formData.append('email', this.email);
        formData.append('password', this.password);

        const response = await fetch('/public/backend/handler-login.php', {
          method: 'POST',
          body: formData
        });

        const result = await response.json();

        if (result.success) {
            localStorage.setItem('token', result.token);
            localStorage.setItem('user_id', result.user_id);
            this.$router.push('/welcome'); 
          } else {
            this.errorMessage = result.message || 'Ошибка входа';
          }
      } catch (err) {
        this.errorMessage = 'Ошибка соединения с сервером';
      }
    }
  }
};
</script>
