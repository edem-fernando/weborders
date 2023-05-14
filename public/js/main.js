$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
var ajaxResponseBaseTime = 10;
var ajaxResponseRequestError = "<div class='message error icon-warning'>Desculpe mas não foi possível processar sua requisição...</div>";

var createMessage = (typeMessage, text) => {
    return '<div class="message ' + typeMessage + '">' + text + '</div>';
};

$(".ajax_response .message").each(function (e, m) {
    ajaxMessage(m, ajaxResponseBaseTime += 1);
});

$(".ajax_response").on("click", ".message", function (e) {
    $(this).effect("drop").fadeOut(1);
});

// AJAX RESPONSE
var ajaxMessage = (message, time) => {
    var ajaxMsg = $(message);

    ajaxMsg.append("<div class='message_time'></div>");
    ajaxMsg.find(".message_time").animate({"width": "100%"}, time * 1000, function () {
        $(this).parents(".message").fadeOut(200);
    });

    $(".ajax_response").append(ajaxMsg);
    ajaxMsg.effect("bounce");
};


function requestJq(method, action, dataAction, closure) {
    var load = $('.ajax_load');

    $.ajax({
        url: action,
        type: method.toUpperCase(),
        data: dataAction,
        dataType: 'json',
        beforeSend: function () {
            load.fadeIn(200).css('display', 'flex');
        }, success: function (response) {
            load.fadeOut(200).css('display', 'none');
            if (response.object_response.reload) {
                window.location.reload();
                return;
            }

            if (response.object_response.redirect) {
                window.location.href = response.object_response.redirect;
                return;
            }

            closure(response);
        }, error: function (xhrError) {
            load.fadeOut(200).css('display', 'none');

            var message, type = '';
            var response = xhrError.responseJSON;
            if (xhrError.status === 400 || xhrError.status === 404) {
                type = xhrError.status === 400 ? 'warning' : 'info';
                message = response.errors.message;
                ajaxMessage(createMessage(type, message), ajaxResponseBaseTime);
                return;
            }

            type = 'error';
            $.each(response.errors, function (key, value) {
                $.each(value, function (index, text) {
                    ajaxMessage(createMessage(type, text), ajaxResponseBaseTime);
                });
            });
        },
    });
}

function request(data, action, url) {
    return new Promise(function (response) {
        let request = new XMLHttpRequest();
        let json = JSON.stringify(data);
        let csrf = document.querySelector('[name="csrf-token"]');

        request.open(action.toUpperCase(), url);
        request.setRequestHeader('Content-type', 'application/json');
        request.setRequestHeader('X-CSRF-TOKEN', csrf.getAttribute('content'));

        request.onload = () => response(request);
        request.onerror = () => response(request);

        request.onloadstart = () => document.getElementById('ajax_load').style.display = 'flex';
        request.onloadend = () => document.getElementById('ajax_load').style.display = 'none';

        if ((action === 'POST' || action === 'PUT') && data) {
            request.send(json);
        } else {
            request.send();
        }
    });
}
