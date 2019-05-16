<template>
    <div>
        <b-form-group>
            <b-form-checkbox
              v-model="allSelected"
              :indeterminate="indeterminate"
              aria-describedby="dossiers"
              aria-controls="dossiers"
              @change="toggleAll"
            >
              {{ allSelected ? 'Un-select All' : 'Select All' }}
            </b-form-checkbox>

          <b-form-checkbox-group
            id="documents"
            v-model="selected"
            :options="documents"
            name="documents"
            class="ml-4"
            stacked
          ></b-form-checkbox-group>
        </b-form-group>

        <div>
          Selected: <strong v-text="selected"></strong><br>
          All Selected: <strong>@{{ allSelected }}</strong><br>
          Indeterminate: <strong>{{ indeterminate }}</strong>
        </div>
      </div>
</template>


