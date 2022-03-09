@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Film</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-film') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="kategorija_id" class="form-select" required>
                                <option value="">Odaberi kategoriju</option>+
                                @foreach($kategorija as $item)
                                    <option value="{{ $item->id }}">{{ $item->naslov }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">naslov</label>
                        <input type="text" class="form-control" name="naslov" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Opis</label>
                        <textarea name="opis" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Trailer video link</label>
                        <input type="text" class="form-control" name="trailer" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">imdb link</label>
                        <input type="text" class="form-control" name="imdb_link" required>
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">regularna cijena</label>
                        <input type="number" class="form-control" name="regularna_cijena" required>
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">akcijska_cijena</label>
                        <input type="number" class="form-control" name="akcijska_cijena">
                    </div>

                    <div class="col-md-4 mb-3 bg-black">
                        <label for="">kolicina</label>
                        <input type="number" class="form-control" name="kolicina">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">istaknut</label>
                        <input type="checkbox" name="istaknut">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Slika</label>
                        <input type="file" class="form-control" name="slika" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </div>
    </div>
@endsection