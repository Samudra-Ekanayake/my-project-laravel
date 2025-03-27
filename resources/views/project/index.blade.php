@extends ('layouts.app')

@section('content')
    <h1 class="text-center mt-4"> Lista dei progetti</h1>

    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-around m-1 ">
            @foreach ($project as $progetti)
                <div class="card m-3 d-flex flex-column justify-content-between" style="width: 25rem; height: 28rem;">

                    @if (Str::startswith($progetti->cover_image, 'http'))
                        <img src="{{ $progetti->cover_image }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ asset('storage/' . $progetti->cover_image) }}" class="card-img-top" alt="...">
                    @endif

                    <div class="card-body d-flex flex-column h-100">
                        <h5 class="card-title">{{ $progetti->name }}</h5>

                        <p class="card-text">
                            {{ \Carbon\Carbon::parse($progetti->creation_date)->format('d/m/Y') }}
                        </p>
                        <div class="mt-auto">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('project.show', $progetti->id) }}"
                                        class="btn btn-primary w-100">Dettagli</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('project.edit', $progetti->id) }}"
                                        class="btn btn-warning w-100">Modifica</a>
                                </div>
                                <div class="col-4">
                                    {{--  <form action="{{ route('project.destroy', $progetti->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE') --}}
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete-{{ $progetti->id }}">Cancella</a>
                                        {{-- </form> --}}
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-delete-{{ $progetti->id }}" tabindex="-1"
                                    aria-labelledby="modal-delete-label-{{ $progetti->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-delete-label-{{ $progetti->id }}">
                                                    Cancella {{ $progetti->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler procedere con l'eliminazione?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('project.destroy', $progetti->id) }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Continua</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
