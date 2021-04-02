@extends('layouts.nav')

@section('content')
    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 mb-4">
        <div class="card text-white bg-dark">
            <div class="card-header bg-dark">
                {{-- <div class="card-title"> --}}
                <div class="float-left">
                    <b>Posts</b>
                </div>
                <div class="float-right">
                    <a class="float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">New Post:</div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item btn-dark btn" href="{{ route('post.create') }}">Create Post</a>

                    </div>
                </div>
                {{-- </div> --}}
            </div>
            <div class="card-body">
                @if ($posts->count() > 0)
                    <table class="table table-dark table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Published At</th>
                                {{-- <th scope="col">Tags</th> --}}
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->id }}.
                                    </td>
                                    <td>
                                        <img src="{{ $post->image }}" style="width: 10rem" height="50%" alt="" srcset="">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $post->category->id) }}"
                                            class=" btn btn-warning btn-sm "
                                            style="font-style: italic; font-family:Arial, Helvetica, sans-serif">
                                            <b>{{ $post->category->name }}</b>
                                        </a>
                                    </td>

                                    <td>
                                        @if ($post->published_at)
                                            <p>{{ $post->published_at }}</p>

                                        @else

                                            <p class="text-danger font-style-italic">Not yet Published.</p>
                                        @endif
                                    </td>
                                    {{-- toFormattedDateString() ->diffForHumans() --}}

                                    @if (!$post->trashed())
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post->id) }}"><i
                                                    class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-info btn-sm"><i
                                                        class="fas fa-trash-restore"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i
                                                    class="{{ !$post->trashed() ? 'fas fa-trash-alt' : 'fas fa-trash' }}"></i>
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

            <div class="card-footer bg-dark">

                <div class="mt-1 float-left">
                    {{ $posts->appends(['search' => request()->query('search')])->links() }}
                </div>

            </div>

            {{-- <div class="card-footer bg-dark">{{ $posts->appends(['search' =>request()->query('search')])->links() }}</div> --}}
        </div>
    </div>
@endsection
