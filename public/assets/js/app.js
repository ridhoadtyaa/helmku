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

sidebarSlide();
