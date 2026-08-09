function getCookie(name) {
    var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    if (match) {
        return match[2];
    }
}

function setCsrfTokenInAllForms(csrfTokenName, csrfCookieName) {
    var cookieVal = getCookie(csrfCookieName);
    if (!cookieVal || cookieVal === 'undefined') return;

    var forms = document.querySelectorAll("form");
    forms.forEach(function (form) {
        var existing = form.querySelector('input[name="' + csrfTokenName + '"]');
        if (existing) {
            existing.value = cookieVal;
        } else {
            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = csrfTokenName;
            csrfInput.value = cookieVal;
            form.appendChild(csrfInput);
        }
    });
}

$(document).ready(function () {
    // Add CSRF token input to each form and ajax requests
    var csrfTokenName = $('meta[name="csrf-token-name"]').attr('content');
    var csrfCookieName = $('meta[name="csrf-cookie-name"]').attr('content');

    setCsrfTokenInAllForms(csrfTokenName, csrfCookieName);

    $.ajaxSetup({
        credentials: "include",
        beforeSend: function (jqXHR, settings) {
            var cookieToken = getCookie(csrfCookieName);

            if (typeof settings.data === 'object' && settings.data !== null) {
                if (cookieToken) {
                    settings.data[csrfTokenName] = cookieToken;
                }
            } else if (typeof settings.data === 'string') {
                if (cookieToken && settings.data.indexOf(csrfTokenName + '=') === -1) {
                    settings.data += (settings.data.length > 0 ? '&' : '') + $.param({
                        [csrfTokenName]: cookieToken
                    });
                }
            }

            return true;
        },
        complete: function () {
            setCsrfTokenInAllForms(csrfTokenName, csrfCookieName);
        }
    });
});

