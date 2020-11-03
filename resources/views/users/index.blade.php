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
						<div class="dropdown-header">New Post:</div>
						<div class="dropdown-divider"></div>
						{{-- <a class="dropdown-item btn-dark btn" href="{{ route('') }}">Create User</a> --}}

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
						<th scope="col">Action</th>
						{{-- <th scope="col">Delete</th> --}}
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>

							<td>
								{{ $user->id }}.
							</td>

							<td class="text-left">
								<img src="{{ $user->avatar }}"  height="" alt="" style="border-radius:50%; border:.1rem solid white; width:3rem">
							</td>
							<td>{{ $user->name }}</td>
							<td>
                {{ $user->email }}
							</td>
              <td>
                @if (!$user->isAdmin())
                  <div class="">
                    <form action="{{ route('users.make_admin', $user->id) }}" method="post">
                      @csrf
                      <button class="btn btn-success btn-sm" type="submit">Make Admin
                         <i class="fas fa-user-tag"></i>
                      </button>
                    </form>
                  </div>
                @endif
              </td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<h3>No users available <i class="fas fa-user-times"></i></h3>
			@endif
		</div>
	</div>
</div>
@endsection

