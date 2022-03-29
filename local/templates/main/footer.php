
</div>

<!-- Footer Section Start -->
<footer class="footer">
    <div class="footer-body">
        <ul class="left-panel list-inline mb-0 p-0">
            <li class="list-inline-item"><a href="/politics/">Политика конфиденциальности</a></li>
            <li class="list-inline-item"><a >Правила пользования</a></li>
        </ul>
        <div class="right-panel">
            &copy; <?=date("Y");?>. Все права защищены

        </div>
    </div>
</footer>
<!-- Footer Section End -->    </main>
<!-- Wrapper End-->
<!-- offcanvas start -->
<? $APPLICATION->IncludeComponent(
    "beehive:cart",
    "cart_block",
    array(
        "COMPONENT_TEMPLATE" => "cart_block",
        "BEE_VIEW_BLOCK_TOP" => "",
        "BEE_VIEW_ICON_COLOR" => "",
        "BEE_VIEW_COUNT_COLOR" => "",
        "BEE_VIEW_BTN_COLOR" => "",
        "BEE_VIEW_POSITION" => "RIGHT"
    ),
    false
);?>


<div class="modal fade" id="modal_otz" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Новый отзыв о ресторане</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div id="success_new_otz" class="success_form">
                    <i class="fa fa-check"></i> Ваше сообщение успешно отправлено.
                </div>
                <div id="error_new_otz" class="error_form">
                    <i class="fa fa-times-circle"></i> <span class="error_main_text"> Произошла ошибка. Попробуйте повторить позже.</span>
                </div>
                <form id="new_otz" method="post">
                    <input type="hidden" name="action" value="Action_formSubmit">
                    <input type="hidden" name="otz_rest" id="otz_rest" value="">

                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Ваше имя</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="Например: Ольга Петровна" name="fio" required>
                    </div>
                    <div class="form-group">

                        <select class="form-select shadow-none" name="rating" required>
                            <option value="" selected>Поставьте оценку</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleFormControlTextarea1">Ваш отзыв</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="pr_text" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded" id="otz_submit">Отправить</button>

                </form>
            </div>

        </div>
    </div>
</div>




</body>
</html>