@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3 style="display: inline-block">
                        <i class="font-icon font-icon-editor-video"></i> Videos
                    </h3>
                    <a href="{{ route('video.create') }}" class="label-success label">
                        <i class="fa fa-plus-circle"></i> Add New</a>
                </div>
            </div>
        </div>
    </header>

    <div class="cards-grid col-md-12">
        @if(!$videos)
            <h2 class="novideofound">There are currently no Videos</h2>
        @else
            @foreach($videos as $video)
            <div class="card-grid-col col-md-4">
                <article class="card-typical">
                    <div class="card-typical-section card-typical-content">
                        <div class="photo">
                            <img src="{{ URL::asset($video->video_cover_location) }}" alt="{{ $video->video_title }}" />
                        </div>
                        <header class="title">
                            <a href="{{ route('video.edit', $video->video_id) }}"> {{ str_limit($video->video_title, 25) }}</a>
                        </header>
                        <p>{{ str_limit($video->video_desc, 100) }}</p>
                    </div>
                    <div class="card-typical-section">
                        <div class="card-typical-linked">Added By <a href="#">{{ str_limit($video->user->name, 12) }}</a></div>
                        <a href="{{ route('video.delete', $video->video_id) }}" class="card-typical-likes"
                           onclick="return confirm('Are you sure,you want to delete this video')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                        <a href="{{ route('video.edit', $video->video_id) }}" class="card-typical-likes">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        @endif

    </div>
@stop
@section('footer')
    <script type="text/javascript">
        $(function() {
            @if(session()->has('info'))
                $.notify({
                icon: 'font-icon font-icon-check-circle',
                message: '{{ session()->get('info') }}'
            },{
                type: 'success'
            });
            @endif
        });
    </script>
@stop