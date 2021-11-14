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

const readMore = () => {
    const readMore = document.querySelector(".helm-read-more");
    const extraText = document.getElementsByClassName("helm-extra-text")[0];

    readMore.addEventListener("click", () => {
        if (extraText.style.display === "") {
            readMore.textContent = "Baca sedikit..."
            extraText.style.display = "block";
        } else {
            extraText.style.display = "";
            readMore.textContent = "Baca selengkapnya..."
        }
    });
}

sidebarSlide();
readMore();