<template>
  <aui-crud
    v-bind="options"
    :form.sync="form"
    :feedback.sync="feedback"
    :calling.sync="calling"
    class="ds-container docs-container primary"
  >

    <!-- List title -->
    <template #list-title>Test List</template>

    <!-- List buttons -->
    <template #list-buttons>
      <aui-button>
        <i class="fas fa-table-tennis" />
      </aui-button>
    </template>

    <!-- Form page -->
    <template #form="{ overlay }">

      <div class="col-2">
        <aui-input
          label="name"
          :failure="feedback.name"
          :disabled="overlay"
          v-model="form.name"
        />
        <aui-input
          label="description"
          :failure="feedback.description"
          :disabled="overlay"
          v-model="form.description"
        />
      </div>

    </template>

    <!-- Test page -->
    <template #test>
      <p>I'm on the test page!</p>
    </template>

  </aui-crud>
</template>

<script>
export default {
  data() {
    return {
      options: {
        list_api_read: 'crud.list.read',
        form_api_read: 'crud.form.read',
        form_api_create: 'crud.form.create',
        form_api_update: 'crud.form.update',
        form_api_delete: 'crud.form.delete',
        form_storable_key: 'storable_id',
        list_type: 'table',
        list_table_columns: {
          storable_id: {
            label: 'Storable ID',
            format: value => {
              return value;
            },
            hide_on_ipad: true
          },
          title: 'Name',
          subtext: {
            label: 'Description',
            format: value => {
              return value;
            },
            hide_on_mobile: true
          }
        },
        views: {
          form: 'Form',
          test: {
            name: 'Test Page',
            show_action_bar: false
          }
        }
      },
      form: {
        storable_id: null,
        name: null,
        description: null
      },
      feedback: {
        name: null,
        description: null
      },
      calling: false
    };
  }
}
</script>