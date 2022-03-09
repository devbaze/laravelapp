@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Uredi Kategoriju</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('spremi-kategoriju').'/'.$kategorija->id }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Naslov</label>
                        <input type="text" value="{{ $kategorija->naslov }}" class="form-control" name="naslov" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $kategorija->slug }}" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="opis" rows="3" class="form-control" required>{{ $kategorija->opis }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $kategorija->status == "1" ? 'checked':'' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Istaknuta</label>
                        <input type="checkbox" {{ $kategorija->istaknut == "1" ? 'checked':'' }} name="istaknut">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $kategorija->meta_title }}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $kategorija->meta_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $kategorija->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        @if($kategorija->slika)
                            <img src="{{ asset('assets/uploads/kategorija/'.$kategorija->slika) }}" alt="" width="100">
                        @endif
                        <label for="">Slika</label>
                        <input type="file" class="form-control" name="slika" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </div>
    </div>
@endsection