$(document).ready(function() {

    //Déclaration d'un array vide
    var array  = [];

    //On parcours chaque .hexaNumber puis on le push dans l'array vide
    $(".hexaNumber").each( function( key, value ) {
        array.push( value.innerHTML );
    });

    //Déclaration d'un tableau vide counteur,
    function bea_count( array ) {

        array.sort();

        var current = null;
        var cnt = 0;
        for (var i = 0; i < array.length; i++) {
            if (array[i] != current) {
                current = array[i];
                cnt = 1;
            } else {
                cnt++;
            }
            var res = current.substring(1);
            $('.totalColor-'+res).text(cnt);
        }
    }
    bea_count(array);
});