<template>
  <aui-crud
    v-bind="options"
    :calling.sync="calling"
    :form.sync="form"
    :feedback.sync="feedback"
    class="ds-container docs-container primary"
  >
    <template #form="{ overlay }">
      <aui-input
        label="Name"
        :disabled="overlay"
        :failure="feedback.name"
        v-model="form.name"
      />
      <aui-input
        label="Description"
        :disabled="overlay"
        :failure="feedback.description"
        v-model="form.description"
      />
    </template>
  </aui-crud>
</template>

<script>
export default {
  data() {
    return {
      options: {
        storable_key: 'storable_id',
        list_title: 'AUI CRUD Demo',
        list_read_api: 'crud.list.read',
        list_type: 'table',
        list_table_column_names: {
          storable_id: 'ID',
          name: 'Name',
          description: 'Description'
        },
        list_table_storage_key: 'aui_crud_demo',
        form_create_api: 'crud.form.create',
        form_read_api: 'crud.form.read',
        form_update_api: 'crud.form.update',
        form_delete_api: 'crud.form.delete'
      },
      calling: false,
      form: {
        storable_id: null,
        name: null,
        description: null
      },
      feedback: {
        name: null,
        description: null
      }
    };
  }
}
</script>