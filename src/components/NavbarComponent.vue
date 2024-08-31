<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-aos="fade-down">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="@/assets/img/logo.png" alt="Logo" loading="lazy" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon">
          <i class="fa-solid fa-bars fa-lg" id="menu-icon"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" v-for="(link, index) in links" :key="index">
            <a class="nav-link" :href="link.href">
              <span>#</span>{{ link.name }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavbarComponent",
  data() {
    return {
      links: [
        { name: "home", href: "#scroll_header" },
        { name: "works", href: "#scroll_works" },
        { name: "skills", href: "#scroll_skills" },
        { name: "about-me", href: "#scroll_about" },
        { name: "resume", href: "#scroll_resume" },
        { name: "contacts", href: "#scroll_contacts" },
      ],
    };
  },
};
</script>

<style scoped>
/* CSS for Navbar from style.css */
.navbar {
  padding: 20px 0;
}
.navbar-expand-lg .navbar-nav .nav-link {
  color: var(--gray, #abb2bf);
  font-family: "Fira Code";
  font-size: 16px;
}
.navbar-expand-lg .navbar-nav .nav-link.active {
  color: var(--white, #fff);
  font-weight: 500;
}
.navbar-expand-lg .navbar-nav .nav-link span {
  color: var(--primary, #c778dd);
}
</style>
