@extends('layouts.nav')

@section('content')
<div class="col-sm-6 col-lg-6 mb-4">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			<div class="card-title">
				<div class="float-left">
					{{ isset($category) ? 'Edit Category' : '	Create Category' }}
				</div>
				{{-- <div class="float-right">
					<a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
						<div class="dropdown-header">New Category:</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item btn-dark btn" href="{{ route('categories.create') }}">Create Category</a>

					</div>
				</div> --}}
			</div>

		</div>
		<div class="card-body">

			@if ($errors->any())
				<div class="alert alert-danger">
						<ul class="list-group">
							@foreach ($errors->all() as $error)
							<li class="text-danger" style="list-style: none">
								{{ $error }}
							</li>
							@endforeach
						</ul>
					</div>
			@endif

			<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
				@csrf
				@if (isset($category))
					@method('PUT')
				@endif
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="{{ isset($category) ? $category->name : '' }}" >
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">
						{{ isset($category) ? 'Update Category' : 'Add Category' }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection