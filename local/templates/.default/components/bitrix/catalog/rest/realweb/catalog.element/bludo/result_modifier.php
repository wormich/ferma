
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
//Предварительно готовим картинки
if($arResult['PROPERTIES']['GALLERY']['VALUE']){
    $photos = [];
    foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $key => $photoId) {
        $arPhoto = CFile::ResizeImageGet($photoId, ["width" => 230, "height" => 152], BX_RESIZE_IMAGE_EXACT, true, false, false, 100);
        $arPhotoBig = CFile::ResizeImageGet($photoId, ["width" => 800, "height" => 600], BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 100);
        $photos[] = ['SRC'=>$arPhoto['src'], 'SRC_BIG' => $arPhotoBig['src'], 'ALT'=>$arResult['PROPERTIES']['GALLERY']['DESCRIPTION'][$key]];
    }

    //И сохраняем в кеш только нужные данные
    $arResult['GALLARY_PHOTOS'] = $photos;
    $this->__component->SetResultCacheKeys(['GALLARY_PHOTOS']);
}
