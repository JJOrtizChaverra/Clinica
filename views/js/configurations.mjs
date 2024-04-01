// ---------- Funcion para el modo oscuro ----------

export const darkMode = function() {

    const switcherTheme = document.getElementById("switch-dark-mode");

    const root = document.documentElement;

    if(root.getAttribute("data-theme") === "dark") {
        switcherTheme.checked = true;
    }

    switcherTheme.addEventListener("click", toggleTheme);

    function toggleTheme() {
        const setTheme = switcherTheme.checked ? "dark" : "light";

        root.setAttribute("data-theme", setTheme);

        localStorage.setItem("theme", setTheme);
    }

}