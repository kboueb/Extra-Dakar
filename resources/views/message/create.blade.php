@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Contactez le vendeur</h3>
        <form action="{{ route('message.store') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" name="seller_id" value=" {{ $seller_id }} ">
                <input type="hidden" name="annonce_id" value=" {{ $annonce_id }} ">
                <input type="hidden" name="buyer_id" value=" {{ Auth()->user()->id }} ">
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Veuillez sasir votre message ici..."></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Envoyer</button>
            </div>
        </form>
    </div>
@endsection