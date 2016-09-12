@foreach($mostViewVideos as $mostViewVideo)
    <div class="video-box thumb-border">
        <div class="video-img-thumb">
            <img src="{{ URL::asset($mostViewVideo->video_cover_location) }}"
                 alt="most viewed videos">
            <a href="{{ url('/video/' . $mostViewVideo->video_id) }}" class="hover-posts">
                <span><i class="fa fa-play"></i>Watch Video</span>
            </a>
        </div>
        <div class="video-box-content">
            <h6><a href="{{ url('/video/' . $mostViewVideo->video_id) }}">
                    {{ str_limit($mostViewVideo->video_title, 30) }}</a></h6>
            <p>
                                        <span><i class="fa fa-clock-o"></i>
                                            {{ date('j F y', strtotime($mostViewVideo->created_at)) }}
                                        </span>
                <span><i class="fa fa-eye"></i>{!! kilomega($mostViewVideo->video_views) !!}</span>
            </p>
        </div>
    </div>
@endforeach