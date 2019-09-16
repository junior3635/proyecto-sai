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
	  <v-toolbar-title>Periodos</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>

      <v-dialog v-model="dialog" max-width="500">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Nuevo Periodo</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <form>
              
                <v-flex xs12>
                  <v-text-field v-model="editedPeriodo.periodo" label="Periodo" required prepend-icon="fingerprint">></v-text-field>
                </v-flex>
                <v-flex xs12 >
                  <v-text-field 
                  v-model="editedPeriodo.ano" 
                  label="Año" 
                  required
                  prepend-icon="perm_identity">
                  </v-text-field>
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
		:items="infoPeriodos"
		:search="search"
		class="elevation-1">
			<template v-slot:items="props">
				<td class="text-xs-center">{{ props.item.id }}</td>
				<td class="text-xs-center">{{ props.item.periodo }}</td>
				<td class="text-xs-center">{{ props.item.ano }}</td>
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
        	

        },
        data () {
            return {
            menu: false,
        	search: '',
        	dialog: false,
        	sussed: false,
	        headers: [
	          { text: 'ID', value: 'id' },
	          { text: 'Periodo', value: 'periodo' },
	          { text: 'Año', value: 'ano' },
	          { text: 'Editar', value: '' },
	        ],
  			editedIndex: -1,

  			infoPeriodos: [],
            fillPersonas: {
				'id': '',
				'periodo': '',
				'ano': '',
			},

			editedPeriodo: {
				id: '',
				periodo: '',
				ano: '',
			},
			defaultItem: {
				id: '',
				periodo: '',
				ano: '',

			},
			errors: '',

            }
        },
        computed: {
	      formTitle () {
	        return this.editedIndex === -1 ? 'Nueva Periodo' : 'Actualizar Periodo'
	      }
	    },

	    watch: {
	      dialog (val) {
	        val || this.close()
	      }
	    },

        methods:{

        	sussed () {

        		sussed: true
        	},

  			editItem (item) {
		        this.editedIndex = this.infoPeriodos.indexOf(item)
		        this.editedPeriodo = Object.assign({}, item)
		        this.dialog = true
		    },
		    getPeriodos: function() {
                var urlPeriodos = 'api/periodos';
                axios.get(urlPeriodos).then(response => {
                    this.infoPeriodos = response.data
                });
            },
            close () {
		        this.dialog = false
		        setTimeout(() => {
		          this.editedPeriodo = Object.assign({}, this.defaultItem)
		          this.editedIndex = -1
		        }, 300)
		      },
		    save () {
		    	if (this.editedIndex > -1) {

		          	var url = 'periodos/update/'+this.editedPeriodo.id;
			            axios.post(url, this.editedPeriodo).then(response => {
			            this.getPeriodos();
			            this.sussed = true


			            }).catch(error => {
						this.errors = 'Corrija los campos para completar la Informacion'
						});


		        } else {

		        	var url = 'periodos';
			            axios.post(url, this.editedPeriodo).then(response => {
			            this.getPeriodos();
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


