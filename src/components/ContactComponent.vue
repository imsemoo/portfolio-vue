<template>
  <div class="contacts" id="scroll_contacts" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="section-title contacts-title"><span>#</span>contacts</h2>
          <p>
            I’m interested in freelance opportunities. However, if you have
            another request or question, don’t hesitate to contact me.
          </p>
        </div>
        <div class="col-md-6">
          <div class="box-contacts">
            <h4>Message me here</h4>
            <ul>
              <li>
                <a href="mailto:en.developer2@gmail.com"
                  ><i class="fa fa-envelope"></i> Contact Us</a
                >
              </li>
              <li>
                <a href="tel:+201002952013"
                  ><i class="fa-solid fa-phone"></i>+201002952013</a
                >
              </li>
              <li>
                <a href="https://www.linkedin.com/in/imsemooo/" target="_blank"
                  ><i class="fa-brands fa-linkedin"></i>islam-abdelnasser</a
                >
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-12">
          <div class="box-form">
            <h4>Contact Me</h4>
            <form @submit.prevent="submitForm">
              <div class="d-flex">
                <div class="form-floating">
                  <input
                    type="text"
                    id="name"
                    v-model="formData.name"
                    class="form-control"
                    placeholder="name"
                    required
                  />
                  <label for="name">Name:</label>
                </div>
                <div class="form-floating">
                  <input
                    type="email"
                    id="email"
                    v-model="formData.email"
                    class="form-control"
                    placeholder="name@example.com"
                    required
                  />
                  <label for="email">Email:</label>
                </div>
              </div>
              <div class="form-floating">
                <textarea
                  id="message"
                  v-model="formData.message"
                  rows="8"
                  style="height: 180px"
                  class="form-control"
                  placeholder="Message"
                  required
                >
Please write message</textarea
                >
                <label for="message">Message:</label>
              </div>
              <button type="submit" class="btn">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactComponent",
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
      // Code to handle form submission
      alert("Form submitted");
    },
  },
};
</script>

<style scoped>
/* CSS for Contacts from style.css */
.contacts {
  padding: 60px 0;
}
.box-contacts {
  border: 1px solid var(--gray, #abb2bf);
  padding: 16px;
  width: max-content;
  margin-left: auto;
}
</style>
