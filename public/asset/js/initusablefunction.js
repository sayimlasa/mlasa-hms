function showToastify(msg, classname, duration = '3000') {
    Toastify({
        newWindow: true,
        text: msg,
        gravity: "top",
        position: "right",
        className: classname,
        stopOnFocus: true,
        duration: duration,
        close: true,
    }).showToast();
}

function triggerSuccess(msg, duration = '3000') {
    showToastify(msg, 'bg-success', duration)
}

function triggerError(msg, duration = '3000') {
    showToastify(msg, 'bg-danger', duration)
}

function triggerWarning(msg, duration = '3000') {
    showToastify(msg, 'bg-warning', duration)
}

function number_input(selector, decimal = 2, groupthousands = true, positiveOnly = true) {
    $(selector).toArray().forEach(function (field) {
        new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: groupthousands ? 'thousand' : 'none',
            numeralDecimalScale: decimal,
            numeralPositiveOnly: positiveOnly
        });
    });
}

function removeCommas(amount) {
    return parseFloat(amount.replace(/,/g, ''));
}
function numberWithCommas(number) {
    let parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function make_random_string(length = 20) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

function initToolTips(selector = '[data-bs-toggle="tooltip"]') {
    let tooltipTriggerList = [].slice.call(document.querySelectorAll(selector))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    });
}

function initSelectAjax(selector, url, placeholder = '', miniInputLength = 2) {
    return $(selector).select2({
        placeholder: placeholder,
        width: '100%', minimumInputLength: miniInputLength,
        ajax: {
            url: url,
            dataType: 'json',
            delay: 250,
            quietMillis: 200,
            data: function (params) {
                return {search: params.term};
            },
            processResults: function (result, page) {
                return {results: result.status === 'success' ? result.data : []};
            }
        }
    });
}
