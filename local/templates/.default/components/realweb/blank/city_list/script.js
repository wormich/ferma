
function submitData(t, e) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/ajax/",
        contentType: false,
        processData: false,
        data: t,
        beforeSend: function () {
            BX.closeWait();
            BX.showWait();
        }
    }).done(function(response) {

        if (response.message) {
            if (response.result === 0) {
                e.find('.js-response').html('<div class="alert alert-danger">' + response.message + '</div>');
            } else {
                e.find('.js-response').html('<div class="alert alert-success">' + response.message + '</div>');
            }
        }

        if (response.reload) {
            location.reload();
        }
        BX.closeWait();





       //Смена города - js

        // console.log('aaa')


        location.reload();
        //t.message && (0 === t.result ? e.find(".js-response").html('<div class="alert alert-danger">' + t.message + "</div>") : e.find(".js-response").html('<div class="alert alert-success">' + t.message + "</div>")), t.reload && location.reload(), BX.closeWait()
    })
}
$(document).on("change",".js-input-submit",function(){$(this).parents("form").submit()})
$(document).on("click",".js-ajax-link",function(t){t.preventDefault();var e,t=$(this),i=JSON.parse($(this).attr("data-data")),n=new FormData;for(e in i)n.append(e,i[e]);return submitData(n,t)})
$(document).on("submit", ".js-submit-form", function(t) {
    t.preventDefault();
    t = $(this);
    return submitData(new FormData(t[0]), t), !1
})