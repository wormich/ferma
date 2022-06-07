<?php


namespace Realweb\Site\Table;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class CityTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_NAME string optional
 * <li> UF_SHORT_NAME string optional
 * <li> UF_CODE string optional
 * <li> UF_SORT int optional
 * </ul>
 *
 * @package Bitrix\City
 **/

class CityTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'realweb_city';
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
                'title' => Loc::getMessage('CITY_ENTITY_ID_FIELD'),
            ),
            'UF_NAME' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_NAME_FIELD'),
            ),
            'UF_SHORT_NAME' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_SHORT_NAME_FIELD'),
            ),
            'UF_CODE' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_CODE_FIELD'),
            ),
            'UF_SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('CITY_ENTITY_UF_SORT_FIELD'),
            ),
            'UF_META' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_META_FIELD'),
            ),
            'UF_SUF' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_SUF_FIELD'),
            ),
            'UF_XML_ID' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CITY_ENTITY_UF_XML_ID'),
            )
        );
    }

    public static function getCollection()
    {
        return self::query()
            ->setSelect(array('*'))
            ->setOrder(array('UF_SORT' => 'ASC', 'UF_NAME' => 'ASC'))
            ->exec()
            ->fetchCollection();
    }
}