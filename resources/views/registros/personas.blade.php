@extends('layouts.layout1')
@section('local_css')

@endsection
@section('content')
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Datos Personales</h1>
	<div class="container-fluid">
	  <v-app id="app">
	  	<personas-registro></personas-registro>
	  	<v-expansion-panel>
		    <v-expansion-panel-content>
		      <template v-slot:actions>
		        <v-icon color="primary">$vuetify.icons.expand</v-icon>
		      </template>
		      <template v-slot:header>
		        <div>Registros</div>
		      </template>
		      	<v-card>
					
					<alumnos-registro></alumnos-registro>
					<representante-registro></representante-registro>
					<profesores-registro></profesores-registro>
				</v-card>
			</v-expansion-panel-content>
		</v-expansion-panel>
				</template>
	 </v-app>

	</div>
<!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->
@section('local_js')
<script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>

@endsection


@endsection

