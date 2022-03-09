@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kategorije</h3>
        </div>
        <div class="card-body">
            @php
            
            @endphp
            aaaaaaaaaaaa
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Kategorije</th>
                    <th>Status</th>
                    <th>Slika</th>
                    <th>Opcije</th>
                </tr>
                </thead>
                <tbody>
                @foreach($filmovi as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->naslov }}</td>
                        <td>
                            {{ $item->kategorija['naslov'] }}
                        </td>
                        <td>
                            @if($item->status == 1)
                                <span class="badge badge-success">Aktivna</span>
                            @else
                                <span class="badge badge-danger">Neaktivna</span>
                            @endif

                        </td>
                        <td><img src="{{ asset('assets/uploads/film/'.$item->slika) }}" alt="{{ $item->naziv }}" width="100"></td>
                        <td>
                            <a href="{{ url('uredi-film/'.$item->id) }}" class="btn btn-primary btn-sm">Uredi</a>
                            <a href="{{ url('obrisi-film/'.$item->id) }}" class="btn btn-danger btn-sm">Obrisi</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
        </div>
    </div>
@endsection