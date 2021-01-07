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
                        <a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink" style="">
                            <div class="dropdown-header">New Category:</div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item btn-dark btn" href="{{ route('categories.create') }}">Create
                                Category</a>

                        </div>
                    </div> --}}
                </div>

            </div>
            <div class="card-body">
                @include('partials.errors')

                {{-- <form action="{{ route('post.store') }}" method="post"
                    enctype="multipart/form-data"> --}}
                    <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($post))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post Title"
                                value="{{ isset($post) ? $post->title : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="5" rows="5"
                                placeholder="Enter post Description">{{ isset($post) ? $post->description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" cols="5" rows="5" placeholder="Enter post Content">{{ isset($post) ? $post->content : '' }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="published_at">Published At</label>
                            <input type="text" class="form-control" id="published_at" placeholder="Publish at..."
                                name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
                            {{-- value="{{ isset($post) ? $post->name : '' }}"
                            --}}


                            {{-- <div class="input-group date" id="reservationdate"
                                data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"
                                    value="{{ isset($post) ? $post->published_at : '' }}">
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
                            <input type="file" class="form-control" id="image" name="image" placeholder="Enter post Name"
                                value="{{ isset($post) ? $post->image : '' }}">
                            {{-- value="{{ isset($post) ? $post->name : '' }}"
                            --}}
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (isset($post))
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
                            <div class="row">
                                @foreach ($tags as $tag)
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <div class="checkbox ">
                                        <label for="">
                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id=""
                                                @if (isset($post))
                                                    @if ($post->hasTag($tag->id))
                                                        checked
                                                    @endif

                                                @endif
                                            >
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                </div>

                            @endforeach
                            </div>
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script id="dsq-count-scr" src="//blogcms-4.disqus.com/count.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })

    </script>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection