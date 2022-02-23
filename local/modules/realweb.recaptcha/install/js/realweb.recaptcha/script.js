"use strict";

var Recaptcha = Recaptcha || {};

Recaptcha.reset = function () {
    if (window.grecaptcha) {
        grecaptcha.ready(function () {
            var arToken = document.querySelectorAll('.js-recaptcha-token');
            if (arToken.length > 0) {
                grecaptcha.execute(arToken[0].getAttribute('data-key'), {action: 'bx_form_submit'}).then(function(token) {
                    for (var i = 0; i < arToken.length; i++) {
                        arToken[i].value = token;
                    }
                });
            }
        });
    }
};

document.addEventListener("DOMContentLoaded", () => {
    Recaptcha.reset();
});

if (window.BX) {
    BX.addCustomEvent("onAjaxSuccess", function (data, params) {
        Recaptcha.reset();
    });
}