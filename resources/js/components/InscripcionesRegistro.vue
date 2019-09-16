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
	  <v-toolbar-title>Inscripciones</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>

      <v-dialog v-model="dialog" persistent max-width="500">
	        <template v-slot:activator="{ on }">
	          <v-btn color="primary" dark class="mb-2" v-on="on">Nueva Inscripcion</v-btn>
	        </template>
	        <v-card>
	          <v-card-title>
	            <span class="headline">{{ formTitle }}</span>
	          </v-card-title>

	          <v-card-text>
	            <v-container grid-list-md>
	              <form>
	                <v-flex xs12>
	                  <v-autocomplete
				        v-model="editedInscripciones.idalum"
				        :items="infoAlumnos"
				        item-text="persona.cedula"
				        item-value="id"
				        label="Alumno"
				        placeholder="Cedula Estudiantil"
				        prepend-icon="mdi-database-search"
				      >
				      <template slot="selection" slot-scope="data">
	                  {{ data.item.persona.apellidos}}, {{data.item.persona.nombres}}, {{data.item.persona.cedula}}
	                </template>
		              <template v-slot:item="data">

		                <template>
		                  <v-list-tile-content>
		                    <v-list-tile-title v-html="`${data.item.persona.apellidos},  ${data.item.persona.nombres}, ${data.item.persona.cedula}`"></v-list-tile-title>
		                    <v-list-tile-sub-title v-html="`${data.item.representante.parentesco}, ${data.item.representante.persona.apellidos}, ${data.item.representante.persona.nombres} ,${data.item.representante.persona.cedula}`" ></v-list-tile-sub-title>
		                  </v-list-tile-content>
		                </template>
		              </template>
				  </v-autocomplete>

	                </v-flex>
	                <v-flex xs12>
		                <v-menu
					        ref="menu"
					        v-model="menu"
					        :close-on-content-click="false"
					        :nudge-right="40"
					        :return-value.sync="editedInscripciones.fecha"
					        lazy
					        transition="scale-transition"
					        offset-y
					        full-width
					        min-width="290px"
					      >
					        <template v-slot:activator="{ on }">
					          <v-text-field
					            v-model="editedInscripciones.fecha"
					            label="Fecha de Inscripcion"
					            prepend-icon="event"
					            readonly
					            v-on="on"
					          ></v-text-field>
					        </template>
					        <v-date-picker v-model="editedInscripciones.fecha" no-title scrollable>
					          <v-spacer></v-spacer>
					          <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
					          <v-btn flat color="primary" @click="$refs.menu.save(editedInscripciones.fecha)">OK</v-btn>
					        </v-date-picker>
					      </v-menu>
			      </v-flex>
	                <v-flex xs12>
	                
	                  <v-autocomplete
				        v-model="editedInscripciones.idseccion"
				        :items="infoSecciones"
				        hide-no-data
				        hide-selected
				        item-text="grado.descripcionseccion"
				        item-value="id"
				        label="Seccion"
				        placeholder="Seccion"
				        prepend-icon="mdi-database-search"
				      >
						  <template slot="selection" slot-scope="data">
			                  {{ data.item.grado.descripciongrado}}, {{data.item.nomsecc}}, {{data.item.periodo.descripcionperiodo}}, {{data.item.turno}}
			                </template>
				              <template v-slot:item="data">

				                <template>
				                  <v-list-tile-content>
				                    <v-list-tile-title v-html="`${data.item.grado.descripciongrado}, Seccion '${data.item.nomsecc}',  ${data.item.periodo.descripcionperiodo},${data.item.turno} `"></v-list-tile-title>
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
		:items="infoInscripciones"
		:search="search"
		class="elevation-1">
			<template v-slot:items="props">
				<td class="text-xs-center">{{ props.item.id }}</td>
				<td class="text-xs-center">{{ props.item.alumno.persona.apellidos }}</td>
				<td class="text-xs-center">{{ props.item.alumno.persona.nombres }}</td>
				<td class="text-xs-center">{{ props.item.alumno.persona.cedula }}</td>
				<td class="text-xs-center">{{ props.item.fecha }}</td>
				<td class="text-xs-center">{{ props.item.seccion.grado.descripciongrado }} "{{ props.item.seccion.nomsecc }}" </td>
				<td class="text-xs-center">{{ props.item.seccion.periodo.descripcionperiodo }}</td>
				<td class="text-xs-center">{{ props.item.seccion.turno }}</td>

				<td class="text-xs-center">
					<v-icon small class="mr-2"
					@click="generatePdf(props.item)"
					>archive</v-icon>
					<button onclick="window.location.href='/page2'">Continue</button>
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
        	this.getInscripciones();
        	this.getSecciones();
        	this.getAlumnos();
        	

        },
        data () {
            return {
            menu: false,
        	search: '',
        	dialog: false,
        	sussed: false,
        	isLoading: false,
		    model: null,
		    errorrs: false,
		    allerros: [],


	        headers: [
	          { text: 'ID', value: 'id' },
	          { text: 'ApellidosNombres ', value: 'alumno.apealum' },
	          { text: 'Nombres', value: 'alumno.nomalum' },
	          { text: 'Cedula de Identidad o Cedula Estudiantil ', value: 'alumno.persona.cedula' },
	          { text: 'Fecha de Inscripcion', value: 'fecha' },
	          { text: 'Seccion', value: 'seccion.descripcionseccion' },
	          { text: 'Periodo', value: 'seccion.periodo.descripcionperiodo' },
	          { text: 'Turno', value: 'seccion.turnoseccion' },
	          { text: 'Opciones', value: '' },
	        ],
  			editedIndex: -1,
  			infoSecciones:[],
  			infoInscripciones: [],
  			infoAlumnos: [],
            fillPersonas: {
				'id': '',
				'codigoinscripcion': '',
				'fecha': '',
				'idseccion': '',
				'idalum': '',
				'turno': '',
			},

			editedInscripciones: {
				id: '',
				fecha: '',
				codigoinscripcion: '',
				idseccion: '',
				idalum: '',
				turno: '',

			},
			defaultInscripciones: {
				id: '',
				fecha: '',
				codigoinscripcion: '',
				idseccion: '',
				idalum: '',
				turno: '',

			},
			errors: '',

            }
        },
        computed: {
	      formTitle () {
	        return this.editedIndex === -1 ? 'Nueva Inscripcion' : 'Actualizar Inscripcion'
	      }
	    },

	    watch: {
	      dialog (val) {
	        val || this.close()
	      }
	    },

        methods:{
		    
  			editItem (item) {
		        this.editedIndex = this.infoInscripciones.indexOf(item)
		        this.editedInscripciones = Object.assign({}, item)
		        this.dialog = true
		    },

		    generatePdf(item){
		    	this.editedInscripciones = Object.assign({}, item)
		    	var urlPdf = 'pdf/constancia/inscripcion/'+this.editedInscripciones.id;
		    	 axios.get(urlPdf).then(response => {
		    	 	window.location.href='pdf/constancia/inscripcion/'+this.editedInscripciones.id;

			            });

		    },

		    getAlumnos: function(){

		    	var urlAlumnos = 'api/alumnos';
                axios.get(urlAlumnos).then(response => {
                    this.infoAlumnos = response.data
                });

		    },
		    getSecciones: function(){

		    	var urlSecciones = 'api/secciones';
                axios.get(urlSecciones).then(response => {
                    this.infoSecciones = response.data
                });

		    },
		    getInscripciones: function() {
                var urlInscripciones = 'api/inscripciones';
                axios.get(urlInscripciones).then(response => {
                    this.infoInscripciones = response.data
                });
            },
            close () {
		        this.dialog = false
		        setTimeout(() => {
		          this.editedInscripciones = Object.assign({}, this.defaultItem)
		          this.editIndex = -1
		        }, 300)
		      },
		    save () {
		    	if (this.editedIndex > -1) {

		          	var url = 'inscripciones/update/'+this.editedInscripciones.id;
			            axios.post(url, this.editedInscripciones).then(response => {
			            this.getInscripciones();
			            this.sussed = true


			            }).catch(error => {
						this.errors = 'Corrija los campos para completar la Informacion'
						});


		        } else {

		        	var url = 'inscripciones';
			            axios.post(url, this.editedInscripciones).then(response => {
			            this.getInscripciones();
			            this.sussed();
			            this.allerros = [];
			            } ).catch((error) => {
	                      this.allerros = error.response.data.errors;
	                      this.errorrs = true;
	                    
	                   });
		          
		        }
					

		        this.close()
		    }         
        }

    }
</script>


