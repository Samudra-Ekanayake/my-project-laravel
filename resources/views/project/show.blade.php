@extends ('layouts.app')

@section('content')
    <div class="container mt-5">

        <h1 class="text-cent mb-3">{{ $project['name'] }}</h1>
        <div class="card mb-3">
            <img src="{{ $project['cover_image'] }}" class="card-img-top" alt="...">
            <div class="card-body">
                {{-- <h5 class="card-title">{{$project['name']}}</h5> --}}
                <p>{{ $project['description'] }}</p>
                <p class="card-text">{{ $project['creation_date'] }}</p>
            </div>
        </div>

    </div>
@endsection
