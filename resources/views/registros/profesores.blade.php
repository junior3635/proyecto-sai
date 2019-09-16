@extends('layouts.layout1')
@section('local_css')

@endsection
@section('content')
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Inicio</h1>
	<div class="container-fluid">
	  <v-app id="app">
	  	<profesores-registro></profesores-registro>
	 </v-app>

	</div>
<!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->
@section('local_js')
<script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>

@endsection


@endsection

