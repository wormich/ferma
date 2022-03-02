<ul class="list-inline">

<? foreach ($arResult['SECTIONS'] as &$arSection) { ?>

    <li class="py-4 d-flex justify-content-between">

        <span class="fw-bolder heading-title text-dark"><a href="#cat<?=$arSection['ID'];?>"><?=$arSection['NAME'];?></a></span>
        <span class=" badge bg-primary px-3 rounded-pill d-flex align-items-center"><?=$arSection['ELEMENT_CNT'];?></span>

    </li>
<?}?>
</ul>
