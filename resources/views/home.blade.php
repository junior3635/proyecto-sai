@extends('layouts.layout1')
@section('local_css')
  <!-- Custom styles for this page -->
  <link href="sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Inicio</h1>
    <div class="container-fluid" >
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          </div>
        </div>
      </div>

    </div>
<!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->

</div>

@section('local_js')

<!-- Scripts -->
<script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>

@endsection
@endsection
