$('.form_js').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let method = form.find('.hidden').find('[name="_method"]').val();
    requestJq(method, form.attr('action'), form.serialize(), (response) => null);
});

$('.form_js_filter').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let table = $(form.attr('target'));
    let tbody = table.find('.tbody');
    let method = form.find('.hidden').find('[name="_method"]').val();
    
    requestJq(method, form.attr('action'), form.serialize(), (response) => {
        tbody.empty();
        $.each(response.object_response.list_orders, function (key, order) {
            let row = '<tr>';
            row += `<td class='fw-normal app_font_td'>${order.id}</td>`;
            row += `<td class='fw-normal app_font_td'>${order.object_client.name}</td>`;
            row += `<td class='fw-normal app_font_td phone'>${order.object_client.phone}</td>`;
            row += `<td class='fw-normal app_font_td text-center'>${order.lookup_location}</td>`;
            row += `<td class='fw-normal app_font_td'>${order.lookup_address}</td>`;
            row += `<td class='fw-normal app_font_td'>${order.total_fmt}</td>`;
            row += `<td class='fw-normal app_font_td'>${order.created_at_fmt}</td>`;
            row += `<td class='fw-normal app_font_td'>${order.object_channel.name }</td>`;
            row += `<td class='fw-normal app_font_td'>${order.object_status.name}</td>`;
            row += `<td class='fw-normal'><a href="${order.url_edit}" class='btn-sm btn-success'>Visualizar</a></td>`;
            row += '</tr>';
            
            tbody.append(row);
        });
    });
});;
