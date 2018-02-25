var URL = 'http://estudar.pc/';

$(function() {
    $('.pomodoros-estudados input').bind('click', function() {

        var id = $(this).attr('id').split('-')[1];
        var id_materia = $(this).attr('data-materia');


        //desmarca todos radios
        var radios = $('.pomodoros-estudados input');
        //radios.attr('checked', false);
        radios.prop('checked', false);
        //marca até o ultimo radio selecionado
        for(var i = 0; i<id; i++) {
            radios.eq(i).prop('checked', true);

        }

        $.ajax({
            method: 'POST',
            data: {id_materia: id_materia, pomodoro : id},
            url: URL+'estudar.php'

            /*
            success() {

            }
            */
        });

    });

    $('.arrow img').bind('click', function() {
        var proxima = $(this).attr('data-proxima');

        $.ajax({
            method: 'POST',
            data: {proxima_materia: proxima},
            url: URL+'estudar.php',

            success() {
                window.location.reload();
            }

        });

    });

    var old = '';
    $('.materia-list .topico').hover(function() {
        old = $(this).html();
        //pega dados e converte em json
        var data = $(this).attr('data-links');
        if(data) {
            data = JSON.parse(data);

            //gera links
            var links = '';
            $.each(data, function(key, value) {
              links += '<a class="topico-link" target="_blank" href="'+value+'">'+key+'</a>';
            });
            console.log(links);
            $(this).html(links);
        }
        //console.log(data.youtube);
    }, function() {
        $(this).html(old);
    });

    $('.materia-list .topico').bind('click', function() {
        var pomodoro = '<div id="pomodoro" > <iframe id="pomodoro-iframe" src="http://tomato-timer.com"></iframe> </div>';
        $('.materia-topicos').html(pomodoro);
    });

    $('#btn-add-topico').bind('click', function(e) {
        e.preventDefault();
        $('.topicos').append('<tr class="topico"><td class="topico-nome"><input type="text" name="nome_topico[]" value="Topico"/></td><td class="topico-links"><input type="text" name="links[]" value=\'{"link" : "http://sitequalquer.com"}\'/><a class="btn-remove-topico" href="#">Remover</a></td></tr>');

        $('.btn-remove-topico').bind('click', function(e) {
            e.preventDefault();
            //remover
            $(this).closest('.topico').remove();
            
        });
    });

    $('.btn-remove-topico').bind('click', function(e) {
        e.preventDefault();
        //remover
        $(this).closest('.topico').remove();
        
    });
});
