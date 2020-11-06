@extends('layouts.nav')

@section('content')
<div class="col-sm-6 col-lg-6 mb-4">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			{{-- <div class="card-title"> --}}
				<div class="float-left">
					<b>Tags</b>
				</div>
				<div class="float-right">
					<a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
						<div class="dropdown-header">New tag:</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item btn-dark btn" href="{{ route('tags.create') }}">Create tag</a>

					</div>
				</div>
			{{-- </div> --}}

		</div>
		<div class="card-body">
			@if ($tags->count() > 0)
			<table class="table table-dark table-hover  table-responsive">
				<thead>
					<tr>
						{{-- <th scope="col">#</th> --}}
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">No. of Posts</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>

        <tbody>
					@foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->id }}.</td>

							<td>{{ $tag->name }}</td>

              <td>
                {{ $tag->posts->count() }}
              </td>

              <td><a class="btn btn-info btn-sm" href="{{ route('tags.edit', $tag->id) }}"><i class="far fa-edit"></i>
              </a></td>

              <td><button class="btn btn-danger btn-sm"  onclick="handleDelete({{ $tag->id }})" ><i class="far fa-trash-alt"></i>
              </button></td>
            </tr>
					@endforeach
					{{-- data-target="#deleteModal" data-toggle="modal" --}}
				</tbody>
			</table>

			<form action="" method="POST" id="deletetagForm">
				@csrf
				@method('DELETE')
				<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content bg-dark">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5><button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<p class="text-bold">Are you sure you want to delete this tag?</p>
							</div>
							<div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button><button class="btn btn-danger btn-sm" type="submit">Yes, Delete</button></div>
						</div>
					</div>
				</div>
			</form>
			@else
				<h3 >
					No tags
				</h3>
			@endif
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script>
		function handleDelete(id) {
			$('#deleteModal').modal('show')
			const form = document.getElementById('deletetagForm')
			form.action = '/tags/' + id
			// console.log(form);
		}
	</script>
@endsection
