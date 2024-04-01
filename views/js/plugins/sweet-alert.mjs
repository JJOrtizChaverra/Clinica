export const sweetAlert = function (type, title) {

    if (type === "error") {
        return Swal.fire({
            title: title,
            icon: type,
            timer: 5000,
            timerProgressBar: true,
            allowOutsideClick: false,
            confirmButtonColor: "#367FA9",
            confirmButtonText: "Aceptar",
        })
    }

    if (type === "success") {
        return Swal.fire({
            title: title,
            icon: type,
            timer: 5000,
            timerProgressBar: true,
            allowOutsideClick: false,
            confirmButtonColor: "#367FA9",
            confirmButtonText: "Aceptar",
        })
    }

    if (type === "confirm") {
        return Swal.fire({
            title: title,
            icon: "warning",
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: "#367FA9",
            cancelButtonColor: "#D9483B",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        })
    }

    if (type === "loading") {
        Swal.fire({
            title: title,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
        })
    }
}