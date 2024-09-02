<template>
  <div class="contacts" id="scroll_contacts" data-aos="fade-up">
    <!-- بنية الفورم الخاصة بك -->
    <form @submit.prevent="submitForm">
      <!-- حقول النموذج -->
      <input type="text" v-model="formData.name" placeholder="Name" required />
      <input
        type="email"
        v-model="formData.email"
        placeholder="Email"
        required
      />
      <textarea
        v-model="formData.message"
        placeholder="Message"
        required
      ></textarea>
      <button type="submit">Send</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    submitForm() {
      const scriptURL =
        "https://script.google.com/macros/s/AKfycbwrt7yZ9hLL2qwL7r2JHl5Zqh2YUik8aS7Pfp5pfdsw6QQdPAXKm0RN5z64lGF-RWG3/exec"; // استخدم URL الخاص بك هنا

      fetch(scriptURL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(this.formData),
      })
        .then((response) => response.text())
        .then((data) => {
          console.log("SUCCESS!", data);
          alert("Your message has been sent successfully!");
        })
        .catch((error) => {
          console.error("Error!", error.message);
          alert("Failed to send your message. Please try again.");
        });
    },
  },
};
</script>

<style scoped>
/* CSS الخاص بك هنا */
</style>
