// -------------- Funcion para ejecutar el loading de la pagina -------------- 

export const showLoad = function () {
    document.getElementById("loading").style.display = "block";
    document.body.classList.add("disable-interaction");

    const modals = Array.from(document.querySelectorAll(".modal-content"));
    modals.forEach(modal => {
        modal.classList.add("disable-interaction");
    });
}


// -------------- Funcion para detener el loading de la pagina -------------- 

export const hideLoad = function () {
    document.getElementById("loading").style.display = "none";
    document.body.classList.remove("disable-interaction");

    const modals = Array.from(document.querySelectorAll(".modal-content"));
    modals.forEach(modal => {
        modal.classList.remove("disable-interaction");
    });
}