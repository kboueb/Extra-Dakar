@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Créer une annonce</h3>
        <hr>
        <form method="POST" action="{{ route('annonce.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " name="title" id="" placeholder="Titre de l'annonce">
                @if ($errors->has('title'))
                    <span class="invalid-feedback"> Le titre est requis</span>
                @endif
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description"></textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback"> La description est requise</span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}" id="localisation" name="localisation" placeholder="Localisation">
                @if ($errors->has('localisation'))
                    <span class="invalid-feedback"> La locallisation est requise</span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="Prix">
                @if ($errors->has('price'))
                    <span class="invalid-feedback"> Le prix est requis</span>
                @endif
            </div>

            @guest
                <h3>Vos informations</h3>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Votre nom">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback"> Le nom est requis</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Votre email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback"> L'email est requis</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" placeholder="Votre mot de passe">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback"> Le mot de passe est requis</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="Confirmer votre mot de passe">
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback"> Le mot de passe est requis</span>
                    @endif
                </div>
            @endguest

            <button type="submit" class="btn btn-success">Créer l'annonce</button>
        </form>
    </div>
@endsection