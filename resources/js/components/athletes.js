function updateAthleteMonth (element) {
    let container = element.parents('.month-record');
    let update = element.hasClass('bg-success') ? 0 : 1;
    let record = element.hasClass('paid') ? 'paid' : 'active';
    let url = container.data('url');
    let token = $('#csrf-token').attr('content');
    let month = container.find('.show-month').text();
    let name = element.parents('.athlete-container').find('.athlete-name').text();

    let recordMsg;
    if (element.hasClass('paid')) {
        recordMsg = 'Mесечната такса за ' + month + (element.hasClass('bg-success') ? ' e неплатена?' : ' e платена?')
    } else {
        recordMsg = month + (element.hasClass('bg-success') ? ' месец не е присъствал на тренировки?' : ' месец е присъствал на тренировки?')
    }
    if (container.hasClass('payment-container')) {
        recordMsg = (element.hasClass('bg-success') ? 'Не е заплатил ' : 'Е заплатил ') + container.find('.reason').text() + ' ?';
    }

    new Swal({
        title: name,
        text: recordMsg,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Не',
        confirmButtonText: 'Да'
    }).then((result) => {
        if (result.value) {
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
    });
}
function fillModal (element) {
    let container = element.parents('.month-record');
    let data = JSON.parse($(container).attr('data-payment'));
    let modal = $('#paymentModal');
    modal.attr('data-url', container.attr('data-url'));
    modal.find('.modal-reason').val(data.reason);
    modal.find('.modal-amount').val(data.amount);
}

function hadlePayment () {
    let modal = $('#paymentModal');
    let token = $('#csrf-token').attr('content');
    let url = modal.attr('data-url') ?  modal.attr('data-url') : modal.attr('data-monthURL');
    ajaxData = {
        "_token": token,
        "reason": modal.find('.modal-reason').val(),
        "amount": modal.find('.modal-amount').val()
    }
    if (url.indexOf('update') != -1) {
        ajaxData._method = 'PUT';
    }
    console.log(ajaxData, url);
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
let searchTimeOut;
function search(search) {
    let containers = $('.athlete-container');
    let $search = $(search).val().toLowerCase();
    clearTimeout(searchTimeOut);
    containers.each(function() {
        let container = $(this);
        let name = container.find('.athlete-name').text().toLowerCase();
        if (name.indexOf($search) > -1) {
            container.removeClass('d-none');
        } else {
            container.addClass('d-none');
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

    $("#paymentModal").on('hide.bs.modal', function(){
        location.reload();
    });
    $(document).on('keyup', '#search', function(){
        search($(this));
    })
}
