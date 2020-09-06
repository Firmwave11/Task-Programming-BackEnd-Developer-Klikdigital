@extends('layout.app')
@section('breadcrump')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Data Student</strong>
				<form name="create" method="post" action="{{route('create')}}" id="formCreate">
					{{ method_field('GET') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary btn-sm">Create</button>
				</form>
			</div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						@php $no=1; @endphp
						@foreach ($student as $student)
							<tr>
								<td>{{ $no++ }}.</td>
								<td>{{ $student->name }}</td>
								<td>{{ $student->phone }}</td>
								<td>{{ $student->email }}</td>
								<td><img src="{{ url('uploads')}}/{{$student->foto}}" style="width: 100px; height: 100px"></td>
								<td class="left">
										<button type="submit" class="btn btn-primary btn-sm" form='formEdit{{$student->id}}'><i class="fa fa-edit"></i></button>
										<button type="submit" class="btn btn-danger btn-sm" form='formHapus{{$student->id}}'><i class="fa fa-trash"></i></button>
										<form name="{{$student->id}}" method="post" action="{{route('edit', [$student->id])}}" id="formEdit{{$student->id}}">
											{{ method_field('GET') }}
											{{ csrf_field() }}
										</form>
										<form name="{{$student->id}}" method="post" action="{{route('destroy', [$student->id])}}" id="formHapus{{$student->id}}">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
										</form>
									</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection