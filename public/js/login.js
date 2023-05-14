$('form').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    requestJq('POST', form.attr('action'), form.serialize(), (response) => null);
});
