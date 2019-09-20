$(document).ready(function () {
    var titulo = localStorage.getItem('titulo');

    console.log(titulo);

    $('#img').attr('src', '../resources/img/'+titulo+'/'+titulo+'_EDTR.png');
    $('#img').css('height', '531px')
                .css('width', '700px');

    var url = $('#img').attr('src');
    console.log(url);

    $('#link').attr('href', url)
            .attr('download', titulo+'_EDTR.pdf')
            .append('Descargar Imagen');


    $('link[download]').each(function() {
        var $a = $(this),
            fileUrl = $a.attr('href');

        $a.attr('href', 'data:application/octet-stream,' + encodeURIComponent(fileUrl));
    });

});