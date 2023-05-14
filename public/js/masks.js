var maskPhone = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(maskPhone.apply({}, arguments), options);
        }
    };

// MASK
$("input[name='phone']").mask(maskPhone, options);
$(".phone").mask(maskPhone, options);

$("input[name='doc']").mask('000.000.000-00');
$(".docClient").mask("000.000.000-00");
$(".docCompany").mask("00.000.000/0000-00");

$(".zipCode").mask("00.000-000");

$('.money').mask('000.000.000.000.000,00', {reverse: true});
$('.money2').mask("#.##0,00", {reverse: true});
$('.number').mask("00000000000000000000");

$('.date_hour').mask('00/00/0000 00:00:00');
$('.date').mask('00/00/0000');
$('.weight').mask('#0.000', {reverse: true});

var optionsDoc = {
    onKeyPress: function (doc, ev, el, op) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        $('input[name="document"]').mask((doc.length > 14) ? masks[1] : masks[0], op);
    }
};

// MASK
$('.desc').mask('00,00%', {reverse: true});

$('input[name="document"]').length > 11 ? $('input[name="document"]').mask('00.000.000/0000-00', optionsDoc) : $('input[name="document"]').mask('000.000.00-00#', optionsDoc);
