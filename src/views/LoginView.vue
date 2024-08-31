<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm bg-dark text-light">
          <div class="card-body">
            <h2 class="text-center mb-4 text-light">Login</h2>
            <form @submit.prevent="handleLogin">
              <div class="mb-3">
                <input
                  type="text"
                  v-model="username"
                  class="form-control bg-dark text-light border-light"
                  placeholder="Username"
                  required
                />
              </div>
              <div class="mb-3">
                <input
                  type="password"
                  v-model="password"
                  class="form-control bg-dark text-light border-light"
                  placeholder="Password"
                  required
                />
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-outline-light">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
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
        const response = await fetch(
          "http://localhost/portfolio-vue/api/login.php",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              username: this.username,
              password: this.password,
            }),
          }
        );
        const result = await response.json();
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
/* تخصيص الأنماط لتتناسب مع الخلفية الداكنة */
.container {
  max-width: 400px;
}

.text-light {
  color: #f8f9fa !important;
}
.border-light {
  border-color: #f8f9fa !important;
}
</style>
