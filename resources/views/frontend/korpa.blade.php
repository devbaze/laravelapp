@extends('layouts.pocetna')

@section('title')
    Moja korpa
@endsection

@section('content')
<div class="py-3 mb-4 shadow-lg bg-warning">
    <div class="container">
        <h6 class="mb-0 text-white">
            <a class="text-white" href="{{url('/')}}">
                Početna
            </a> / 
            <a class="text-white" href="{{url('/korpa')}}">
                Korpa
            </a>
        </h6>
    </div>
</div>


<div class="container my-5">
    <div class="card shadow ">
        <div class="card-body">
            @foreach ($korpafilmovi as $item)
            <div class="row film_data">
                <div class="my-4 row">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/film/'.$item->filmovi->slika) }}" alt="{{ $item->filmovi->naslov }}" width="70px" >
                    </div>
                    <div class="col-md-5">
                        <h3>{{ $item->filmovi->naslov }}</h3>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="film_id" value="{{ $item->film_id }}">
                        <label for="Duzina">Duzina</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="duzina" class="form-control broj-input text-center" value="{{ $item->film_id }}">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger obrisi-film"><i class="fa fa-trash"></i> Obrisi</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection