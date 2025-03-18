@extends ('layouts.app')

@section('content')

<h1 class="text-center mt-4"> Lista dei progetti</h1>

    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-around m-1 ">
            @foreach ($project as $progetti)
                <div class="card m-3" style="width: 25rem;">
                    <img src="{{ $progetti->cover_image }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$progetti->name}}</h5>
                        <p class="card-text">{{$progetti->description}}</p>
                        <p class="card-text">{{$progetti->creation_date}}</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('project.show', $progetti->id) }}"
                                        class="btn btn-primary w-100">Dettagli</a>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="btn btn-warning w-100">Modifica</a>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="btn btn-danger w-100">Cancella</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
