@php
    use Illuminate\Support\Str;
@endphp

@extends ('layouts.app')

@section('content')
    <div class="container mt-3">

        <h1 class="text-cent mb-3">{{ $project->name }}</h1>
        <div class="card mb-3">
            {{-- <img src="{{ $project['cover_image'] }}" class="card-img-top" alt="...">
            <div class="card-body"> --}}
            @if (Str::startsWith($project->cover_image, 'http'))
                <img src="{{ $project->cover_image }}" class="card-img-top mb-3" alt="{{ $project->name }}">
            @else
                <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top mb-3"
                    alt="{{ $project->name }}">
            @endif
            {{-- <h5 class="card-title">{{$project['name']}}</h5> --}}
            <p>{{ $project->description }}</p>
            {{-- <p class="card-text">{{ $project['creation_date'] }}</p> --}}
            <p class="card-text">
                {{ \Carbon\Carbon::parse($project->creation_date)->format('d/m/Y') }}
            </p>
        </div>

        <div class="col-4">
            <a href="{{ route('project.index') }}" class="btn btn-primary w-100">Vai al catalogo</a>
        </div>
    </div>

    
@endsection
