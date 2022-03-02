<?php

foreach($arResult['ITEMS'] as $key=>$rest){

    if (!($rest['PREVIEW_PICTURE']['SRC'])||($rest['PREVIEW_PICTURE']['SRC']=='')){
        $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC']='/local/templates/main/images/logo.png';
    }

}
?>