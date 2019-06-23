@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">

        <h1>New post</h1>
            <form method="POST" action="{{ route('admin.posts.store') }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                    <label for="topic">Topic</label>
                    <input class="form-control @error('topic') is-invalid @enderror" type="text" name="topic" value="{{ old('topic') }}">
                    @error('topic')
                    <div class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Innehåll</label>
                    <textarea class="form-control @error('topic') is-invalid @enderror" name="body">{{ old('body') }}</textarea>
                    @error('topic')
                    <div class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <hr>
            <!-- Tidigare poster -->
            @foreach($posts as $post)
                <div class="media">
                  <div class="media-body">
                    <h4>
                        {{ $post->topic }}
                        @can('delete', $post)
                        <a href="{{ route('admin.posts.destroy', $post) }}">
                            <span style="font-size: 1em; color: Tomato;">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </a>
                        @endcan
                    </h4>
                    <p>{{ $post->body }}</p>
                    <p>
                        {{ $post->user->firstname }},
                        {{ $post->created_at->diffForHumans() }},
                        {{ $post->comment_count }} comments
                    </p>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection