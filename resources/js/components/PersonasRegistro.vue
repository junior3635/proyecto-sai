<template>
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
	  <v-toolbar-title>Lista de Persona</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>
            <v-dialog v-model="dialogedit" persistent max-width="700px">
        <v-card>
          <v-card-title>
            <span class="headline">Actualizar Persona</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-form
        ref="form"
        v-model="valid"
        lazy-validation>
                <v-flex xs12>
                  <v-text-field v-model="editedPersona.cedula" label="Cedula" required prepend-icon="fingerprint" :rules ="[v => !!v || 'Campo requerido']"></v-text-field>
                </v-flex>
                <v-flex xs12 >
                  <v-text-field 
                  v-model="editedPersona.nombres" 
                  label="Nombres" 
                  required
                  prepend-icon="perm_identity"
                  :rules ="[v => !!v || 'Campo requerido']">
                  </v-text-field>
                </v-flex>
                <v-flex xs12 >
                  <v-text-field v-model="editedPersona.apellidos" label="Apellidos" required prepend-icon="perm_identity" :rules ="[v => !!v || 'Campo requerido']"></v-text-field>
                </v-flex>
                <v-flex xs12 >
          <v-menu
            ref="menu"
            v-model="menu"
            :close-on-content-click="false"
            :nudge-right="40"
            lazy
            transition="scale-transition"
            offset-y
            full-width
            min-width="240px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="editedPersona.fechnacimiento"
                label="Fecha de Nacimiento"
                prepend-icon="event"
                :rules ="[v => !!v || 'Campo requerido']"
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              ref="picker"
              v-model="editedPersona.fechnacimiento"
              :max="new Date().toISOString().substr(0, 10)"
              min="1950-01-01"
              
            ></v-date-picker>
          </v-menu>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="lugnacimiento"
                    label="lugnacimiento"
                    id="lugnacimiento"
                    prepend-icon="location_on"
                    v-model="editedPersona.lugnacimiento"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-select
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="sexo"
                    id="sexo"
                    :items="generos"
                    v-model="editedPersona.sexo"
                    prepend-icon="people"
                    label="Genero"
                  ></v-select>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="telefono"
                    label="Telefono"
                    id="telefono"
                    prepend-icon="contact_phone"
                    v-model="editedPersona.telefono"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="celular"
                    label="celular"
                    id="celular"
                    prepend-icon="call"
                    v-model="editedPersona.celular"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="direccion"
                    label="direccion"
                    id="direccion"
                    prepend-icon="location_on"
                    v-model="editedPersona.direccion"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="correo"
                    label="correo"
                    id="correo"
                    prepend-icon="alternate_email"
                    v-model="editedPersona.correo"
                  ></v-text-field>
                </v-flex>
              </v-form>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn
              :disabled="!valid"
              color="success"
              @click="update"
            >
              Guardar
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-dialog v-model="dialog" persistent max-width="700px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Nueva Persona</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Nueva Persona</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-form
				ref="form"
				v-model="valid"
				lazy-validation>
                <v-flex xs12>
                  <v-text-field v-model="defaultItem.cedula" label="Cedula" required prepend-icon="fingerprint" :rules ="[v => !!v || 'Campo requerido']"></v-text-field>
                </v-flex>
                <v-flex xs12 >
                  <v-text-field 
                  v-model="defaultItem.nombres" 
                  label="Nombres" 
                  required
                  prepend-icon="perm_identity"
                  :rules ="[v => !!v || 'Campo requerido']">
                  </v-text-field>
                </v-flex>
                <v-flex xs12 >
                  <v-text-field v-model="defaultItem.apellidos" label="Apellidos" required prepend-icon="perm_identity" :rules ="[v => !!v || 'Campo requerido']"></v-text-field>
                </v-flex>
                <v-flex xs12 >
					<v-menu
				    ref="menu2"
				    v-model="menu2"
				    :close-on-content-click="false"
				    :nudge-right="40"
				    lazy
				    transition="scale-transition"
				    offset-y
				    full-width
				    min-width="240px"
				  >
				    <template v-slot:activator="{ on }">
				      <v-text-field
				        v-model="defaultItem.fechnacimiento"
				        label="Fecha de Nacimiento"
				        prepend-icon="event"
				        :rules ="[v => !!v || 'Campo requerido']"
				        readonly
				        v-on="on"
				      ></v-text-field>
				    </template>
				    <v-date-picker
				      ref="picker"
				      v-model="defaultItem.fechnacimiento"
				      :max="new Date().toISOString().substr(0, 10)"
				      min="1950-01-01"
				      
				    ></v-date-picker>
				  </v-menu>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="lugnacimiento"
                    label="lugnacimiento"
                    id="lugnacimiento"
                    prepend-icon="location_on"
                    v-model="defaultItem.lugnacimiento"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-select
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="sexo"
                    id="sexo"
                    :items="generos"
                    v-model="defaultItem.sexo"
                    prepend-icon="people"
                    label="Genero"
                  ></v-select>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="telefono"
                    label="Telefono"
                    id="telefono"
                    prepend-icon="contact_phone"
                    v-model="defaultItem.telefono"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="celular"
                    label="celular"
                    id="celular"
                    prepend-icon="call"
                    v-model="defaultItem.celular"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="direccion"
                    label="direccion"
                    id="direccion"
                    prepend-icon="location_on"
                    v-model="defaultItem.direccion"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field
                  :rules ="[v => !!v || 'Campo requerido']"
                    name="correo"
                    label="correo"
                    id="correo"
                    prepend-icon="alternate_email"
                    v-model="defaultItem.correo"
                  ></v-text-field>
                </v-flex>
              </v-form>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn
              :disabled="!valid"
              color="success"
              @click="create"
            >
              Guardar
            </v-btn>
            <v-btn
              color="error"
              @click="reset"
            >
              Reset Form
            </v-btn>
          </v-card-actions>
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
		:items="infopersonas"
		:search="search"
		class="elevation-10">
			<template v-slot:items="props">
				<td class="text-xs-center">{{ props.item.id }}</td>
				<td class="text-xs-center">{{ props.item.cedula }}</td>
				<td class="text-xs-center">{{ props.item.nombres }}</td>
				<td class="text-xs-center">{{ props.item.apellidos }}</td>
				<td class="text-xs-center">{{ props.item.lugnacimiento }}</td>
				<td class="text-xs-center">{{ props.item.fechnacimiento }}</td>
				<td class="text-xs-center">{{ props.item.sexo }}</td>
				<td class="text-xs-center">{{ props.item.telefono }}</td>
				<td class="text-xs-center">{{ props.item.celular }}</td>
				<td class="text-md-center">{{ props.item.direccion }}</td>
				<td class="text-xs-center">{{ props.item.correo }}</td>
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
</template>
<script>
	import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created: function() {
        	this.getPersonas();
        	

        },
        data () {
            return {
            menu: false,
            menu2: false,
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
	          { text: 'Cedula', value: 'cedula' },
	          { text: 'Nombres', value: 'nombres' },
	          { text: 'Apellidos', value: 'apellidos' },
	          { text: 'Logar de Nacimiento', value: 'lugnacimiento' },
	          { text: 'Fecha de Nacimiento', value: 'fechnacimiento' },
	          { text: 'Sexo', value: 'sexo' },
	          { text: 'Telefono', value: 'telefono' },
	          { text: 'Celular', value: 'celular' },
	          { text: 'Direccion', value: 'direccion' },
	          { text: 'Correo', value: 'correo' },
	          { text: 'Opcion', value: '' },
	        ],
  			editedIndex: -1,
  			generos:[
  				{ text: 'Masculino', value: 'masculino' },
  				{ text: 'Femenino', value: 'femenino' },
  			],
  			infopersonas: [],
            fillPersonas: {
				'id': '',
				'cedula': '',
				'nombres': '',
				'apellidos': '',
				'fechnacimiento': '',
				'lugnacimiento': '',
				'sexo': '',
				'telefono': '',
				'celular': '',
				'direccion': '',
				'correo': '',
			},

			editedPersona: {
				id: '',
				cedula: '',
				nombres: '',
				apellidos: '',
				fechnacimiento: '',
				lugnacimiento: '',
				sexo: '',
				telefono: '',
				celular: '',
				direccion: '',
				correo: '',
			},
			defaultItem: {
				id: '',
				cedula: '',
				nombres: '',
				apellidos: '',
				fechnacimiento: '',
				lugnacimiento: '',
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
	        return this.editedIndex === -1 ? 'Nueva Persona' : 'Actualizar Persona'
	      }
	    },

	    watch: {
	      dialog (val) {
	        val || this.close()
	      }
	    },

        methods:{

  			editItem (item) {
		        this.editedIndex = this.infopersonas.indexOf(item)
		        this.editedPersona = Object.assign({}, item)
		        this.dialogedit = true
		    },
		    getPersonas: function() {
                var infopersonas = 'api/personas';
                axios.get(infopersonas).then(response => {
                    this.infopersonas = response.data
                });
            },
            close () {
		        this.dialog = false
		        this.dialogedit = false
		        setTimeout(() => {
		          
		          this.editIndex = -1
		        }, 300)
		      },
		    reset () {
		        this.$refs.form.reset()
		      },
		    create () {
		        	var url = 'personas';
			            axios.post(url, this.defaultItem).then(response => {
			            this.getPersonas();
			            this.$refs.form.validate()
	                    this.close()
	                    this.sussed = true;
	                    }).catch(error => {
	                    this.$refs.form.validate()
                      this.allerros = error.response.data.errors;
	                    this.errorrs = true;
			});
		

		        this.close()
		    },
		    update () {
		        	var url = 'personas/update/'+this.editedPersona.id;
			            axios.post(url, this.editedPersona).then(response => {
			            this.getPersonas();
			            this.$refs.form.validate()
	                    this.close()
	                    this.sussed = true;
	                    }).catch(error => {
	                    this.$refs.form.validate()
	                    this.errorrs = true;
	                    });
		

		        this.close()
		    }
		             
        }

    }
</script>


