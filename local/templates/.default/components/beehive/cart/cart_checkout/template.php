<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;


?>

<div class="row" >

    <div class="col-12 col-md-8" v-cloak id="BC_C_CART_page">
        <div class="card" v-if="ELEMENTS.length > 0">
            <a class='bc-cart-page-w-delete-all' href='javascript:void(0);' v-if="ELEMENTS.length > 0"
               @click="removeAllItems"><?= Loc::getMessage("BC_C_CART_PAGE_CLEAR_TEXT") ?></a>

            <div class="card-body">
                <h4>Ваш заказ</h4>


<div class="cart_products mt-3 order_cart cart_prod_lg">
                <div class="d-flex justify-content-between align-items-center mt-2" v-for="(item, index) in ELEMENTS">
                    <div class="image_cart" v-if="item.IMAGE.src">

                        <img :src="item.IMAGE.src">

                    </div>
                    <div class="title">{{item.NAME}}&nbsp;<span class="adds">{{item.PARAMS_STR}}</span></div>
                    <div class="weight"><span v-if="item.weight > 0">{{item.weight}} г.</span></div>
                    <div class="quantity"><div class="input-group kol_column">
          <span class="input-group-btn">
              <button type="button" class="btn btn-light btn-number" data-type="minus" :data-field="item.CART_ITEM_ID" @click="changeItemCount(item.CART_ITEM_ID, item.QTY*1-1, $event)">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g id="vuesax_linear_minus" data-name="vuesax/linear/minus" transform="translate(-556 -252)">
    <g id="minus">
      <path id="Vector" d="M0,0H12" transform="translate(562 264)" fill="none" stroke="#959895" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
      <path id="Vector-2" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(556 252)" fill="none" opacity="0"></path>
    </g>
  </g>
</svg>

              </button>
          </span>
                            <input type="text" :name="item.CART_ITEM_ID" class="form-control input-number counter-field"  min="1" max="100"  v-model="item.QTY"
                                   @change="changeItemCount(item.CART_ITEM_ID, item.QTY*1, $event)" >
                            <span class="input-group-btn">
              <button type="button" class="btn btn-primary  btn-number" @click="changeItemCount(item.CART_ITEM_ID, item.QTY*1+1, $event)" data-type="plus" :data-field="item.CART_ITEM_ID">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g id="vuesax_linear_add" data-name="vuesax/linear/add" transform="translate(-492 -252)">
    <g id="add">
      <path id="Vector" d="M0,0H12" transform="translate(498 264)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
      <path id="Vector-2" data-name="Vector" d="M0,12V0" transform="translate(504 258)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
      <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(492 252)" fill="none" opacity="0"></path>
    </g>
  </g>
</svg>

              </button>
          </span>
                        </div></div>
                    <div class="price">{{ item.PRICE }} &#x20bd;</div>
                    <span class="mb-1" @click="removeItemById(item.CART_ITEM_ID, $event)" style="">
                              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M19.6449 9.48924C19.6449 9.55724 19.112 16.298 18.8076 19.1349C18.6169 20.8758 17.4946 21.9318 15.8111 21.9618C14.5176 21.9908 13.2514 22.0008 12.0055 22.0008C10.6829 22.0008 9.38936 21.9908 8.1338 21.9618C6.50672 21.9228 5.38342 20.8458 5.20253 19.1349C4.88936 16.288 4.36613 9.55724 4.35641 9.48924C4.34668 9.28425 4.41281 9.08925 4.54703 8.93126C4.67929 8.78526 4.86991 8.69727 5.07026 8.69727H18.9408C19.1402 8.69727 19.3211 8.78526 19.464 8.93126C19.5973 9.08925 19.6644 9.28425 19.6449 9.48924" fill="#E60A0A"></path>
                              <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="#E60A0A"></path>
                              </svg>
                           </span>

                </div>
</div>






            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 offset-md-12">

        <div class="card">


            <div class="card-body">

                <div class="payment">
                    <h4>Способ оплаты</h4>

                    <div class="d-flex justify-content-between align-items-center mt-2 small_sum">
                        <img src="/local/templates/main/assets/images/card.svg">
                        <span id="current_payment">Картой онлайн</span>

                    </div>


                </div>


                <div class="payment_choose">

                    <h4>Выберите удобный способ оплаты</h4>
                    <div class="d-flex justify-content-between align-items-center mt-2 small_sum">
                        <div class="sp_selector" data-val="Картой онлайн">
                            <img src="assets/images/card.svg">
                            <span>Картой онлайн</span>
                        </div>
                        <div class="sp_selector" data-val="Картой курьеру">
                            <img src="assets/images/card.svg">
                            <span>Картой курьеру</span>
                        </div>
                        <div class="sp_selector" data-val="Наличными курьеру">
                            <img src="assets/images/card.svg">
                            <span>Наличными курьеру</span>
                        </div>
                    </div>

                </div>


                <h4 class="mt-4">Итого</h4>
                <div class="d-flex justify-content-between align-items-center mt-2 small_sum">
                    <span id="st">Стоимость товаров</span>
                    <span id="sum_tov">{{ DATA.TOTAL_SUM}}  &#x20bd;</span>

                </div>
                <div class="d-flex justify-content-between align-items-center mt-2 small_sum">
                    <span id="st">Стоимость доставки</span>
                    <span id="sum_tov">{{DATA.DELIVERY_PRICE}} &#x20bd;</span>

                </div>
<!--
                <div class="d-flex justify-content-between align-items-center mt-2 small_sum">
                    <span id="st">Работа сервиса</span>
                    <span id="sum_tov">30 &#x20bd;</span>

                </div>
    -->
                <div class='bc-cart-w-content-tbl-discount' v-if="DATA.TOTAL_DISCOUNT_SUM != 0">
                    <?= Loc::getMessage("BC_C_CART_PAGE_TOTAL_DISCOUNT_SUM_TEXT") ?>:
                    {{ DATA.TOTAL_DISCOUNT_SUM }} {{DATA.CURRENCY}}
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn btn-primary rounded-pill" >Оформить заказ</button>
                    <span id="sum_order"> {{ DATA.TOTAL_SUM * 1 + DATA.DELIVERY_PRICE}} &#x20bd;</span>


                </div>


            </div>
        </div>

    </div>


</div>


<script>
    new BeeCartAppObject({
        selector: '#BC_C_CART_page',
        type: 'page',
        path: <?=CUtil::PhpToJSObject($this->__component->GetPath() . "/ajax.php")?>
    });
</script>



