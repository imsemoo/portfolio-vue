<template>
  <div class="container mt-5">
    <h2 class="text-center mb-4 text-light">Dashboard</h2>
    <div class="d-flex justify-content-end mb-3">
      <button class="btn btn-outline-light" @click="handleLogout">
        Logout
      </button>
    </div>
    <form @submit.prevent="uploadProject" class="bg-dark p-4 rounded shadow-sm">
      <div class="mb-3">
        <input
          type="text"
          v-model="project.name"
          class="form-control bg-dark text-light border-light"
          placeholder="Project Name"
          required
        />
      </div>
      <div class="mb-3">
        <input
          type="text"
          v-model="project.description"
          class="form-control bg-dark text-light border-light"
          placeholder="Project Description"
          required
        />
      </div>
      <div class="mb-3">
        <input
          type="file"
          @change="handleFileUpload"
          class="form-control bg-dark text-light border-light"
        />
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-outline-light">
          Upload Project
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "DashboardComponent",
  data() {
    return {
      project: {
        name: "",
        description: "",
      },
      file: null,
    };
  },
  methods: {
    handleFileUpload(event) {
      this.file = event.target.files[0];
    },
    async uploadProject() {
      const formData = new FormData();
      formData.append("name", this.project.name);
      formData.append("description", this.project.description);
      formData.append("file", this.file);

      try {
        const response = await fetch(
          "http://localhost/portfolio-vue/api/uploadProject.php",
          {
            method: "POST",
            body: formData,
            credentials: "include",
          }
        );
        const result = await response.text();
        alert(result); // ستظهر نتيجة تحميل الملف
      } catch (error) {
        console.error("Error uploading project:", error);
      }
    },
    async handleLogout() {
      try {
        const response = await fetch(
          "http://localhost/portfolio-vue/api/logout.php",
          {
            method: "GET",
            credentials: "include", // تأكد من إرسال ملفات تعريف الارتباط (Cookies)
          }
        );
        const result = await response.json();
        if (result.success) {
          localStorage.removeItem("authenticated");
          this.$router.push("/login");
        } else {
          alert("Error logging out");
        }
      } catch (error) {
        console.error("Error logging out:", error);
      }
    },
  },
};
</script>

<style scoped>
/* تخصيص الأنماط لتتناسب مع الخلفية الداكنة */
.container {
  max-width: 600px;
}

.text-light {
  color: #f8f9fa !important;
}
.border-light {
  border-color: #f8f9fa !important;
}
</style>
