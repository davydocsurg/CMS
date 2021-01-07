@extends('layouts.nav')

@section('content')
<div class="col-sm-6 col-lg-10 mb-4">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			{{-- <div class="card-title"> --}}
				<div class="float-left">
					Users
				</div>
				<div class="float-right">
					<a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
						<div class="dropdown-header">New User:</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item btn-dark btn" href="{{ route('users.create') }}">Create User</a>

					</div>
				</div>
			{{-- </div> --}}

		</div>
		<div class="card-body">
			@if ($users->count() > 0 )
			<table class="table table-dark table-hover table-responsive">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Image</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Permission</th>
						{{-- <th scope="col">Modify</th> --}}
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>

							<td>
								{{ $user->id }}.
							</td>

							<td class="text-left">
								<img src="{{ asset($user->profile->avatar) }}" class="rounded-circle"  height="" alt="" style=" border:.1rem solid white; width:3rem">
							</td>
							<td>{{ $user->name }}</td>
							<td>
                {{ $user->email }}
							</td>

							<td>

								@if ($user->id == 1)
									<b class="text-success">Super Admin</b>
								@endif

								@if (Auth::id() == 1 && Auth::id() !== $user->id)
									@if (!$user->isAdmin())
										<div class="">
											<form action="{{ route('users.make_admin', $user->id) }}" method="post">
												@csrf
												<button class="btn btn-success btn-sm" type="submit">Make Admin
													<i class="fas fa-user-tag"></i>
												</button>
											</form>
										</div>

									@else
									<div class="">
										{{-- @if (!$user->isWriter()) --}}
										<form action="{{ route('users.remove_admin', $user->id) }}" method="post">
											@csrf
											<button class="btn btn-warning btn-sm" type="submit">Make Writer
												<i class="fas fa-user-edit"></i>
											</button>
										</form>
										{{-- @endif --}}
									</div>

									@endif
								@endif
								</td>


							{{-- <td>
								<a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-user-edit"></i></a>
							</td>
							--}}

							@if (Auth::id() !== $user->id && Auth::id() == 1)
								<td>

									<button class="btn btn-danger btn-sm"  onclick="handleDelete({{ $user->id }})">
										<i class="fas fa-trash-alt"></i>
									</button>

								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
			<form action="" method="POST" id="deleteUserForm">
				@csrf
				@method('DELETE')
				<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content bg-dark">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete User</h5><button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<p class="text-bold">Are you sure you want to delete this User?</p>
							</div>
							<div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button><button class="btn btn-danger btn-sm" type="submit">Yes, Delete</button></div>
						</div>
					</div>
				</div>
			</form>
			@else
				<h3>No users available <i class="fas fa-user-times"></i></h3>
			@endif
			<div class="card-footer bg-dark">

				<div class="mt-1 float-left">
					{{ $users->appends(['search' =>request()->query('search')])->links() }}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script>
		function handleDelete(id) {
			$('#deleteModal').modal('show')
			const form = document.getElementById('deleteUserForm')
			form.action = '/users/' + id
			// console.log(form);
		}
	</script>
@endsection