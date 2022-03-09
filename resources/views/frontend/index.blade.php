@extends('layouts.pocetna')

@section('title')
    filmovi
@endsection

@section('content')
    @include('layouts.inc.slajder')
    {{-- @include('layouts.inc.filmovislider') --}}
    @include('layouts.inc.filmovicarousel')
    @include('layouts.inc.kategorijecarousel')
@endsection

@section('scripts')
<script>
$('.istaknuti-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection