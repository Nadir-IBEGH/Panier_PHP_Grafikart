(function ($) {
  // alert('ljffrelhe');
    $('.addPanier').click(function (event) {
        event.preventDefault();        // annuler l'evenment qui y sur le lien
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            dataType : 'json',
            success:function (response) {
                console.log(response.message);
                if(response.error){
                    alert(response.message);
                }
                else {
                    if (confirm(response.message + '. Vous voulez consulter votre panier ?')) {
                         location.href = 'monPanier.php';
                    } else {
                        $('#total').empty().append(response.total);
                        $('#nbProduct').empty().append(response.nbProduct);
                    }
                }
            },
            error:function (response) {
                alert('error'); // c'est un plus
            }


        });
    })
    })(jQuery);


