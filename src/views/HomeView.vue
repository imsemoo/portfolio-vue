<template>
  <div class="home">
    <!-- إضافة المكونات الجديدة -->
    <NavbarComponent />
    <HeaderComponent />
    <AboutMeComponent />
    <ResumeComponent />
    <ProjectsComponent />
    <SkillsComponent />
    <ContactComponent />
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import NavbarComponent from "@/components/NavbarComponent.vue";
import HeaderComponent from "@/components/HeaderComponent.vue";
import AboutMeComponent from "@/components/AboutMeComponent.vue";
import ResumeComponent from "@/components/ResumeComponent.vue";
import ProjectsComponent from "@/components/ProjectsComponent.vue";
import SkillsComponent from "@/components/SkillsComponent.vue";
import ContactComponent from "@/components/ContactComponent.vue";

@Options({
  components: {
    NavbarComponent,
    HeaderComponent,
    AboutMeComponent,
    ResumeComponent,
    ProjectsComponent,
    SkillsComponent,
    ContactComponent,
  },
})
export default class HomeView extends Vue {}
</script>

<style scoped></style>
