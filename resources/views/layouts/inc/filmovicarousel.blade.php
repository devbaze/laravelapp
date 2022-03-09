<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="py-3">Istaknuti Filmovi</h3>
        </div>
        <div class="owl-carousel istaknuti-carousel owl-theme">
                @foreach($istaknuti_filmovi as $film)
                    <div class="item">
                        <div class="card">
                            <a href="{{ url('kategorija/'.$film->kategorija->slug.'/'.$film->slug) }}">
                                <img src="{{ asset('assets/uploads/film/'.$film->slika) }}" class="card-img-top" alt="Fukn">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $film->naslov }}</h4>
                                    <hr>
                                    <span class="float-start"><a href="#" class="col btn btn-primary">Iznajmi</a></span>
                                    <span class="float-end">{{ $film->regularna_cijena }}<s>{{ $film->akcijska_cijena }}</s></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
        </div>

    </div>
</div>