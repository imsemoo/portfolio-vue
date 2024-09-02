<template>
  <div class="dashboard">
    <h2>Dashboard</h2>
    <button @click="handleLogout" class="logout-button">Logout</button>

    <!-- Form to Add/Edit Project -->
    <div class="form-container">
      <h3>{{ editMode ? "Edit Project" : "Add New Project" }}</h3>
      <form @submit.prevent="editMode ? updateProject() : addProject()">
        <input
          type="text"
          v-model="form.title"
          placeholder="Project Title"
          required
        />
        <textarea
          v-model="form.description"
          placeholder="Project Description"
          required
        ></textarea>
        <input type="text" v-model="form.image" placeholder="Image URL" />
        <input
          type="text"
          v-model="form.technologies"
          placeholder="Technologies (comma separated)"
        />
        <input type="text" v-model="form.category" placeholder="Category" />
        <input type="text" v-model="form.liveLink" placeholder="Live Link" />
        <input type="text" v-model="form.codeLink" placeholder="Code Link" />
        <button type="submit">
          {{ editMode ? "Update Project" : "Add Project" }}
        </button>
      </form>
    </div>

    <!-- Display Projects -->
    <div class="projects-list">
      <h3>All Projects</h3>
      <ul>
        <li v-for="project in projects" :key="project.id">
          <h4>{{ project.title }}</h4>
          <p>{{ project.description }}</p>
          <p>Technologies: {{ project.technologies.join(", ") }}</p>
          <button @click="prepareEdit(project)">Edit</button>
          <button @click="deleteProject(project.id)">Delete</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "DashboardComponent",
  data() {
    return {
      projects: [],
      form: {
        id: null,
        title: "",
        description: "",
        image: "",
        technologies: "",
        category: "",
        liveLink: "",
        codeLink: "",
      },
      editMode: false,
    };
  },
  methods: {
    async fetchProjects() {
      try {
        const response = await axios.get(
          "http://localhost/portfolio-vue/api/getProjects.php"
        );
        this.projects = response.data.projects;
      } catch (error) {
        console.error("Error fetching projects:", error);
      }
    },
    async addProject() {
      try {
        const newProject = {
          ...this.form,
          technologies: this.form.technologies.split(","),
        };
        const response = await axios.post(
          "http://localhost/portfolio-vue/api/addProject.php",
          newProject
        );
        if (response.data.success) {
          this.fetchProjects();
          this.resetForm();
        } else {
          alert("Error adding project");
        }
      } catch (error) {
        console.error("Error adding project:", error);
      }
    },
    prepareEdit(project) {
      this.form = { ...project, technologies: project.technologies.join(",") };
      this.editMode = true;
    },
    async updateProject() {
      try {
        const updatedProject = {
          ...this.form,
          technologies: this.form.technologies.split(","),
        };
        const response = await axios.post(
          "http://localhost/portfolio-vue/api/updateProject.php",
          updatedProject
        );
        if (response.data.success) {
          this.fetchProjects();
          this.resetForm();
          this.editMode = false;
        } else {
          alert("Error updating project");
        }
      } catch (error) {
        console.error("Error updating project:", error);
      }
    },
    async deleteProject(projectId) {
      try {
        const response = await axios.post(
          "http://localhost/portfolio-vue/api/deleteProject.php",
          { id: projectId }
        );
        if (response.data.success) {
          this.fetchProjects();
        } else {
          alert("Error deleting project");
        }
      } catch (error) {
        console.error("Error deleting project:", error);
      }
    },
    resetForm() {
      this.form = {
        id: null,
        title: "",
        description: "",
        image: "",
        technologies: "",
        category: "",
        liveLink: "",
        codeLink: "",
      };
    },
    async handleLogout() {
      try {
        const response = await axios.get(
          "http://localhost/portfolio-vue/api/logout.php"
        );
        const result = response.data;
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
  mounted() {
    this.fetchProjects();
  },
};
</script>

<style scoped>
.dashboard {
  padding: 20px;
}

.logout-button {
  background-color: red;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

.form-container {
  margin-bottom: 20px;
}

.projects-list ul {
  list-style-type: none;
  padding: 0;
}

.projects-list li {
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 10px;
}

button {
  margin-right: 10px;
}
</style>
