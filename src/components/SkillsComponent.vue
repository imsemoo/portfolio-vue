<template>
  <div class="skills" id="scroll_skills" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="section-title skills-title"><span>#</span>skills</h2>
        </div>
        <div class="col-md-5" style="text-align: center; margin-top: 20px">
          <div class="design-image">
            <!-- تعديل مسار الصورة -->
            <img :src="designImage" alt="background" />
          </div>
        </div>
        <div class="col-md-7">
          <div class="grid-skills">
            <div
              class="box-skills"
              v-for="(skillCategory, index) in skills"
              :key="index"
              data-aos="zoom-in"
            >
              <div class="header-skills">
                <h4>{{ skillCategory.name }}</h4>
              </div>
              <div class="body-skills">
                <ul>
                  <li v-for="(skill, i) in skillCategory.items" :key="i">
                    {{ skill }}
                  </li>
                </ul>
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
  name: "SkillsComponent",
  data() {
    return {
      // إضافة المسار الصحيح للصورة باستخدام require
      designImage: require("@/assets/img/background-skills-2.png"),
      skills: [
        { name: "Languages", items: ["HTML", "CSS", "JavaScript", "PHP"] },
        { name: "Tools", items: ["Adobe XD", "Photoshop", "Figma"] },
        { name: "Library", items: ["jQuery (a JavaScript library)"] },
        { name: "Frameworks", items: ["Vue.js", "CakePHP"] },
        { name: "Other", items: ["WordPress", "Fontawesome", "MySQL"] },
      ],
    };
  },
};
</script>

<style scoped>
/* CSS for Skills from style.css */
.skills {
  padding: 60px 0;
}
.grid-skills {
  display: grid;
  grid-template-columns: 1fr 1fr 2fr;
  gap: 16px;
}
.box-skills {
  border: 1px solid var(--gray, #abb2bf);
}
</style>
