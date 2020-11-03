@extends('layouts.nav')

@section('content')
<div class="col-sm-6 col-lg-6 mb-4">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			<div class="card-title">
				<div class="float-left">
					{{ isset($tag) ? 'Edit Tag' : '	Create Tag' }}
				</div>
				{{-- <div class="float-right">
					<a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
						<div class="dropdown-header">New tag:</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item btn-dark btn" href="{{ route('tags.create') }}">Create tag</a>

					</div>
				</div> --}}
			</div>

		</div>
		<div class="card-body">
      @include('partials.errors')
			<form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
				@csrf
				@if (isset($tag))
					@method('PUT')
				@endif
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter tag Name" value="{{ isset($tag) ? $tag->name : '' }}" autofocus >
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">
						{{ isset($tag) ? 'Update tag' : 'Add tag' }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection