const d = document,
w = window;

function scrollTopButton(btn) {
    const $scrollBtn = d.querySelector(btn);
  
    //Deteccion scroll
    w.addEventListener("scroll", (e) => {
      let scrollTop = d.documentElement.scrollTop;
      if (scrollTop > 400) {
        $scrollBtn.classList.remove("hidden");
      } else {
        $scrollBtn.classList.add("hidden");
      }
    });
  
    //Deteccion click
    d.addEventListener("click", (e) => {
      if (e.target.matches(btn)) {
        w.scrollTo({
          behavior: "smooth",
          top: 0,
        });
      }
    });
  }

d.addEventListener("DOMContentLoaded", (e) => {
    scrollTopButton(".scroll-top-btn")
  });