@extends('layouts.pocetna')

@section('title')
    Kategorije
@endsection

@section('content')
<div class="py-3 mb-4 shadow-lg bg-warning">
    <div class="container">
    <h6 class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Početna</a> / <a class="text-white" href="{{url('/kategorije')}}">Kategorije</a></h6>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h1 class="py-3"> Kategorije </h1>
            <div class="row">
                    @foreach ($kategorije as $kat)
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('kategorija/'.$kat->slug) }}" class="text-decoration-none">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('assets/uploads/kategorija/'.$kat->slika) }}" alt="Card image cap">
                                    <div class="card-header">
                                        <h3>{{$kat->naslov}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$kat->opis}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection