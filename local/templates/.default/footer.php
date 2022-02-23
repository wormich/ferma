<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<!-- CLEANTALK template addon -->
<?php $frame = (new \Bitrix\Main\Page\FrameHelper("cleantalk_frame"))->begin(); if(CModule::IncludeModule("cleantalk.antispam")) echo CleantalkAntispam::FormAddon(); $frame->end(); ?>
<!-- /CLEANTALK template addon -->
</body>
</html>