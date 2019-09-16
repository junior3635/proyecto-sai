<template>
<v-expansion-panel>
    <v-expansion-panel-content>
      <template v-slot:actions>
        <v-icon color="primary">$vuetify.icons.expand</v-icon>
      </template>
      <template v-slot:header>
        <div>Representantes</div>
      </template>
      <v-card>
<div>
    <v-dialog
        v-model="sussed"
        width="500"
      >
        <v-alert
          :value="true"
          type="success"
        >
          Informacion Actualizada Correctamente!
        </v-alert>
    </v-dialog> 
    <v-dialog
      v-model="errorrs"
      width="500"
    >
      <v-alert
        :value="true"
        type="error"
      >
       
       <span v-if="allerros.idpersona" :class="['label label-danger']">@{{ allerros.idpersona[0] }}</span>
      </v-alert>
    </v-dialog>  
  
  <v-toolbar color="white">
    <v-toolbar-title>Lista de Representantes</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>

      <v-dialog v-model="dialog" persistent max-width="700px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Nuevo Representante</v-btn>
        </template>
        <v-card>
          
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
             <v-form
                ref="form"
                v-model="valid"
                lazy-validation
              >
                <v-flex xs12>
                  <v-autocomplete
                    :items="infoPersonas"
                    item-text="cedula"
                    item-value="id"
                    v-model="defaultItem.idpersona"
                    prepend-icon="fingerprint"
                    label="Cedula"
                    :rules ="[v => !!v || 'Campo requerido']"
                  >
                  <template slot="selection" slot-scope="data">
                    {{ data.item.apellidos}}, {{ data.item.nombres}}, {{ data.item.cedula}},
                  </template>
                  <template v-slot:item="data">

                    <template>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="`${data.item.cedula}`"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="`${data.item.apellidos},  ${data.item.nombres}`" ></v-list-tile-sub-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                  </v-autocomplete>
                </v-flex>
                <v-flex xs12>
                  <v-text-field 
                  v-model="defaultItem.parentesco" 
                  label="Parentesco" 
                  counter="25" 
                  :rules ="[v => !!v || 'Campo requerido']"
                  required 
                  prepend-icon="people">
                  </v-text-field>
                </v-flex>

            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn
              :disabled="!valid"
              color="success"
              @click="save"
            >
              Guardar
            </v-btn>
            <v-btn
              color="error"
              @click="reset"
            >
              Reset Form
            </v-btn>
            

          </v-form>
              
            </v-container>
          </v-card-text>
          
        </v-card>

      </v-dialog>
      <v-dialog v-model="dialogedit" persistent max-width="700px">
        <v-card>
          
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
             <v-form
                ref="form"
                v-model="valid"
                lazy-validation
              >
                <v-flex xs12>
                  <v-autocomplete
                    :items="infoPersonas"
                    item-text="cedula"
                    item-value="id"
                    v-model="editedRepresentante.idpersona"
                    prepend-icon="fingerprint"
                    label="Cedula"
                    :rules ="[v => !!v || 'Campo requerido']"
                  >
                  <template slot="selection" slot-scope="data">
                    {{ data.item.apellidos}}, {{ data.item.nombres}}, {{ data.item.cedula}},
                  </template>
                  <template v-slot:item="data">

                    <template>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="`${data.item.cedula}`"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="`${data.item.apellidos},  ${data.item.nombres}`" ></v-list-tile-sub-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                  </v-autocomplete>
                </v-flex>
                <v-flex xs12>
                  <v-text-field 
                  v-model="editedRepresentante.parentesco" 
                  label="Parentesco" 
                  counter="25" 
                  :rules ="[v => !!v || 'Campo requerido']"
                  required 
                  prepend-icon="people">
                  </v-text-field>
                </v-flex>

            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn
              :disabled="!valid"
              color="success"
              @click="update"
            >
              Guardar
            </v-btn>
            <v-btn
              color="error"
              @click="reset"
            >
              Reset Form
            </v-btn>
            

          </v-form>
              
            </v-container>
          </v-card-text>
          
        </v-card>

      </v-dialog>

  </v-toolbar>
  <v-card>
    <v-card-title>
      <v-text-field
      v-model="search"
      append-icon="search"
      label="Buscar"
      single-line
      hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
    :headers="headers"
    :items="infoRepresentantes"
    :search="search"
    class="elevation-1">
      <template v-slot:items="props">
        <td class="text-xs-center text-capitalize">{{ props.item.id }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.idpersona }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.parentesco }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.cedula }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.nombres }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.apellidos }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.fechnacimiento }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.sexo }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.telefono }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.celular }}</td>
        <td class="text-xs-center text-capitalize">{{ props.item.persona.direccion }}</td>
        <td class="text-xs-center text-uppercase">{{ props.item.persona.correo }}</td>
        <td class="text-xs-center ">
              <v-icon
                small
                class="mr-2"
                @click="editItem(props.item)"
              >
                edit
              </v-icon>
          </td>
      </template>
      <template v-slot:no-results>
        <v-alert :value="true" color="error" icon="warning">
        No se encontro "{{ search }}" en los resultados.
        </v-alert>
      </template>
    </v-data-table>

  </v-card>
