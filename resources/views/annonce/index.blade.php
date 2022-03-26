@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>  
        @endif

        <form action=" {{ route('annonce.search') }} " onsubmit="search(event)">
            @csrf
            <div class="row">
                <div class="offset-md-9 col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rechercher" id="words">
                    </div>
                </div>
            </div>
            
        </form>
        
        <div class="row">
            @foreach ($annonces as $annonce)
                <div class="col-md-4 my-3">
                    <div class="card">
                        <img class="card-img-top" src="https://via.placeholder.com/150x100" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"> {{ $annonce->title }} </h5>
                            <p class="card-text text-center"> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }} </p>
                            <p class="card-text text-center text-info"> {{ $annonce->localisation }} </p>
                            <p class="card-text text-center"> {{ $annonce->description }} </p>
                            <p class="card-text text-center"> {{ $annonce->price }} FCFA</p>
                        </div>
                        </div>
                </div>
            @endforeach
        </div>
        {{ $annonces->links()}}
    </div>
@endsection


@section('extra-js')
    <script>
        function search(event) {
            event.preventDefault()
        }
    </script>
@endsection