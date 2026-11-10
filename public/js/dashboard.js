
function toggleAccount() {
    const menu = document.getElementById("accountMenu");
    const button = document.querySelector(".account-button");

    if (menu) {
        const isOpen = menu.classList.toggle("show");

        if (button) {
            button.setAttribute("aria-expanded", isOpen);
        }
    }
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    if (!sidebar) return;

    if (window.innerWidth <= 850) {
        const isOpen = sidebar.classList.toggle("open");

        if (overlay) {
            overlay.classList.toggle("show", isOpen);
        }
    } else {
        document.body.classList.toggle("sidebar-collapsed");
    }
}

document.addEventListener("click", function (event) {
    const account = document.querySelector(".account");
    const menu = document.getElementById("accountMenu");
    const button = document.querySelector(".account-button");

    if (account && menu && !account.contains(event.target)) {
        menu.classList.remove("show");

        if (button) {
            button.setAttribute("aria-expanded", "false");
        }
    }
});

window.addEventListener("resize", function () {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    if (window.innerWidth > 850) {
        sidebar?.classList.remove("open");
        overlay?.classList.remove("show");
    } else {
        document.body.classList.remove("sidebar-collapsed");
    }
});
