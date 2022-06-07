<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ferma");
?>
    <style>
        .cart_column {
            display: none;
        }
    </style>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(0 => "NAME", 1 => "PREVIEW_TEXT", 2 => "PREVIEW_PICTURE", 3 => "",),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId('main_slider'),
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(0 => "url", 1 => "",),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                ); ?>


            </div>
            <div class="col-md-12 col-lg-4 mb-5">


                <?php \Realweb\Site\Site::showIncludeText('MAIN_RIGHT'); ?>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "main_cats",
                    array(
                        "VIEW_MODE" => "TEXT",
                        "SHOW_PARENT_NAME" => "Y",
                        "IBLOCK_TYPE" => "",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId('rest'),
                        "SECTION_ID" => 0,
                        "SECTION_CODE" => "",
                        "SECTION_URL" => "",
                        "COUNT_ELEMENTS" => "N",
                        "TOP_DEPTH" => "1",
                        "SECTION_FIELDS" => "",
                        "SECTION_USER_FIELDS" => "",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y"
                    )
                ); ?>
                <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "main_cats_all",
                    array(
                        "VIEW_MODE" => "TEXT",
                        "SHOW_PARENT_NAME" => "Y",
                        "IBLOCK_TYPE" => "",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId('rest'),
                        "SECTION_ID" => 0,
                        "SECTION_CODE" => "",
                        "SECTION_URL" => "",
                        "COUNT_ELEMENTS" => "N",
                        "TOP_DEPTH" => "1",
                        "SECTION_FIELDS" => "",
                        "SECTION_USER_FIELDS" => "",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y"
                    )
                ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?
                $current = \Realweb\Site\Site::getInstance()->getCity()->get('UF_XML_ID');


Global $CF;
$CF=['PROPERTY_REST_CITY'=>$current];
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "popular",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "",
                        ),
                        "FILTER_NAME" => "CF",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "1",
                        "IBLOCK_TYPE" => "catalog",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "6",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "TIME_1",
                            2 => "TIME_2",
                            3 => "REST_MES",
                            4 => "url",
                            5 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N",
                        "COMPONENT_TEMPLATE" => "popular"
                    ),
                    false
                ); ?>
                <?

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "popular_all",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(0 => "NAME", 1 => "PREVIEW_TEXT", 2 => "PREVIEW_PICTURE", 3 => "",),
                        "FILTER_NAME" => "CF",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId('rest'),
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "360",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(0 => "url", 1 => "",),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                ); ?>


            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?
                global $arF;
                $arF = ['ID' => \Realweb\Site\Catalog::get_rest_actions(),'PROPERTY_REST_CITY'=>$current];
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "actions",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "",
                        ),
                        "FILTER_NAME" => "arF",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "1",
                        "IBLOCK_TYPE" => "catalog",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "6",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "TIME_1",
                            2 => "TIME_2",
                            3 => "REST_MES",
                            4 => "url",
                            5 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N",
                        "COMPONENT_TEMPLATE" => "popular"
                    ),
                    false
                ); ?>
                <?

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "actions_all",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(0 => "NAME", 1 => "PREVIEW_TEXT", 2 => "PREVIEW_PICTURE", 3 => "",),
                        "FILTER_NAME" => "arF",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId('rest'),
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "360",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(0 => "url", 1 => "",),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                ); ?>


            </div>
        </div>
        <div class="row dish-card-horizontal mt-2">
            <div class="col-12">

                <?

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "all_rests",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "",
                        ),
                        "FILTER_NAME" => "CF",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => \Realweb\Site\Site::getIblockId("rest"),
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "33",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "RATING",
                            1 => "url",
                            2 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N",
                        "COMPONENT_TEMPLATE" => "all_rests"
                    ),
                    false
                ); ?>


            </div>


        </div>

    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>