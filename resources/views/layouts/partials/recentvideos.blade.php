@foreach($mostRecentVideos as $mostRecentVideo)
    <div class="media-object stack-for-small">
        <div class="media-object-section" style="display: table-cell;">
            <div class="recent-img">
                <img src= "{{ URL::asset($mostRecentVideo->video_cover_location) }}" alt="recent">
                <a href="{{ url('/video/' . $mostRecentVideo->video_id) }}"
                   class="hover-posts"><span><i class="fa fa-play"></i></span>
                </a>
            </div>
        </div>
        <div class="media-object-section" style="display: table-cell;">
            <div class="media-content">
                <h6><a href="{{ url('/video/' . $mostRecentVideo->video_id) }}">
                        {{ str_limit($mostRecentVideo->video_title, 30) }}
                    </a></h6>
                <p><i class="fa fa-clock-o"></i><span>
                                                {{ date('j F y', strtotime($mostRecentVideo->created_at)) }}
                                            </span></p>
            </div>
        </div>
    </div>
@endforeach