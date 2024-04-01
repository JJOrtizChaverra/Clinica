// -------------- Funcion para mostrar un mensaje de alerta en la pagina --------------

export const badgeAlert = function (message, type, idAlert) {

    const alert = document.getElementById(idAlert);

    if (type === "error") {
        alert.classList.remove("alert-success");
        alert.classList.add("alert-danger");
    }

    if (type === "success") {
        alert.classList.remove("alert-danger");
        alert.classList.add("alert-success");
    }

    alert.textContent = message;
    alert.style.display = "block";

    setTimeout(() => {
        alert.style.display = "none";
        alert.textContent = "";
    }, 5000);
}