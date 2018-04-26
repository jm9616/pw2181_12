var start = function() {
    var buscar = function() {
        var personaje = $('#txtPersonaje').val();
        var url = 'http://gateway.marvel.com/v1/public/characters?ts=1&apikey=67788e74df746a1523d8ebb504ee1008&hash=cf5ec9bfa5a156f031a69417cd0e012c&nameStartsWith=' + personaje;

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.code == 200 && response.data.results.length > 0) {
                    let d = response.data.results[0];
                    console.log(d);
                    $("#nombre").html(d.name);
                    $("#foto").attr("src", d.thumbnail.path + "." + d.thumbnail.extension);

                    $("#comics").html("Comics: <br>");
                    var comics = d.comics.returned;
                    for (var i = 0; i < comics; i++) {
                        $("#comics").append(d.comics.items[i].name);
                        $("#comics").append('<br>');
                    }

                    $("#series").html("Series: <br>");
                    var series = d.series.returned;
                    for (var i = 0; i < series; i++) {
                        $("#series").append(d.series.items[i].name);
                        $("#series").append('<br>');
                    }


                    $("#historias").html("Historias: <br>");
                    var stories = d.stories.returned;
                    for (var i = 0; i < series; i++) {
                        $("#historias").append(d.stories.items[i].name);
                        $("#historias").append('<br>');
                    }
                }

            }
        });
    }

    var teclaPersonaje = function(tecla) {
        // Enter = 10 + 13
        // Retorno de carro y avance de línea
        if (tecla.which == 13) { // Enter
            buscar();
        }
    }

    $("#btnBuscar").on("click", buscar);
    $("#txtPersonaje").on("keypress", teclaPersonaje);

}

$(document).ready(start);