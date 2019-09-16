<template>

<v-expansion-panel>
    <v-expansion-panel-content>
      <template v-slot:actions>
        <v-icon color="primary">$vuetify.icons.expand</v-icon>
      </template>
      <template v-slot:header>
        <div>Alumnos</div>
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
	  <v-toolbar-title>Lista de Alumnos</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" persistent max-width="700px">
		    <template v-slot:activator="{ on }">
		      <v-btn color="primary" dark class="mb-2" v-on="on">Nuevo Alumno</v-btn>
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
		                lazy-validation>
		                <v-flex xs12>
							<v-autocomplete
			                    v-model="editedItem.idpersona"
			                    :items="infoPersonas"
			                    item-text="cedula"
			                    item-value="id"
			                    label="Cedula persona"
			                    persistent-hint
			                    prepend-icon="fingerprint"
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
		                <v-flex xs12>
		                  <v-text-field prepend-icon="list" v-model="editedItem.condicionalum" label="Condicion" >
		                  	
		                  </v-text-field>
		                </v-flex>
		                

		                <v-flex xs12>
		                  <v-text-field prepend-icon="navigation" v-model="editedItem.procedenciaalum" label="Procedencia" >
		                  	
		                  </v-text-field>
		                </v-flex>
		                <v-flex xs12>
		                  <v-autocomplete
					        v-model="editedItem.idrepresentante"
					        :items="infoRepresentantes"
					        item-text="persona.cedula"
		                    item-value="id"
					        :label="`Cedula Representante`"
					        prepend-icon="fingerprint"
					      >
					      <template slot="selection" slot-scope="data">
		                    {{ data.item.persona.cedula}}
		                  </template>
		                  <template v-slot:item="data">

		                    <template>
		                      <v-list-tile-content>
		                        <v-list-tile-title v-html="`${data.item.persona.cedula}`"></v-list-tile-title>
		                        <v-list-tile-sub-title v-html="`${data.item.persona.apellidos},  ${data.item.persona.nombres}`" ></v-list-tile-sub-title>
		                      </v-list-tile-content>
		                    </template>
		                  </template>
					      </v-autocomplete>
		                </v-flex>
		              </v-form>
		            </v-container>
		      </v-card-text>

		      <v-card-actions>
		        <v-spacer></v-spacer>
		        <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
		        <v-btn color="blue darken-1" flat @click="create">Save</v-btn>
		      </v-card-actions>
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
		                lazy-validation>
		                <v-flex xs12>
							<v-autocomplete
			                    v-model="editedItem.idpersona"
			                    :items="infoPersonas"
			                    item-text="cedula"
			                    item-value="id"
			                    label="Cedula persona"
			                    persistent-hint
			                    prepend-icon="fingerprint"
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
		                <v-flex xs12>
		                  <v-text-field prepend-icon="list" v-model="editedItem.condicionalum" label="Condicion" >
		                  	
		                  </v-text-field>
		                </v-flex>
		                

		                <v-flex xs12>
		                  <v-text-field prepend-icon="navigation" v-model="editedItem.procedenciaalum" label="Procedencia" >
		                  	
		                  </v-text-field>
		                </v-flex>
		                <v-flex xs12>
		                  <v-autocomplete
					        v-model="editedItem.idrepresentante"
					        :items="infoRepresentantes"
					        item-text="persona.cedula"
		                    item-value="id"
					        :label="`Cedula Representante`"
					        prepend-icon="fingerprint"
					      >
					      <template slot="selection" slot-scope="data">
		                    {{ data.item.persona.cedula}}
		                  </template>
		                  <template v-slot:item="data">

		                    <template>
		                      <v-list-tile-content>
		                        <v-list-tile-title v-html="`${data.item.persona.cedula}`"></v-list-tile-title>
		                        <v-list-tile-sub-title v-html="`${data.item.persona.apellidos},  ${data.item.persona.nombres}`" ></v-list-tile-sub-title>
		                      </v-list-tile-content>
		                    </template>
		                  </template>
					      </v-autocomplete>
		                </v-flex>
		              </v-form>
		            </v-container>
		      </v-card-text>

		      <v-card-actions>
		        <v-spacer></v-spacer>
		        <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
		        <v-btn color="blue darken-1" flat @click="update">Save</v-btn>
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
		rows-per-page-text="Registros por pagina"
		:items="infoalumns"
		:search="search"
		:expand="expand"
		class="elevation-1">
			<template v-slot:items="props">
				<tr @click="props.expanded = !props.expanded">
					<td class="text-xs-center text-capitalize">{{ props.item.id }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.cedula }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.nombres }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.apellidos }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.lugnacalum }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.fechnacimiento }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.sexo }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.condicionalum }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.persona.direccion }}</td>
					<td class="text-xs-center text-capitalize">{{ props.item.procedenciaalum }}</td>
					<td class="flex-item">{{ props.item.representante.persona.cedula }} </td>
					<td class="text-xs-center">
			          <v-icon
			            small
			            class="mr-2"
			            @click="editItem(props.item)"
			          >
			            edit
			          </v-icon>
		      		</td>
		      	</tr>
			</template>
			<template v-slot:expand="props">
		    <v-card flat>
		      <v-card-text>
		      	<span>Datos Representante</span>
		      	<table
		class="v-datatable v-table table-bordered theme--dark">
				<thead>
					<tr>
						<th class="text-xs-center">Nombres</th >
						<th class="text-xs-center">Apellidos</th>
						<th class="text-xs-center">Fecha de Nacimiento</th>
						<th class="text-xs-center">Parentesco</th>
						<th class="text-xs-center">Direccion</th>
						<th class="text-xs-center">Telefono</th>
						<th class="text-xs-center">Celular</th>
						<th class="text-xs-center">Correo</th>
					</tr>
					
				</thead>
				<tbody>
					
				
		      	<tr>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.nombres }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.apellidos }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.fechnacimiento }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.parentesco }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.direccion }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.telefono }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.celular }}</td>
		      		<td class="text-xs-center text-capitalize">{{ props.item.representante.persona.correo }}</td>
		      	</tr>
		      	</tbody>
		      </table>
		      	 

		      </v-card-text>
		    </v-card>
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
        	this.getAlumns();
        	this.getRepresentantes();
        	this.getPersonas();

        },
        data () {
            return {
            allerros: [],
          	sussed : false,   
            expand: false,
        	search: '',
        	dialog: false,
        	dialogedit: false,
        	errorrs: false,
        	valid: true,
			errors: '',
	        headers: [
	          { text: 'ID', value: 'id' },
	          { text: 'Cedula', value: 'persona.cedula' },
	          { text: 'Nombres', value: 'persona.nombres' },
	          { text: 'Apellidos', value: 'persona.apellidos' },
	          { text: 'Lugar de Nacimiento', value: 'lugnacalum' },
	          { text: 'Fecha de Nacimiento', value: 'persona.fechnacimiento' },
	          { text: 'Sexo', value: 'persona.sexo' },
	          { text: 'Direccion', value: 'persona.direccion' },

	          { text: 'Condicion', value: 'condicionalum' },
	          { text: 'Procedencia', value: 'procedenciaalum' },
	          { text: 'Representante', value: 'idrepresentante' },
	          { text: 'Opcion', value: '' },
	        ],

	        generos:[
  				{ text: 'Masculino', value: 'masculino' },
  				{ text: 'Femenino', value: 'femenino' },
  			],
  			editedIndex: -1,
  			infoalumns: [],
  			enabled: false,
  			infoRepresentantes: [],
  			infoPersonas: [],
            fillAlumno: {
			'idpersona': '',
			'lugnacalum': '',
			'condicionalum': '',
			'procedenciaalum': '',
			'idrepresentante': '',
			},

			editedItem: {
				id: '',
				idpersona: '',
				condicionalum: '',
				procedenciaalum: '',
				idrepresentante: '',
			},
			defaultItem: {
				id: '',
				idpersona: '',
				condicionalum: '',
				procedenciaalum: '',
				idrepresentante: '',
			},

            }
        },
        computed: {
	      formTitle () {
	        return this.editedIndex === -1 ? 'Nuevo Alumno' : 'Actualizar Alumno'
	      }
	    },

	    watch: {
	      dialog (val) {
	        val || this.close()
	      }
	    },

        methods:{

  			editItem (item) {
		        this.editedIndex = this.infoalumns.indexOf(item)
		        this.editedItem = Object.assign({}, item)
		        this.dialogedit = true
		    },
		    getAlumns: function() {
                var urlInfoalums = 'api/alumnos';
                axios.get(urlInfoalums).then(response => {
                    this.infoalumns = response.data
                });
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
		          this.editedItem = Object.assign({}, this.editedItem)
		          this.editIndex = -1
		        }, 300)
		      },
		    update () {

		          	var url = 'alumnos/update/'+this.editedItem.id;
			            axios.post(url, this.editedItem).then(response => {
			            this.getAlumns();
			            this.$refs.form.validate()
	                    this.close()
	                    this.allerros = [];
	                    this.sussed = true;
	                    
	                    } ).catch((error) => {
	                      this.$refs.form.validate()
	                      this.allerros = error.response.data.errors;
	                      this.errorrs = true;
	                    
	                   });
					

		        this.close()
		    },
		    create () {


		        	var url = 'alumnos';
			            axios.post(url, this.editedItem).then(response => {
			            this.getAlumns();
			            this.$refs.form.validate()
	                    this.close()
	                    this.allerros = [];
	                    this.sussed = true;
	                    } ).catch((error) => {
	                      this.$refs.form.validate()
	                      this.allerros = error.response.data.errors;
	                      this.errorrs = true;
	                      
	                   });
		         	this.close()
		    }         
        }

    }
</script>


