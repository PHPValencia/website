@extends('_layouts.master')

@section('contents')
    @foreach ($events as $event)
        <h3 class="centered past">{{ $page->formattedDate($event->date) }}, {{ $event->start }}</h3>

        <div class="clearfix">
            <section class="content single">
                <h2>{{ $event->title }}</h2>
                {!! $event->getContent() !!}
            </section>
        </div>
    @endforeach
@stop
