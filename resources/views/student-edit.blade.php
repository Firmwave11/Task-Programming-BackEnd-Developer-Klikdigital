@extends('layout.app')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Edit Data student</strong>
			</div>
			<div class="panel-body">
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
				
				<form method="post" action="{{route('update', [$student-> id] )}}" enctype="multipart/form-data" >
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Name :</label>
							<input type="text" name="name" class="form-control" required="required" placeholder="Name student..." value="{{ $student->name }}">
						</div>
						<div class="form-group">
							<label>Phone :</label>
							<input type="text" name="phone" class="form-control" required="required" placeholder="Phone student..."
							value="{{ $student->phone }}" >
						</div>
						<div class="form-group">
							<label>Email :</label>
							<input type="email" name="email" class="form-control" placeholder="Email.."value="{{ $student-> email }}"></input>
						</div>
						<div class="form-group">
							<label>Foto :</label>
							<input type="file" name="foto" class="form-control" value="{{$student->foto}}"></input>
							<img src="{{ url('uploads')}}/{{$student->foto}}" id="foto2" name="foto2" style="width: 100px; height: 100px"/>	
						</div>
						    <button type="submit" class="btn btn-primary btn-sm">Save The Change</button>
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