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
        {
          name: "Frontend Technologies",
          items: ["Vue.js", "jQuery", "Bootstrap", "SASS"],
        },
        {
          name: "WordPress",
          items: [
            "Theme Development",
            "Plugin Development",
            "Custom Post Types",
            "WooCommerce",
          ],
        },
        {
          name: "UI/UX Design",
          items: [
            "User Research",
            "Wireframing",
            "Prototyping",
            "User Testing",
            "Figma",
            "Adobe XD",
          ],
        },
        {
          name: "Design Tools",
          items: ["Adobe Photoshop", "Adobe Illustrator", "Figma"],
        },
        { name: "Version Control", items: ["Git", "GitHub"] },
        {
          name: "Mobile App Development",
          items: ["Flutter", "Dart", "Mobile UI Design", "State Management"],
        },
        {
          name: "Other Skills",
          items: [
            "Responsive Design",
            "Cross-browser Compatibility",
            "SEO Basics",
            "Performance Optimization",
          ],
        },
      ],
    };
  },
};
</script>
