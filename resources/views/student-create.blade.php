@extends('layout.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Tambah Data Student</strong>
			</div>

			<div class="panel-body">
				<!-- @if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif -->
				<div class="card-body">
                	@if (count($errors) > 0)
                	<div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
                    @endif
				<form method="post" enctype="multipart/form-data" action="{{route('store')}}">
                   
                    {{ csrf_field() }}
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Name :</label>
							<input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name student..." >
						</div>
						<div class="form-group">
							<label>Phone :</label>
							<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone student..." >
						</div>
						<div class="form-group">
							<label>Email :</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Email.."></input>
						</div>
						<div class="form-group">
							<label>Foto :</label>
							<input type="file" name="foto" id="foto" class="form-control" ></input>
						</div>
						 <button type="submit" class="btn btn-primary btn-sm">Create</button> 
					</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>