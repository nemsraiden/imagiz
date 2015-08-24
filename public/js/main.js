$("#images_file").fileinput({
    'language': 'fr',
    'showUpload':true,
    'previewFileType':'any',
    allowedFileTypes: ["image"],
    previewSettings: {
        image: {width: "300px", height: "auto"}
    }

});

$(document).ready(function(){
    if($( ".alert-success" ).length){

        function hideSuccess() {
            $( ".alert-success").slideUp(0500);
        }

        // use setTimeout() to execute
        setTimeout(hideSuccess, 2000)

    }

    /*$('.grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'masonry'
    });*/


    $("#nanoGallery3").nanoGallery({
        itemsBaseURL:'http://imagiz',
        thumbnailHeight:'auto',
        thumbnailWidth:'180',
        thumbnailAlignment:'center',
        thumbnailHoverEffect:'borderDarker'


    });

});


