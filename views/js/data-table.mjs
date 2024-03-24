// -------------- Funcion para data table --------------

export const dataTable = function (columns, data) {

    new DataTable('.data-table', {
        columns: columns,
        data: data,
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
        },
    });
};