</div>
      </v-card>
    </v-expansion-panel-content>
</v-expansion-panel>
</template>

<script>
  import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created: function() {
          this.getRepresentantes();
          this.getPersonas();
          

        },
        data () {
            return {
          allerros: [],
          success : false,    
          valid: true,
          search: '',
          dialog: false,
          dialogedit: false,
          sussed: false,
          errorrs: false,
          headers: [
            { text: 'ID', value: 'id' },
            { text: 'Id Persona', value: 'idpersona' },
            { text: 'Parentesco', value: 'parentesco' },
            { text: 'Cedula', value: 'persona.cedula' },
            { text: 'Nombres', value: 'persona.nombres' },
            { text: 'Apellidos', value: 'persona.apellidos' },
            { text: 'Fecha de Nacimiento', value: 'persona.fechnacimiento' },
            { text: 'Sexo', value: 'persona.sexo' },
            { text: 'Telefono', value: 'persona.telefono' },
            { text: 'Celular', value: 'persona.celular' },
            { text: 'Direccion', value: 'persona.direccion' },
            { text: 'Correo', value: 'persona.correo' },
            { text: 'Opcion', value: '' },
          ],
        editedIndex: -1,
        infoPersonas:[],
        infoRepresentantes: [],
        fillPersonas: {
        'id': '',
        'idpersona': '',
        'parentesco': '',
      },

      editedRepresentante: {
        id: '',
        idpersona: '',
        parentesco: '',
      },
      defaultItem: {
        id: '',
        idpersona: '',
        parentesco: '',

      },
      errors: '',

            }
        },
        computed: {
        formTitle () {
          return this.editedIndex === -1 ? 'Nuevo Representante' : 'Actualizar Representante'
        }
      },

      watch: {
        dialog (val) {
          val || this.close()
        }
      },

        methods:{

          editItem (item) {
              this.editedIndex = this.infoRepresentantes.indexOf(item)
              this.editedRepresentante = Object.assign({}, item)
              this.dialogedit = true
          },
          getRepresentantes: function() {
                  var urlRepresentantes = 'api/representantes';
                  axios.get(urlRepresentantes).then(response => {
                      this.infoRepresentantes = response.data
                  });
              },
          getPersonas: function() {
                  var urlPersonas = 'api/personas';
                  axios.get(urlPersonas).then(response => {
                      this.infoPersonas = response.data
                  });
              },
          close () {
            this.dialog = false
            this.dialogedit = false
            setTimeout(() => {
              this.defaultItem = Object.assign({},this.defaultItem)
              this.editedIndex = -1
            }, 300)
          },
          reset () {
            this.$refs.form.reset()
          },
          save () {
               
                var url = 'representantes';
                    axios.post(url, this.editedRepresentante).then(response => {
                    this.getRepresentantes();
                    this.$refs.form.validate()
                    this.close()
                    this.allerros = [];
                    this.sussed = true;
                    
                    } ).catch((error) => {
                      this.$refs.form.validate()
                        this.allerros = error.response.data.errors;
                        this.errorrs = true;
                   });
            

              
          },
          update () {
            var url = 'representantes/update/'+this.editedRepresentante.idpersona;
                    axios.post(url, this.editedRepresentante).then(response => {
                    this.getRepresentantes();
                    this.$refs.form.validate()
                    this.close()
                    this.sussed = true;
                    }).catch(error => {
                    this.$refs.form.validate()
                    this.errorrs = true;
                    });

          }
         },       
        }
</script>


