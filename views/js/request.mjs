// -------------- Funcion para hacer solicitudes fetch --------------

export const makeRequest = function (url, method, data = null) {
    let options = {
        method: method
    };

    if (method.toUpperCase() === 'POST') {
        options.body = data;
    }

    return fetch(url, options)
        .then(response => response.text())
        .then(result => result)
        .catch(error => {
            console.log("Error:", error);
        });
}