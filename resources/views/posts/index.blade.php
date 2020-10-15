@extends('layouts.nav')

@section('content')
<div class="col-sm-6 col-lg-10 mb-4">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			{{-- <div class="card-title"> --}}
				<div class="float-left">
					Posts
				</div>
				<div class="float-right">
					<a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
						<div class="dropdown-header">New Post:</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item btn-dark btn" href="{{ route('post.create') }}">Create Post</a>

					</div>
				</div>
			{{-- </div> --}}

		</div>
		<div class="card-body">
			@if ($posts->count() > 0)
			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<th scope="col">Image</th>
						<th scope="col">Title</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<td>
								<img src="{{ $post->image }}" width="50%" height="50%" alt="" srcset="">
							</td>
							<td>{{ $post->title }}</td>
							@if (!$post->trashed())
								<td>
									<button class="btn btn-info btn-sm" href="{{ route('post.edit', $post->id) }}"><i class="far fa-edit"></i>
									</button>
								</td>
							@endif

							<td>
								<form action="{{ route('post.destroy', $post->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm">
									{{-- {{ $post->trashed() ? '<i class="fas fa-trash-restore"></i>' : '<i class="fas fa-trash"></i>' }} --}}
									<i class="{{ !$post->trashed() ? 'fas fa-trash-retore' : 'fas fa-trash' }}"></i>
								</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<h3>No posts</h3>
			@endif
		</div>
	</div>
</div>
@endsection