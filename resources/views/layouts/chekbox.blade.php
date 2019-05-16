


    <div id='appcheck'></div>
    <b-form-group>
        <template>
            <td>
                {{nom}}
            </td>
            <td>
                {{prenom}}
            </td>
            <td>
                <b-form-checkbox v-model="allSelected" :indeterminate="indeterminate"   aria-describedby="dossier" aria-controls="documents" @change="toggleAll">
                    {{ allSelected ? 'Un-select All' : 'Select All' }}
                </b-form-checkbox>
            </td>
        </template>
    </b-form-group>
    <b-form-checkbox-group id="documents" v-model="selected" :options="documents" name="documents" class="ml-4" stacked ></b-form-checkbox-group>
    </b-form-group>
    <div>
          Selected: <strong>{{ selected }}</strong><br>
          All Selected: <strong>{{ allSelected }}</strong><br>
          Indeterminate: <strong>{{ indeterminate }}</strong>
        </div>
      </div>
    </template>

<script>
    export default{
    data(){

          return {
            documents: ['CertifMedical','photo','autorisationsRendues'],
            selected: [],
            allSelected: false,
            indeterminate: false
          }
        },
        methods: {
           toggleAll(checked) {
             this.selected = checked ? this.documents.slice() : []
           }
         },
        watch: {
             selected(newVal, oldVal) {
               if (newVal.length === 0) {
                 this.indeterminate = false
                 this.allSelected = false
               } else if (newVal.length === this.documents.length) {
                 this.indeterminate = false
                 this.allSelected = true
               } else {
                 this.indeterminate = true
                 this.allSelected = false
               }
             }
           }
         }
       </script>

