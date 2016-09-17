@extends('wpanel.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-6">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{ $videoCount }}</div>
                            <div class="caption"><div>Total videos on site.</div></div>
                        </div>
                    </article>
                </div><!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{ $postCount }}</div>
                            <div class="caption"><div>Total Posts on site.</div></div>
                        </div>
                    </article>
                </div><!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box yellow">
                        <div>
                            <div class="number">{{ $userCount }}</div>
                            <div class="caption"><div>Active Users</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </div><!--.row-->
        </div><!--.col-->
    </div>
@stop