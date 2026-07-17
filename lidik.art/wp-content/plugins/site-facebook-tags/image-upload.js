jQuery(function($){
    // Set all variables to be used in scope
    var addBtn = $('#image-upload-button');
    var delBtn = $('#image-delete-button');
    var imgHidden = $('#image-hidden-field');
    var img = $('#display-image');

    var customUploader = wp.media({
        title: 'Select an image',
        button: {
            text: 'Use this image'
        },
        multiple: false
    });

    addBtn.on('click', function() {
       customUploader.open();
    });

    customUploader.on('select', function() {
        var attachment = customUploader.state().get('selection').first().toJSON();
        img.attr('src', attachment.url);
        imgHidden.attr('value', attachment.url);
    });

    delBtn.on('click', function () {
        img.attr('src', '');
        imgHidden.attr('value', '');
    });
});