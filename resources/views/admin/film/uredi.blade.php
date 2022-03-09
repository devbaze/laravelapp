@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Film</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('spremi-film').'/'.$filmovi->id }}" method="POST" enctype="multipart/form-data"> 
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="">Kategorija</label>
                        <select class="form-select">
                            <option value="">{{ $filmovi->kategorija->naslov }}</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Naziv</label>
                        <input type="text" value="{{ $filmovi->naslov }}" class="form-control" name="naslov" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $filmovi->slug }}" class="form-control" name="slug" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Opis</label>
                        <textarea name="opis" rows="3" class="form-control" required>{{ $filmovi->opis }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Trailer video link</label>
                        <input type="text" value="{{ $filmovi->trailer }}" class="form-control" name="trailer" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">imdb link</label>
                        <input type="text" value="{{ $filmovi->imdb_link }}" class="form-control" name="imdb_link" required>
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">regularna cijena</label>
                        <input type="number" value="{{ $filmovi->regularna_cijena }}" class="form-control" name="regularna_cijena" required>
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">akcijska_cijena</label>
                        <input type="number" value="{{ $filmovi->akcijska_cijena }}" class="form-control" name="akcijska_cijena">
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">kolicina</label>
                        <input type="number" value="{{ $filmovi->kolicina }}" class="form-control" name="kolicina">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $filmovi->status == "1" ? 'checked':'' }} name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">istaknut</label>
                        <input type="checkbox" {{ $filmovi->istaknut == "1" ? 'checked':'' }} name="istaknut">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $filmovi->meta_title }}" class="form-control" name="meta_title">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $filmovi->meta_description }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $filmovi->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        @if($filmovi->slika)
                            <img src="{{ asset('assets/uploads/film/'.$filmovi->slika) }}" alt="" width="100">
                        @endif
                        <label for="">slika</label>
                        <input type="file" class="form-control" name="slika">
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </div>
    </div>
@endsection