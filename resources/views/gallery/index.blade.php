<?php

?>
@extends('layouts.default')
@section('content')

<h1>Your Instagram Photos</h1>

    <div class="row">
        @if(!empty($results))
            @foreach($results as $key => $item)

                <ul style="display: inline;">
                    <li style="display: inline;"><img src="{{ $item['images']['standard_resolution']['url'] }}" style="width:300px;"></li>
                    <li style="display: inline;">{{ isset($item['location']['name']) ? $item['location']['name'] : '' }}</li>
                    {{--<li style="display: inline;">{{ $item['likes']['count'] }}</li>
                    <li style="display: inline;">{{ $item['comments']['count'] }}</li>--}}
                </ul>

            @endforeach
        @else
            <ul>
                <li>There are is no photo.</li>
            </ul>
        @endif
    </div>

    {{--{!! $results->render() !!}--}}
    @include('pagination.default', ['paginator' => $results, 'link_limit' => 5])


            <sma>For different Instagram account click on Gallery menu</sma>

</div>

@stop
