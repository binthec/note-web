<?php

namespace App\Common;

use App\Models\Item;

class ItemData
{
    public static $items = [

        // 大項目 first_cate：徒手
        ItemCategoryCode::EMPTY_HAND => [

            //  中項目 second_cote：基本動作
            ItemCategoryCode::BASIC_ACTION => [

                // 小項目 third_cate：座ってする基本動作
                ItemCategoryCode::SITTING_BASIC_ACTION => [
                    1 => ['name' => 'ポイントフレックス', 'file_path' => '/empty_hand/111_01.svg'],
                    2 => ['name' => '床での前屈', 'file_path' => '/empty_hand/111_02.svg'],
                    3 => ['name' => 'カエル足', 'file_path' => '/empty_hand/111_03.svg'],
                    4 => ['name' => 'うつ伏せカエル足', 'file_path' => '/empty_hand/111_04.svg'],
                    5 => ['name' => 'カエル足で後ろそり', 'file_path' => '/empty_hand/111_05.svg'],
                    6 => ['name' => '左右開脚', 'file_path' => '/empty_hand/111_06.svg'],
                    7 => ['name' => '横開脚と側屈', 'file_path' => '/empty_hand/111_07.svg'],
                    8 => ['name' => '左右開脚（中ぬき）', 'file_path' => '/empty_hand/111_08.svg'],
                    9 => ['name' => '床での前後開脚', 'file_path' => '/empty_hand/111_09.svg'],
                    10 => ['name' => '前後開脚から上体のそり', 'file_path' => '/empty_hand/111_10.svg'],
                ],
                // 小項目 third_cate：座ってする応用動作
                ItemCategoryCode::SITTING_APPLIED_ACTION => [
                    1 => ['name' => '二人組での腹筋', 'file_path' => ''],
                    2 => ['name' => '二人組での背筋', 'file_path' => ''],
                    3 => ['name' => 'ろくぼくでの上体そり', 'file_path' => ''],
                    4 => ['name' => 'ひざ曲げ上体そり', 'file_path' => ''],
                ],
                // 小項目 third_cate：立ってする基本動作
                ItemCategoryCode::STANDING_BASIC_ACTION => [
                    1 => ['name' => 'かかとを上げて立つ（ルルベの基本）', 'file_path' => ''],
                    2 => ['name' => '立っての前屈', 'file_path' => ''],
                    3 => ['name' => 'かかとを上げて前屈', 'file_path' => ''],
                ],
            ],

            // 中項目 second_cote：ステップ
            ItemCategoryCode::STEP => [
                1 => ['name' => 'つま先のばし歩行', 'file_path' => ''],
                2 => ['name' => 'ルルベ歩行', 'file_path' => ''],
                3 => ['name' => 'ランジでの歩行', 'file_path' => ''],
            ],
        ],

        // 大項目：手具
        ItemCategoryCode::APPARATUS => [

            // 中項目
            ItemCategoryCode::BALL => [
                // 小項目
                ItemCategoryCode::BALL_SWING => [
                    1 => ['name' => '水平面での移動（ベルトコンベアー', 'file_path' => ''],
                    2 => ['name' => '上下の移動（エレベーター）', 'file_path' => ''],
                    3 => ['name' => '観覧車', 'file_path' => ''],
                    4 => ['name' => '前後へのふり（ブランコ）', 'file_path' => ''],
                ],
                ItemCategoryCode::BALL_ROLLING => [
                    1 => ['name' => '腕の上での転がし（両手）', 'file_path' => ''],
                    2 => ['name' => '腕の上での転がし（片手）', 'file_path' => ''],
                    3 => ['name' => '腕の上での長い転がし（後方）', 'file_path' => ''],
                ]
            ],

            ItemCategoryCode::RIBBON => [
                ItemCategoryCode::RIBBON_SWING => [
                    1 => ['name' => '前後のふりからまわし', 'file_path' => ''],
                    2 => ['name' => '前後ふりと前からの側面大回旋', 'file_path' => ''],
                    3 => ['name' => '振りからの後ろ持ち替え', 'file_path' => ''],
                ],
                ItemCategoryCode::RIBBON_WAVE => [
                    1 => ['name' => '下から上への波形②', 'file_path' => ''],
                    2 => ['name' => '後ろへの走行を伴う波形', 'file_path' => ''],
                    3 => ['name' => '下から上への波形①', 'file_path' => ''],
                ]
            ]
        ]
    ];

    /**
     * 一時的な処理
     *
     * @return array
     */
    public static function getItems()
    {
        return self::$items;
    }
}
