// -------------- Funcion para data table --------------

export const dataTable = function () {

    new DataTable('.data-table', {
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
        },
    });
};