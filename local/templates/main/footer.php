
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

</body>
</html>