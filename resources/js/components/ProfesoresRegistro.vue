<template>
<v-expansion-panel>
    <v-expansion-panel-content>
      <template v-slot:actions>
        <v-icon color="primary">$vuetify.icons.expand</v-icon>
      </template>
      <template v-slot:header>
        <div>Profesores</div>
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
         
         <h6 v-for="error of allerros">
          {{ error[0] }}
         </h6>


          

    

        </v-alert>

      </v-dialog> 
  
  <v-toolbar color="white">
    <v-toolbar-title>Lista de Profesores</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>

      <v-dialog v-model="dialog" persistent max-width="700px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Nuevo Profesor</v-btn>
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
                    :items="personas"
                    item-text="cedula"
                    item-value="id"
                    v-model="editedProfesores.idpersona"
                    prepend-icon="fingerprint"
                    label="Cedula Profesor"
                    :rules ="[v => !!v || 'Campo requerido']"
                  >
                  <template slot="selection" slot-scope="data">
                    {{ data.item.apellidos}}, {{ data.item.nombres}}, {{ data.item.cedula}}
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
            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn
              :disabled="!valid"
              color="success"
              @click="save"
            >
              Guardar
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
    :items="infoProfesores"
    :search="search"
    class="elevation-1">
      <template v-slot:items="props">
        <td class="text-xs-center">{{ props.item.id }}</td>
        <td class="text-xs-center">{{ props.item.idpersona }}</td>
        <td class="text-xs-center">{{ props.item.persona.cedula }}</td>
        <td class="text-xs-center">{{ props.item.persona.nombres }}</td>
        <td class="text-xs-center">{{ props.item.persona.apellidos }}</td>
        <td class="text-xs-center">{{ props.item.persona.fechnacimiento }}</td>
        <td class="text-xs-center">{{ props.item.persona.sexo }}</td>
        <td class="text-xs-center">{{ props.item.persona.telefono }}</td>
        <td class="text-xs-center">{{ props.item.persona.celular }}</td>
        <td class="text-xs-center">{{ props.item.persona.direccion }}</td>
        <td class="text-xs-center">{{ props.item.persona.correo }}</td>
        <td class="text-xs-center">
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
  import 'material-design-icons'
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created: function() {
          this.getProfesores();
          this.getPersonas();
          

        },
        data () {
            return {
          model: false,
          allerros: [],
          success : false,    
          valid: false,
          search: '',
          dialog: false,
          sussed: false,
          errorrs: false,
          headers: [
            { text: 'ID', value: 'id' },
            { text: 'Id Persona', value: 'idpersona' },
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
        personas:[{

        }],
        infoProfesores: [],
        fillPersonas: {
        'id': '',
        'codprofesor': '',
        'idpersona': '',
        'cedula': '',
        'nombres': '',
        'apellidos': '',
        'fechnacimiento': '',
        'sexo': '',
        'telefono': '',
        'celular': '',
        'direccion': '',
        'correo': '',
      },

      editedProfesores: {
        id: '',
        codprofesor: '',
        idpersona: '',
        cedula: '',
        nombres: '',
        apellidos: '',
        fechnacimiento: '',
        sexo: '',
        telefono: '',
        celular: '',
        direccion: '',
        correo: '',
      },
      defaultItem: {
        id: '',
        codprofesor: '',
        idpersona: '',
        cedula: '',
        nombres: '',
        apellidos: '',
        fechnacimiento: '',
        sexo: '',
        telefono: '',
        celular: '',
        direccion: '',
        correo: '',

      },
      errors: '',

            }
        },
        computed: {
        formTitle () {
          return this.editedIndex === -1 ? 'Nuevo Profesor' : 'Actualizar Profesor'
        }
      },

      watch: {
        dialog (val) {
          val || this.close()
        }
      },

        methods:{
          refresh(){
            this.getPersonas();
          },

          editItem (item) {
              this.editedIndex = this.infoProfesores.indexOf(item)
              this.editedProfesores = Object.assign({}, item)
              this.dialog = true
          },
          getProfesores: function() {
                  var urlProfesores = 'api/profesores';
                  axios.get(urlProfesores).then(response => {
                      this.infoProfesores = response.data
                  });
              },
          getPersonas: function() {
                  var urlPersonas = 'api/personas';
                  axios.get(urlPersonas).then(response => {
                      this.personas = response.data
                  });
              },
          close () {
            this.dialog = false
            setTimeout(() => {
              this.editedProfesores = Object.assign({},this.defaultItem)
              this.editedIndex = -1
            }, 300)
          },
          save () {
            if (this.editedIndex > -1) {

                  
                  var url = 'profesores/update/'+this.editedProfesores.idpersona;
                    axios.post(url, this.editedProfesores).then(response => {
                    this.getProfesores();
                    this.sussed = true;
                    }).catch(error => {
                    this.$refs.form.validate()
                    this.errorrs = true;
                    this.errors = 'Corrija los campos para completar la Informacion'
                    });
                  


              } else {
                
                var url = 'profesores';
                    axios.post(url, this.editedProfesores).then(response => {
                    this.getProfesores();
                    this.allerros = [];
                    this.sussed = true;
                    } ).catch((error) => {
                        this.allerros = error.response.data.errors;
                        this.errorrs = true;

                    });
                    
                
              }
            

              this.close()
          },
         },       
        }
</script>


