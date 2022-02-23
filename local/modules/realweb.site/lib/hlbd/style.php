<?php
namespace Realweb\Site\Hlbd;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class StyleTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_NAME string optional
 * <li> UF_SORT int optional
 * <li> UF_XML_ID string optional
 * <li> UF_LINK string optional
 * <li> UF_DESCRIPTION string optional
 * <li> UF_FULL_DESCRIPTION string optional
 * <li> UF_DEF int optional
 * <li> UF_FILE int optional
 * </ul>
 *
 * @package Bitrix\Hlbd
 **/

class StyleTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_hlbd_style';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('STYLE_ENTITY_ID_FIELD'),
            ),
            'UF_NAME' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_NAME_FIELD'),
            ),
            'UF_SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_SORT_FIELD'),
            ),
            'UF_XML_ID' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_XML_ID_FIELD'),
            ),
            'UF_LINK' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_LINK_FIELD'),
            ),
            'UF_DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_DESCRIPTION_FIELD'),
            ),
            'UF_FULL_DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_FULL_DESCRIPTION_FIELD'),
            ),
            'UF_DEF' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_DEF_FIELD'),
            ),
            'UF_FILE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('STYLE_ENTITY_UF_FILE_FIELD'),
            ),
        );
    }
}