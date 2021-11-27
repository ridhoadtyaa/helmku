const sidebarSlide = () => {
    const burger = document.querySelector(".burger");
    const close = document.querySelector(".sidebar-modal-content > ul > li");
    const modalContent = document.querySelector(".sidebar-modal-content");

    burger.addEventListener("click", () => {
        modalContent.classList.toggle("active");
    });

    close.addEventListener("click", () => {
        modalContent.classList.toggle("active");
    });
};

const upButton = document.getElementById("upBtn");

window.onscroll = () => {scrollFunction()};

const scrollFunction = () => {
  if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
    upButton.style.display = "block";
  } else {
    upButton.style.display = "none";
  }
}

const topFunction = () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

sidebarSlide();
