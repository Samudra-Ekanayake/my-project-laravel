@extends ('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-around m-1 ">
            @foreach ($project as $progetti)
                <div class="card m-3" style="width: 25rem;">
                    <img src="https://image.discovery.indazn.com/ca/v2/ca/image?id=ec9e0c88-2609-4083-934b-3142632043bd&quality=70"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('project.show', $progetti->id) }}"
                                        class="btn btn-primary w-100">Mostra</a>
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
