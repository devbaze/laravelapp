@extends('layouts.pocetna')

@section('title', $film->naslov)

@section('content')

<div class="py-3 mb-4 shadow-lg bg-warning">
    <div class="container">
        <h6 class="mb-0 text-white">
            <a class="text-white" href="{{url('/')}}">
                Početna
            </a> / 
            <a class="text-white" href="{{url('/kategorije')}}">
                Kategorije
            </a> / 
            <a class="text-white" href="{{url('/kategorija/'.$film->kategorija->slug)}}"> 
                {{ $film->kategorija->naslov }}
            </a> / 
            <a class="text-white" href="{{url('/kategorija/'.$film->kategorija->slug.'/'.$film->slug)}}">
                {{ $film->naslov }}
            </a>
        </h6>
    </div>
</div>



<div class="container">
<div class="card film_data">
    <div class="card-body">
        <div class="row">
            {{-- lijevo pocetak --}}
            <div class="col-md-4 border-right">
                <img src="{{asset('assets/uploads/film/'.$film->slika)}}" class="img-fluid" alt="{{$film->naslov}}">
            </div>
            {{-- kraj lijevo --}}
            
            {{-- desno pocetak --}}
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{ $film->naslov }}
                    @if ($film->istaknut != 0)
                    <label style="font-size:16px;" class="fload-end justify-content-end badge bg-danger istaknuti_tag">Preporuka</label>
                    @endif
                </h2>

                <hr>
                <video width="100%" class="youtube-video" data-yt2html5="{{$film->trailer}}" controls></video>
                <hr>
                <label class="me-3">
                    @if ($film->akcijska_cijena != 0)
                        <label style="font-size:16px;" class="badge bg-warning">Snižena cijena</label>
                        <span class="font-weight-bold">
                            <del>{{$film->regularna_cijena}} KM</del>
                            {{$film->akcijska_cijena}} KM
                        </span>
                    @else 
                        <span class="font-weight-bold">Cijena: {{$film->regularna_cijena}} KM</span>
                        
                    @endif
                    
                </label>

                <p class="mt-3">
                    <span class="font-weight-bold text-uppercase">Opis filma:</span>
                    {{ $film->opis }}
                </p>
                <hr>
                @if($film->kolicina > 0)
                    <label class="badge bg-success">Na stanju</label>
                @else
                    <label class="badge bg-danger">Nema na stanju</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="hidden" value="{{$film->id}}" class="film_id">
                        <label for="Duzina">Duzina</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="duzina" class="form-control broj-input text-center" value="1">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <br/>
                        <button type="button" class="btn btn-primary me-3 dodajFilm float-start" >Iznajmi film <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                </div>

            </div>
            {{-- kraj desno --}}

         
        </div>
    </div>
</div>
</div>
@endsection