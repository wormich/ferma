</main>


<aside class="cart_column">
    <div class="cart_inner">
        <span class="cart_title">Корзина</span>

        <div class="cart_products" id="bee_cart">
            <? $APPLICATION->IncludeComponent(
                "beehive:cart",
                "cart_block",
                array(
                    "COMPONENT_TEMPLATE" => "cart_block",
                    "BEE_VIEW_BLOCK_TOP" => "",
                    "BEE_VIEW_ICON_COLOR" => "",
                    "BEE_VIEW_COUNT_COLOR" => "",
                    "BEE_VIEW_BTN_COLOR" => "",
                    "BEE_VIEW_POSITION" => "LEFT"
                ),
                false
            );?>


        </div>



    </div>
</aside>


<!-- Авторизация -->
<div class="modal fade bd-auth" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-fill" data-bs-toggle="pill" href="#pills-auth"
                           role="tab" aria-controls="pills-home" aria-selected="false">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-fill" data-bs-toggle="pill" href="#pills-register"
                           role="tab" aria-controls="pills-profile" aria-selected="false">Регистрация</a>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">






                <div class="tab-content" id="pills-tabContent-1">
                    <div class="tab-pane fade active show" id="pills-auth" role="tabpanel" aria-labelledby="pills-auth">
                        <h4>Вход на сайт</h4>

                        <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", ".default", array(
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "Y",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "FORGOT_PASSWORD_URL" => "",
                            "PROFILE_URL" => "/personal/",
                            "REGISTER_URL" => "",
                            "SHOW_ERRORS" => "Y",
                        ),
                            false
                        ); ?>

                    </div>
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register">
                        <h4>Регистрация</h4>
                        <form method="POST" class="mt-3">
                            <div class="form-label-group">
                                <input type="text"  class="form-control" placeholder="Введите ваш e-mail">
                                <label for="tt2">Ваше имя</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text"  class="form-control" placeholder="Введите ваш e-mail">
                                <label for="tt2">Почта</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password"  class="form-control" placeholder="Введите ваш e-mail"/>
                                <label for="tt2">Пароль</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password"  class="form-control" placeholder="Введите ваш e-mail"/>
                                <label for="tt2">Пароль еще раз</label>
                            </div>
                            <button class="btn btn-primary rounded-pill btn-login">Зарегистрироваться</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<!-- Авторизация -->


<div class="modal fade bd-adds" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Выберите опции</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" id="bludo_adds">


                    </div>
                </div>
            </div>
            <div class="modal-footer product-buy-block">

                <button type="button" class="btn btn-primary rounded add_detail product-buy-link" id="cart_ads">Добавить</button>

                <div class="input-group kol_column">
          <span class="input-group-btn">
              <button type="button" class="btn btn-light btn-number" data-type="minus" data-field="product_count">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g id="vuesax_linear_minus" data-name="vuesax/linear/minus" transform="translate(-556 -252)">
    <g id="minus">
      <path id="Vector" d="M0,0H12" transform="translate(562 264)" fill="none" stroke="#959895" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="1.5"/>
      <path id="Vector-2" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(556 252)" fill="none" opacity="0"/>
    </g>
  </g>
</svg>

              </button>
          </span>
                    <input type="text" name="product_count" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn">
              <button type="button" class="btn btn-primary  btn-number" data-type="plus" data-field="product_count">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g id="vuesax_linear_add" data-name="vuesax/linear/add" transform="translate(-492 -252)">
    <g id="add">
      <path id="Vector" d="M0,0H12" transform="translate(498 264)" fill="none" stroke="#fff" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="1.5"/>
      <path id="Vector-2" data-name="Vector" d="M0,12V0" transform="translate(504 258)" fill="none" stroke="#fff"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(492 252)" fill="none" opacity="0"/>
    </g>
  </g>
</svg>

              </button>
          </span>
                </div>


            </div>
        </div>
    </div>
</div>



<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=f4b39a89-a34b-492c-a741-df699264c8fd"
        type="text/javascript"></script>
<script>
    var myMap;

    // Дождёмся загрузки API и готовности DOM.
    ymaps.ready(init);

    function init() {
        // Создание экземпляра карты и его привязка к контейнеру с
        // заданным id ("map").
        myMap = new ymaps.Map('map', {
            // При инициализации карты обязательно нужно указать
            // её центр и коэффициент масштабирования.
            center: [55.76, 37.64], // Москва
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });


    }
</script>


<div class="modal fade bd-example-modal-lg" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Укажите адрес доставки</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="Введите ваш адрес или выберите точку на карте">
                    <div class="input-group-append">
                        <button class="btn btn-map">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z"
                                      fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="map"></div>
            </div>

        </div>
    </div>
</div>

</body>
</html>