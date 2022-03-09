@extends('layouts.pocetna')

@section('title')
    {{ $kategorija->naslov }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-lg bg-warning">
    <div class="container">
    <h6 class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Početna</a> / <a class="text-white" href="{{url('/kategorije')}}">Kategorije</a> / <a class="text-white" href="{{url('/kategorija/'.$kategorija->slug)}}">{{ $kategorija->naslov }}</a></h6>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h1 class="py-3"> Proizvodi iz kategorije - {{ $kategorija->naslov }} </h1>
            <div class="row">
                @foreach($filmovi as $item)
                    <div class="col-md-4 mb-3">
                        <div class="item">
                            <div class="card">
                                    <a href="{{ url('/kategorija/'.$kategorija->slug.'/'.$item->slug) }}" class="text-decoration-none">
                                <img src="{{ asset('assets/uploads/film/'.$item->slika) }}" class="card-img-top" alt="Fukn">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title">{{ $item->naslov }}</h4>
                                    </a>
                                        <hr>
                                        <span class="float-end">{{ $item->regularna_cijena }}<s>{{ $item->akcijska_cijena }}</s></span>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection