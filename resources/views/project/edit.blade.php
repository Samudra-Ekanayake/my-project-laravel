@extends ('layouts.app')

@section('content')
    <div class="container mt-5">

        <h1>Modifica: {{ $project['name'] }}</h1>

        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @method('Put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required
                    value="{{ $project->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" class="form-control" id="description" name="description" required
                    value="{{ $project->description }}">
            </div>
            <div class="mb-3">
                <label for="creation_date" class="form-label">Data di creazione</label>
                <input type="date" class="form-control" id="creation_date" aria-describedby="emailHelp"
                    name="creation_date" required value="{{ $project->creation_date }}">
                @error('creation_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="cover_image" class="form-label">Inserisci immagine</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" required value="{{$project->cover_image}}">
            </div> --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Modifica Immagine</label>
                <input class="form-control" type="file" id="cover_image" name="cover_image">
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection
