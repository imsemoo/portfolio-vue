<template>
  <div
    class="container d-flex justify-content-center align-items-center"
    style="height: 100vh"
  >
    <div class="card p-4 bg-dark text-white" style="width: 400px; border: none">
      <h2 class="text-center mb-4">Login</h2>
      <form @submit.prevent="handleLogin">
        <div class="form-group mb-3">
          <label for="username">Username</label>
          <input
            type="text"
            class="form-control bg-secondary text-white"
            id="username"
            v-model="username"
            placeholder="Enter username"
            required
          />
        </div>
        <div class="form-group mb-4">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control bg-secondary text-white"
            id="password"
            v-model="password"
            placeholder="Enter password"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "LoginView",
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await axios.post(
          "http://localhost:8081/portfolio-vue/api/login.php", // تأكد من تحديث النطاق هنا
          {
            username: this.username,
            password: this.password,
          }
        );
        const result = response.data;
        if (result.success) {
          localStorage.setItem("authenticated", "true");
          this.$router.push("/dashboard");
        } else {
          alert("Invalid credentials");
        }
      } catch (error) {
        console.error("Error logging in:", error);
      }
    },
  },
};
</script>

<style scoped>
/* تحسين المظهر باستخدام Bootstrap */
.container {
  background-color: #343a40; /* خلفية داكنة لتتناسب مع التصميم العام */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card {
  background-color: #212529; /* لون أغمق لتباين أفضل مع النص */
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

.form-control {
  background-color: #495057; /* لون خلفية الحقول */
  border: none;
  color: white;
}

.form-control::placeholder {
  color: #adb5bd; /* لون النص عند التلميحات */
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}
</style>
