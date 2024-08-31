<template>
  <div class="projects" id="scroll_works" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="projects-header">
            <h2 class="projects-title section-title"><span>#</span>projects</h2>
            <a href="#">View all ~~></a>
          </div>
          <div id="filter-gallary">
            <button
              class="btn"
              v-for="(category, index) in categories"
              :key="index"
              @click="filterProjects(category)"
            >
              {{ category }}
            </button>
          </div>
          <div class="grid-container">
            <div
              class="card"
              v-for="(project, index) in filteredProjects"
              :key="index"
              :data-category="project.category"
            >
              <div class="card-img-top">
                <img
                  :src="project.image"
                  loading="lazy"
                  :alt="project.title + ' Image'"
                />
              </div>
              <div class="technologies">
                <ul>
                  <li v-for="(tech, i) in project.technologies" :key="i">
                    {{ tech }}
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ project.title }}</h5>
                <p class="card-text">{{ project.description }}</p>
                <div class="buttons">
                  <a :href="project.liveLink" class="btn">Live &lt;~></a>
                  <a :href="project.codeLink" class="btn"
                    >Code <i class="fa-brands fa-github"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProjectsComponent",
  data() {
    return {
      categories: ["All", "Web Design", "WordPress", "UI/UX", "Apps Flutter"],
      selectedCategory: "All",
      projects: [
        {
          title: "Besa",
          description:
            "Education site for studying abroad: It was a Figma file and I converted it to code",
          image: require("@/assets/img/besa/home-page-besa.jpg"), // تحديث المسار هنا
          technologies: [
            "HTML",
            "CSS",
            "JavaScript",
            "jQuery",
            "Bootstrap",
            "Fontawesome",
            "Figma",
            "Photoshop",
          ],
          category: "Web Design",
          liveLink: "https://besa.intimedev.com",
          codeLink: "https://github.com/imsemoo/besa.git",
        },
        // أضف المزيد من المشاريع هنا
      ],
    };
  },
  computed: {
    filteredProjects() {
      if (this.selectedCategory === "All") {
        return this.projects;
      }
      return this.projects.filter(
        (project) => project.category === this.selectedCategory
      );
    },
  },
  methods: {
    filterProjects(category) {
      this.selectedCategory = category;
    },
  },
};
</script>

<style scoped>
/* CSS for Projects from style.css */
.projects .projects-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.projects .btn {
  cursor: pointer;
  border: 1px solid var(--gray, #abb2bf);
  color: var(--gray, #abb2bf);
  padding: 8px 16px;
  margin-right: 8px;
}
</style>
