
function updateAthleteMonth (element) {
    var container = element.parents('.month-record');
    var update = element.hasClass('bg-success') ? 0 : 1;
    var record = element.hasClass('paid') ? 'paid' : 'active';
    var url = container.data('url');
    var token = $('#csrf-token').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        dataType: "JSON",
        data: {
            "_method": 'PUT',
            "_token": token,
            "update": update,
            "record": record
        },
        success: function () {
            if (update == 0) {
                element.removeClass('bg-success').addClass('bg-danger');
            } else {
                element.removeClass('bg-danger').addClass('bg-success');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}
function fillModal (element) {
    var container = element.parents('.month-record');
    var data = JSON.parse($(container).attr('data-payment'));
    var modal = $('#paymentModal');
    modal.attr('data-url', container.attr('data-url'));
    modal.find('.modal-reason').val(data.reason);
    modal.find('.modal-amount').val(data.amount);
}

function hadlePayment () {
    var modal = $('#paymentModal');
    var token = $('#csrf-token').attr('content');
    var url = modal.attr('data-url') ?  modal.attr('data-url') : modal.attr('data-monthURL');
    ajaxData = {
        "_token": token,
        "reason": modal.find('.modal-reason').val(),
        "amount": modal.find('.modal-amount').val()
    }
    if (url.indexOf('update') != -1) {
        ajaxData._method = 'PUT';
    }
    console.log(url)
    $.ajax({
        url: url,
        type: 'POST',
        dataType: "JSON",
        data: ajaxData,
        success: function () {
            location.reload();
        },
        error: function (data) {
            console.log(data);
        }
    });
}

module.exports = function () {
    $(document).on('click', '.month-record p', function () {
        if ($(this).hasClass('edit')) {
            fillModal($(this));
        } else if ($(this).hasClass('show-month')) {
            window.location.href = $(this).parents('.month-record').data('url');
        } else {
            updateAthleteMonth($(this));
        }
    });
    $(document).on('click', '#paymentModal .save-changes', function () {
        hadlePayment();
    });
}
