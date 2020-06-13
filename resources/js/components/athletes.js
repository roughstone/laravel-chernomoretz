
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
module.exports = function () {
    $(document).on('click', '.month-record .paid, .active', function () {
        updateAthleteMonth($(this));
    });
}
