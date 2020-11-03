@extends('layouts.nav')

@section('content')
<div class="col-sm-12 col-md-12 col-lg-10 mb-4 container">
	<div class="card text-white bg-dark">
		<div class="card-header bg-dark">
			<div class="card-title">
				<div class="float-left">
					{{-- Create Post --}}
					{{ isset($post) ? 'Edit Post' : '	Create Post' }}
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
			@include('partials.errors')

			{{-- <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data"> --}}
				<form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@if (isset($post))
					@method('PUT')
				@endif
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter post Title" value="{{ isset($post) ? $post->title : '' }}" >
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" class="form-control" cols="5" rows="5"
					placeholder="Enter post Description"
					>{{ isset($post) ? $post->description : '' }}</textarea>
				</div>

				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" class="form-control" cols="5" placeholder="Enter post Content" rows="5" >{{ isset($post) ? $post->content : '' }}</textarea>

					{{-- <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}"  class="form-control">
  				<trix-editor input="content" ></trix-editor> --}}
				</div>

				<div class="form-group">
					<label for="published_at">Published At</label>
					<input type="text" class="form-control" id="published_at" placeholder="Publish at..." name="published_at" value="{{ isset($post) ? $post->published_at : '' }}" >
					{{-- value="{{ isset($post) ? $post->name : '' }}"  --}}


					{{-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ isset($post) ? $post->published_at : '' }}">
						<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div> --}}
				</div>

				@if (isset($post))
					<div class="form-group">
						<img src="{{ asset($post->image) }}" alt="" style="width:100%;">
					</div>
				@endif

				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image" name="image" placeholder="Enter post Name" value="{{ isset($post) ? $post->image : '' }}"  >
					{{-- value="{{ isset($post) ? $post->name : '' }}" --}}
				</div>

				<div class="form-group">
					<label for="category">Category</label>
					<select name="category" id="category" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								@if (isset($post))
									@if ($category->id === $post->category_id)
										selected
									@endif
								@endif
							>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>

				@if ($tags->count() > 0)
					<div class="form-group">
						<label for="tags">Tags</label>

						<select name="tags[]" id="tags" class="form-control" multiple>
							@foreach ($tags as $tag)
								<option value="{{ $tag->id }}"
									@if (isset($post))
										@if ($post->hasTag($tag->id))
											selected
										@endif
									@endif
								>
									{{ $tag->name }}
								</option>
							@endforeach
						</select>
					</div>

				@endif

				<div class="form-group">
					<button type="submit" class="btn btn-success">
						{{-- Add Post --}}
						{{ isset($post) ? 'Update Post' : 'Add Post' }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{{-- <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}" ></script>
<script src="{{ asset('/dist/js/demo.js') }}" ></script>
<script src="{{ asset('/dist/js/adminlte.min.js') }}" ></script>
<script>
	flatpickr('#pubished_at')
</script> --}}
{{-- <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}" ></script> --}}
{{-- <script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}" ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	flatpickr('#published_at', {
		enableTime: true
		// enableSeconds: true
	})
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
{{-- <link href="{{ asset('/dist/css/adminlte.min.css') }}" rel="stylesheet">
<link href="{{ asset('/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet"> --}}
@endsection
