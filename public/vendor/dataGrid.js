$(function(){
    var url = "http://127.0.0.1:8000/api";
    $("#grid").dxDataGrid({
        dataSource: DevExpress.data.AspNet.createStore({
            key: "id",
            loadUrl: url + "/categories",
            insertUrl: url + "/categories",
            updateUrl: url + "/categories",
            deleteUrl: url + "/categories",
            onBeforeSend: function(method, ajaxOptions) {
                console.log(ajaxOptions);
                ajaxOptions.xhrFields = { withCredentials: true};
                ajaxOptions.headers = {"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')};
            }
        }),
        remoteOperations: true,
        columns: [{
            dataField: "name",
            caption: "Category",
            validationRules: [{
                type: "stringLength",
                message: "The field name must be a string with a maximum length of 40.",
                max: 40
            }],


        }
        ],
        // filterRow: {
        //     visible: true
        // },
        // headerFilter: {
        //     visible: true
        // },
        // groupPanel: {
        //     visible: true
        // },
        scrolling: {
            mode: "virtual"
        },
        height: 600,
        showBorders: true,
        masterDetail: {
            enabled: true,
            template: function(container, options) {
                $("<div>")
                    .dxDataGrid({
                        dataSource: DevExpress.data.AspNet.createStore({
                            loadUrl: url + "/products",
                            loadParams: { category_id : options.data.id },
                            onBeforeSend: function(method, ajaxOptions) {
                                ajaxOptions.xhrFields = { withCredentials: false };
                            }
                        }),
                        showBorders: true
                    }).appendTo(container);
            }
        },
        editing: {
            allowAdding: true,
            allowUpdating: true,
            allowDeleting: true
        },
        grouping: {
            autoExpandAll: false
        }
    });
});
