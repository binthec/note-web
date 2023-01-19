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
                    1 => ['name' => 'ポイントフレックス'],
                    2 => ['name' => '床での前屈'],
                    3 => ['name' => 'カエル足'],
                    4 => ['name' => 'うつ伏せカエル足'],
                    5 => ['name' => 'カエル足で後ろそり'],
                    6 => ['name' => '左右開脚'],
                    7 => ['name' => '横開脚と側屈'],
                    8 => ['name' => '左右開脚（中ぬき）'],
                    9 => ['name' => '床での前後開脚'],
                    10 => ['name' => '前後開脚から上体のそり'],
                    11 => ['name' => '背中の柔軟（猫の動作）'],
                    12 => ['name' => '上体そり（エビぞり）'],
                    13 => ['name' => '床蛇動'],
                    14 => ['name' => 'ひざ立て上体そり'],
                    15 => ['name' => '座位でのブリッジ'],
                    16 => ['name' => '座位での上体そり'],
                    17 => ['name' => '強い上体そり'],
                    18 => ['name' => '壁やろくぼくを使った前屈と開脚'],
                    19 => ['name' => '段差開脚（前）'],
                    20 => ['name' => '段差開脚（横）'],
                    21 => ['name' => '段差開脚（後ろ）'],
                    22 => ['name' => '床でのバットマン（前）'],
                    23 => ['name' => '床でのバットマン（横）'],
                    24 => ['name' => 'ひざ立てのバットマン（後ろ）①'],
                    25 => ['name' => 'ひざ立てのバットマン（後ろ）②'],
                    26 => ['name' => '床でのバットマン（後ろ）①'],
                    27 => ['name' => '床でのバットマン（後ろ）②']
                ],
                // 小項目 third_cate：座ってする応用動作
                ItemCategoryCode::SITTING_APPLIED_ACTION => [
                    1 => ['name' => '二人組での腹筋'],
                    2 => ['name' => '二人組での背筋'],
                    3 => ['name' => 'ろくぼくでの上体そり'],
                    4 => ['name' => 'ひざ曲げ上体そり'],
                ],
                // 小項目 third_cate：立ってする基本動作
                ItemCategoryCode::STANDING_BASIC_ACTION => [
                    1 => ['name' => 'かかとを上げて立つ（ルルベの基本）'],
                    2 => ['name' => '立っての前屈'],
                    3 => ['name' => 'かかとを上げて前屈'],
                ],
            ],

            // 中項目 second_cote：ステップ
            ItemCategoryCode::STEP => [
                1 => ['name' => 'つま先のばし歩行'],
                2 => ['name' => 'ルルベ歩行'],
                3 => ['name' => 'ランジでの歩行'],
            ],
        ],

        // 大項目：手具
        ItemCategoryCode::APPARATUS => [

            // 中項目
            ItemCategoryCode::BALL => [
                // 小項目
                ItemCategoryCode::BALL_SWING => [
                    1 => ['name' => '水平面での移動（ベルトコンベアー'],
                    2 => ['name' => '上下の移動（エレベーター）'],
                    3 => ['name' => '観覧車'],
                    4 => ['name' => '前後へのふり（ブランコ）'],
                    5 => ['name' => 'まきこみ動作（８の字の導入）'],
                    6 => ['name' => '上半身を使った８の字'],
                    7 => ['name' => '座位での体全体を使った８の字'],
                    8 => ['name' => '手のひら返し'],
                    9 => ['name' => '持ち替え（背面）'],
                    10 => ['name' => '持ち替え（膝の後ろ）'],
                ],
                ItemCategoryCode::BALL_ROLLING => [
                    1 => ['name' => '腕の上での転がし（両手）'],
                    2 => ['name' => '腕の上での転がし（片手）'],
                    3 => ['name' => '腕の上での長い転がし（後方）'],
                ]
            ],

            ItemCategoryCode::RIBBON => [
                ItemCategoryCode::RIBBON_SWING => [
                    1 => ['name' => '前後のふりからまわし'],
                    2 => ['name' => '前後ふりと前からの側面大回旋'],
                    3 => ['name' => '振りからの後ろ持ち替え'],
                ],
                ItemCategoryCode::RIBBON_WAVE => [
                    1 => ['name' => '下から上への波形②'],
                    2 => ['name' => '後ろへの走行を伴う波形'],
                    3 => ['name' => '下から上への波形①'],
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
