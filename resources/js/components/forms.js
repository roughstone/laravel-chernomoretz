function readURL(element) {
    var reader = new FileReader();
    var image = element.parents('.custom-image-upload-container').find('img');
    var input = element.parents('.custom-image-upload-container').find('#image-input');

    if (element[0].files.length > 0) {
        reader.onload = function (e) {
            image.fadeIn(500);
            image.attr('src', e.target.result);
            input.val(e.target.result)
        }
        reader.readAsDataURL(element[0].files[0]);
    }
}

module.exports = function () {
    // Function call events
    /* $('body').on('click', '.custom-image-upload-container .btn-danger', function() {
        fileDelete($(this))
    }); */

    $('body').on('change', '.custom-file-input', function() {
        readURL($(this))
    });

    /* $('body').on('click', '.custom-select-select, .custom-select-option', function() {
        initCustomSelect($(this))
    }); */

    // Direct dom manipulation
    $('body').on('click', '.custom-image-upload-container img', function() {
        $(this).parents('.custom-image-upload-container').find('.custom-file-input').trigger('click')
    });

    /* $('body').on('mouseleave', '.custom-select-form' , function() {
        $('.custom-select-options').addClass('d-none')
    }); */
}
