$("#images_file").fileinput({
    'language': 'fr',
    'showUpload':true,
    'previewFileType':'any',
    allowedFileTypes: ["image"],
    previewSettings: {
        image: {width: "300px", height: "auto"}
    }

});