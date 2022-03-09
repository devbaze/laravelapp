$(document).ready(function (){
    $('.dodajFilm').click(function (e) { 
        e.preventDefault();
        //unutar film_data diva pronadji film_id i vrati value
        var film_id = $(this).closest('.film_data').find('.film_id').val();
        // ponovi za rok
        var film_rok = $(this).closest('.film_data').find('.broj-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/dodaj-u-korpu',
            data: {
                'film_id': film_id,
                'film_rok': film_rok  
            },
            success: function (response) {
                alert(response.status);
            }
        });
        
    });

    // brojanje
    $('.increment-btn').click(function(e){
        e.preventDefault();
        
        // uzmi value od inputa
        var inc_value = $(this).closest('.film_data').find('.broj-input').val();
        // idemo do broja 10
        var value = parseInt(inc_value, 10);
        // uzmi trenutni value od inputa ako je 0
        value = isNaN(value) ? 0 : value;
        // pocni brojat
        if(value < 10){
            value++;
            $(this).closest('.film_data').find('.broj-input').val(value);
        }

    });

    // oduzimanje
    $('.decrement-btn').click(function(e){
        e.preventDefault();
        
        // uzmi value od inputa
        var dec_value = $(this).closest('.film_data').find('.broj-input').val();
        // idemo do broja 10
        var value = parseInt(dec_value, 10);
        // uzmi trenutni value od inputa ako je 0
        value = isNaN(value) ? 0 : value;
        // pocni brojat
        if(value > 1){
            value--;
            $(this).closest('.film_data').find('.broj-input').val(value);
        }

    });

    $('.obrisi-film').click(function (e) { 
        e.preventDefault();
        var film_id = $(this).closest('.film_data').find('.film_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/obrisi-film',
            data: {
                'film_id': film_id
            },
            success: function (response) {
                swal("Uspešno!", response.status, "Film je uspešno obrisan iz korpe!", "success");
            }
        });
    });
});