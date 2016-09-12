@foreach($systemTags as $systemTag)
    <a href="{{ url('/video/tag/' . $systemTag) }}">{{ $systemTag }}</a>
@endforeach