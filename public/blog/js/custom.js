$(function () {
    adjustFooter();

    "use strict";
    
    new WOW().init();

    $(".dropdown").hover(function () {
        $(this).toggleClass('open');
    });

    $('.placeholder').each(function () {
        var input = $(this),
            placeholder = input.attr('placeholder');

        input.attr('data-placeholder', placeholder);
        input.attr('placeholder', '');
        input.val(placeholder);
    }).on('focus', function () {
        var input = $(this),
            placeholder = input.attr('data-placeholder'),
            inputVal = input.val();

        if (inputVal == placeholder) {
            input.val('');
        }
    }).on('focusout', function () {
        var input = $(this),
            placeholder = input.attr('data-placeholder'),
            inputVal = input.val();

        if (inputVal == '') {
            input.val(placeholder);
        }
    });

    // submit form
    $(document).on('click', '.submit-btn', function (e) {
        btn = $(this);

        e.preventDefault();

        form = btn.parents('.form');

        // check if the form inputs values are the same as thier palceholders
        // if so, then we will just make them empty

        form.find('input').each(function () {
            input = $(this);
            placeholder = input.attr('data-placeholder');

            if (! placeholder) return false;

            if (input.val() == placeholder) {
                input.val('');
            }
        });

        url = form.attr('action');

        data = new FormData(form[0]);

        formResults = form.find('#form-results');

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                formResults.removeClass().addClass('alert alert-info').html('Loading...');
            },
            success: function(results) {
                if (results.errors) {
                    formResults.removeClass().addClass('alert alert-danger').html(results.errors);
                } else if (results.success) {
                    formResults.removeClass().addClass('alert alert-success').html(results.success);
                }

                if (results.redirectTo) {
                    window.location.href = results.redirectTo;
                }
            },
            cache: false,
            processData: false,
            contentType: false,
        });
    });
});

function adjustFooter() {
    setFixedFooter();
    $(window).on('resize', function () {
        setFixedFooter();
    });
}

function setFixedFooter() {
    var footer = $('footer');

    var body = $('body');

    if (body.height() < $(window).height()) {
        footer.addClass('fixed-footer');
    } else {
        footer.removeClass('fixed-footer');
    }
}