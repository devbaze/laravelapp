<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <h3 class="py-3">Istaknute kategorije</h3>
                @foreach ($istaknute_kategorije as $kategorija)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                                <a href="{{ url('kategorija/'.$kategorija->slug) }}">
                            <img class="card-img-top" src="{{ asset('assets/uploads/kategorija/'.$kategorija->slika) }}" alt="Card image cap">
                            <div class="card-header">
                                <h4>{{$kategorija->naslov}}</h4>
                            </div>
                                </a>
                            <div class="card-body">
                                <p>{{$kategorija->opis}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>