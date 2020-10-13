new Vue({
    el: '#crud',
    data: {
        options: {
            package: 'aui-crud-demo',
            list_api_read: 'crud:list.read',
            form_api_read: 'crud:form.read',
            form_api_create: 'crud:form.create',
            form_api_update: 'crud:form.update',
            form_api_delete: 'crud:form.delete',
            form_storable_key: 'storable_id',
            list_type: 'table',
            list_table_columns: {
                id: 'Storable ID',
                title: 'Name',
                subtext: 'Description'
            },
            fields: [
                'storable_id',
                'name',
                'description'
            ],
            views: [
                {
                    name: 'form',
                    tab_name: 'Form'
                },
                {
                    name: 'Test',
                    tab_name: 'Test Page',
                    show_action_bar: false
                }
            ]
        }
    }
});