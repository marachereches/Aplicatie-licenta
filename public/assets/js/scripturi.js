$(document).ready(function() {
    $('.img__btn').click(function() {
        $('.cont').toggleClass('s--signup');
    });
});//login
$(document).ready(function () {
    $("#credit").click(function () {
        $("#datecard").show();

    });
});
$(document).ready(function () {
    $("#ramburs").click(function () {
        $("#datecard").hide();
    });

});// checkout
//
$(document).ready(function () {
    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var valoare = $(this).closest('.date_prod').find('.cant').val();
        var val = parseInt(valoare, 10);
        val = isNaN(val) ? 0 : val;
        if (val > 1) {
            val--;
            $(this).closest('.date_prod').find('.cant').val(val);
        }

    });
});
$(document).ready(function () {
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var valoare = $(this).closest('.date_prod').find('.cant').val();
        var val = parseInt(valoare, 10);
        val = isNaN(val) ? 0 : val;
        if (val < 10) {
            val++;
            $(this).closest('.date_prod').find('.cant').val(val);
        }

    });
});//cantitate + -
//
$(document).ready(function () {
    $('.addCos').click(function (e) {
        e.preventDefault();
        var produs_id = $(this).closest('.date_prod').find('.prod_id').val();
        var produs_cant = $(this).closest('.date_prod').find('.cant').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url: "/add-cos",
            data: {
                'produs_id': produs_id,
                'produs_cant': produs_cant,
            },
            success: function (response) {
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
                new Swal("", response.status);
            }
        });
    });

});//adauga  in cos
//
$(document).ready(function () {
    $('.sterge').click(function (e) {
        e.preventDefault();
        var produs_id = $(this).closest('.date_prod').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url: "/sterge-produs",
            data: {
                'produs_id': produs_id,
            },
            success: function (response) {
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
                new Swal("", response.status, "error");

            }
        });
    });
});// sterge prod din cos
//
$(document).ready(function () {
    $('.schimba').click(function (e) {
        e.preventDefault();
        var produs_id = $(this).closest('.date_prod').find('.prod_id').val();
        var produs_cant = $(this).closest('.date_prod').find('.cant').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url: "/actualizeaza-produs",
            data: {
                'produs_id': produs_id,
                'cantitate': produs_cant,
            },
            success: function (response) {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
                new Swal("", response.status, "success");

            }
        });

    });
});// actualizeaza cantitate
//
$(document).ready(function () {
    coss();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
});

function coss() {
    $.ajax({
        method: "GET",
        url: "/nr-cos",
        success: function (response) {
            $('.cp').html('');
            $('.cp').html(response.count);

        }
    });
}//nr produse in cos
//
$(document).ready(function () {
    $('.fav').click(function (e) {
        e.preventDefault();
        var produs_id = $(this).closest('.date_prod').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url: "/fav",
            data: {
                'produs_id': produs_id,
            },
            success: function (response) {
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
                new Swal("", response.status);
                if (response.action == 'adauga') {
                    $('a[data-produsid='+produs_id+']').html('<i  class="fa-solid fa-heart" style="color:#ff1a1a"></i>');
                    $('a[det-produsid='+produs_id+']').html('<button class="btn btn-outline-danger ">Sterge produsul de la favorite</button>');
                    
                }
                else if (response.action == 'sterge') {
                    $('a[data-produsid='+produs_id+']').html('<i  class="fa-regular fa-heart"></i>');
                    $('a[det-produsid='+produs_id+']').html('<button class="btn btn-outline-danger ">Adauga la favorite</button>');

                }

                

            }
        });
    });

});//adauga/sterge fav
//
$(document).ready(function () {
    favv();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
});

function favv() {
    $.ajax({
        method: "GET",
        url: "/nr-favorite",
        success: function (response) {
            $('.fp').html('');
            $('.fp').html(response.count);

        }
    });
}//nr produse in fav
//

