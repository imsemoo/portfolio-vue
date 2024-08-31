<template>
  <div class="home">
    <!-- إضافة المكونات الجديدة -->
    <NavbarComponent />
    <ProjectsComponent />
    <SkillsComponent />
    <ContactComponent />
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import NavbarComponent from "@/components/NavbarComponent.vue";
import ProjectsComponent from "@/components/ProjectsComponent.vue";
import SkillsComponent from "@/components/SkillsComponent.vue";
import ContactComponent from "@/components/ContactComponent.vue";

@Options({
  components: {
    NavbarComponent,
    ProjectsComponent,
    SkillsComponent,
    ContactComponent,
  },
})
export default class HomeView extends Vue {}
</script>

<style scoped>
/* يمكنك وضع أنماط CSS الخاصة بـ HomeView هنا أو تركها فارغة */
</style>
