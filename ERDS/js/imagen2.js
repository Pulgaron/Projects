$(document).ready(function () {
    var titulo = localStorage.getItem('titulo');

    console.log(titulo);

    $('#img').attr('src', '../resources/img/'+titulo+'/'+titulo+'_FTT.bmp');
    $('#img').css('height', '500px')
        .css('width', '780px');

    var url = $('#img').attr('src');
    console.log(url);

    $('#link').attr('href', url)
        .attr('download', titulo+'_FTT.bmp')
        .append('Descargar Imagen');

    $('link[download]').each(function() {
        var $a = $(this),
            fileUrl = $a.attr('href');

        $a.attr('href', 'data:application/octet-stream,' + encodeURIComponent(fileUrl));
    });

});