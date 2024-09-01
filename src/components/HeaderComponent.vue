<template>
  <div class="header" id="scroll_header" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h2 class="header-title">
            Eslam is a creative
            <span class="header-subtitle"> UI/UX designer</span> & versatile
            <span class="header-subtitle"> front-end developer</span>
            specialized in
            <span class="header-subtitle">WordPress solutions</span>
          </h2>
          <p class="header-description">
            Crafting intuitive user interfaces, developing responsive websites,
            and creating customized WordPress solutions where technology meets
            creativity.
          </p>
          <a href="#" class="btn">Contact me!!</a>
        </div>
        <div class="col-md-5">
          <div class="header-images" data-aos="zoom-in">
            <img
              src="@/assets/img/frame-back.svg"
              alt="Frame"
              class="frame"
              loading="lazy"
            />
            <img
              src="@/assets/img/avatar.jpg"
              alt="Avatar"
              class="avatar"
              loading="lazy"
              width="100%"
            />
            <img
              src="@/assets/img/Dots.svg"
              alt="Dots"
              class="dots"
              loading="lazy"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
};
</script>

<style scoped></style>
