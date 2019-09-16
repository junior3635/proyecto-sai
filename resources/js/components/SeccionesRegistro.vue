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
	      Informacion Actualziada Correctamente!
	    </v-alert>
    </v-dialog>		
	
	<v-toolbar color="white">
	  <v-toolbar-title>Secciones</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>

      <v-dialog v-model="dialog" persistent max-width="500">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Nueva Seccion</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <form>
                <v-flex xs12>
                  <v-text-field 
                  v-model="editedSecciones.nomsecc" 
                  mask="A" 
                  label="Nombre Seccion" 
                  required 
                  prepend-icon="fingerprint">></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-autocomplete
                    v-model="editedSecciones.idgrado"
                    :items="infoGrados"
                    item-text="descripciongrado"
			        item-value="id"

                    prepend-icon="people"
                    label="Grado"
                  ></v-autocomplete>
                </v-flex>
                <v-flex xs12>
                  <v-text-field 
                  type="number" 
                  mask="##" 
                  v-model="editedSecciones.capacidad" 
                  label="Capacidad" 
                  required 
                  prepend-icon="fingerprint">></v-text-field>
                </v-flex>
                <v-flex xs12>
		                  <v-text-field prepend-icon="list" v-model="editedSecciones.turno" label="Turno" >
		                  	
		                  </v-text-field>
		                </v-flex>
                <v-flex xs12>
                  <v-autocomplete
			        v-model="editedSecciones.idperiodo"
			        :items="infoPeriodos"
			        item-text="descripcionperiodo"
			        item-value="id"
			        label="Periodo"
			        placeholder="Periodo Academico"
			        prepend-icon="mdi-database-search"
			      ></v-autocomplete>
                </v-flex>
                <v-flex xs12>
                  <v-autocomplete
			        v-model="editedSecciones.idprofesor"
			        :items="infoProfesores"
			        item-text="cedula"
			        item-value="id"
			        label="Profesor"
			        placeholder="Cedula Profesor"
			        prepend-icon="mdi-database-search"
			      >
				  <template slot="selection" slot-scope="data">
		                  {{ data.item.persona.nombres}}, {{data.item.persona.apellidos}}, {{data.item.persona.cedula}}
		                </template>
			              <template v-slot:item="data">

			                <template>
			                  <v-list-tile-content>
			                    <v-list-tile-title v-html="`${data.item.persona.cedula}, ${data.item.persona.apellidos}, ${data.item.persona.nombres}`"></v-list-tile-title>
			                  </v-list-tile-content>
			                </template>
			              </template>
		          </v-autocomplete>
                </v-flex>

              </form>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
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
		:items="infoSecciones"
		:search="search"
		class="elevation-1">
			<template v-slot:items="props">
				<td class="text-xs-center text-capitalize">{{ props.item.id }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.nomsecc }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.grado.descripciongrado }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.capacidad }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.turno }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.periodo.descripcionperiodo }}</td>
				<td class="text-xs-center text-capitalize">{{ props.item.profesor.persona.cedula }}&nbsp{{ props.item.profesor.persona.apellidos }}&nbsp{{ props.item.profesor.persona.nombres }}</td>

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
        	this.getPeriodos();
        	this.getProfesores();
        	this.getSecciones();
        	this.getGrados();

        	

        },
        data () {
            return {
            menu: false,
        	search: '',
        	dialog: false,
        	sussed: false,
	        headers: [
	          { text: 'ID', value: 'id' },
	          { text: 'Nombre ', value: 'nomsecc' },
	          { text: 'Grado ', value: 'grado.descripciongrado' },
	          { text: 'Capacidad', value: 'capacidad' },
	          { text: 'Turno', value: 'turno' },
	          { text: 'Periodo', value: 'idperiodo' },
	          { text: 'Profesor', value: 'idprofesor' },
	          { text: 'Opcion', value: '9' },
	        ],
  			editedIndex: -1,
  			infoProfesores:[],
  			infoPeriodos:[],
  			infoSecciones: [],
  			infoGrados: [],
            fillPersonas: {
				'id': '',
				'nomsecc': '',
				'idgrado': '',
				'turno': '',
				'capacidad': '',
				'idperiodo': '',
				'idprofesor': '',
			},

			editedSecciones: {
				id: '',
				nomsecc: '',
				idgrado: '',
				turno: '',
				capacidad: '',
				idperiodo: '',
				idprofesor: '',
			},
			defaultItem: {
				id: '',
				nomsecc: '',
				idgrado: '',
				turno: '',
				capacidad: '',
				idperiodo: '',
				idprofesor: '',

			},
			errors: '',

            }
        },
        computed: {
	      formTitle () {
	        return this.editedIndex === -1 ? 'Nueva Seccion' : 'Actualizar Seccion'
	      }
	    },

	    watch: {
	      dialog (val) {
	        val || this.close()
	      }
	    },

        methods:{

  			editItem (item) {
		        this.editedIndex = this.infoSecciones.indexOf(item)
		        this.editedSecciones = Object.assign({}, item)
		        this.dialog = true
		    },
		    getSecciones: function() {
                var urlSecciones = 'api/secciones';
                axios.get(urlSecciones).then(response => {
                    this.infoSecciones = response.data
                });
            },
            getProfesores: function() {
                var urlPeriodos = 'api/profesores';
                axios.get(urlPeriodos).then(response => {
                    this.infoProfesores = response.data
                });
            },
            getPeriodos: function() {
                var urlPeriodos = 'api/periodos';
                axios.get(urlPeriodos).then(response => {
                    this.infoPeriodos = response.data
                });
            },
            getGrados: function() {
                var urlGrados = 'api/grados';
                axios.get(urlGrados).then(response => {
                    this.infoGrados = response.data
                });
            },
            close () {
		        this.dialog = false
		        setTimeout(() => {
		          this.editedSecciones = Object.assign({}, this.defaultItem)
		          this.editIndex = -1
		        }, 300)
		      },
		    save () {
		    	if (this.editedIndex > -1) {

		          	var url = 'secciones/update/'+this.editedSecciones.id;
			            axios.post(url, this.editedSecciones).then(response => {
			            this.getSecciones();
			            this.sussed = true


			            }).catch(error => {
						this.errors = 'Corrija los campos para completar la Informacion'
						});


		        } else {

		        	var url = 'secciones';
			            axios.post(url, this.editedSecciones).then(response => {
			            this.getSecciones();
			            this.sussed();

			            }).catch(error => {
						this.errors = 'Corrija los campos para completar la Informacion'
			});
		          
		        }
					

		        this.close()
		    }         
        }

    }
</script>

