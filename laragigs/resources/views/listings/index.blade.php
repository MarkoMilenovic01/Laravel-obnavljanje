@extends('layout')

@section('content')
@include("partials._hero")
<main>
    @include("partials._search")
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach($listings as $listing)
            <x-card-content :listing="$listing" />
        @endforeach
    </div>
    <div class="mt-6 px-4">
        {{$listings->links()}}
    </div>
</main>




@endsection