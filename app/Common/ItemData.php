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
                    5 => ['name' => '側筋'],
                    6 => ['name' => '二人組での側筋'],
                    7 => ['name' => '開脚腹筋'],
                    8 => ['name' => '腹筋'],
                    9 => ['name' => '背倒立を通過する腹筋'],
                    10 => ['name' => 'アチチュード背筋'],
                    11 => ['name' => 'ボールを使った背筋'],
                    12 => ['name' => '二人組で、ボールを使った背筋'],
                    13 => ['name' => '長座姿勢からの横転'],
                ],
                // 小項目 third_cate：立ってする基本動作
                ItemCategoryCode::STANDING_BASIC_ACTION => [
                    1 => ['name' => 'かかとを上げて立つ（ルルベの基本）'],
                    2 => ['name' => '立っての前屈'],
                    3 => ['name' => 'かかとを上げて前屈'],
                    4 => ['name' => '強い前屈'],
                    5 => ['name' => '下からのブリッジ'],
                    6 => ['name' => '上からのブリッジ'],
                    7 => ['name' => '強いブリッジ'],
                    8 => ['name' => 'ブリッジからのローリング'],
                    9 => ['name' => '脱力'],
                    10 => ['name' => '前後波動'],
                    11 => ['name' => '横波動'],
                    12 => ['name' => '甲立ち'],
                    13 => ['name' => 'バーでのバットマン（前）'],
                    14 => ['name' => 'バーでのバットマン（横）'],
                    15 => ['name' => 'バーでのバットマン（後ろ）'],
                    16 => ['name' => 'バーでのバットマン（後ろひざ曲げ）'],
                    17 => ['name' => '直立からのバットマン'],
                ],
            ],

            // 中項目 second_cote：ステップ
            ItemCategoryCode::STEP => [
                1 => ['name' => 'つま先のばし歩行'],
                2 => ['name' => 'ルルベ歩行'],
                3 => ['name' => 'ランジでの歩行'],
                4 => ['name' => 'ひざを高く上げる歩行'],
                5 => ['name' => '波状ステップ'],
                6 => ['name' => 'ギャロップ'],
                7 => ['name' => 'スキップ'],
                8 => ['name' => 'シャッセ'],
                9 => ['name' => 'ワルツステップ'],
                10 => ['name' => '長座歩き'],
            ],

            // 中項目 : アクロ
            ItemCategoryCode::ACROBAT => [
                1 => ['name' => '前転'],
                2 => ['name' => '後転'],
                3 => ['name' => '側転'],
                4 => ['name' => '倒立'],
                5 => ['name' => 'ブリッジ歩き（前）'],
                6 => ['name' => 'ブリッジ歩き（後ろ）'],
                7 => ['name' => '倒立ブリッジ'],
                8 => ['name' => '前方転回'],
                9 => ['name' => '後方転回'],
                10 => ['name' => '胸回転①'],
                11 => ['name' => '胸回転②'],
                12 => ['name' => '胸支持横転'],
                13 => ['name' => '跳ね起き'],
            ],

            // 中項目 : ジャンプ
            ItemCategoryCode::JUMP => [
                1 => ['name' => '垂直ジャンプ'],
                2 => ['name' => 'ねこ跳び'],
                3 => ['name' => 'シザー（足曲げ）'],
                4 => ['name' => 'ひきつけジャンプ'],
                5 => ['name' => '大の字ジャンプ'],
                6 => ['name' => 'パッセジャンプ'],
                7 => ['name' => 'カプリオール（前）'],
                8 => ['name' => 'カプリオール（横）'],
                9 => ['name' => 'カプリオール（後ろ）'],
                10 => ['name' => 'しか'],
                11 => ['name' => 'しかリング'],
                12 => ['name' => '前後開脚'],
                13 => ['name' => '開脚リング'],
                14 => ['name' => '片足リング'],
                15 => ['name' => '両足リング'],
                16 => ['name' => '横開脚'],
                17 => ['name' => 'コサック'],
                18 => ['name' => '足上げコサック'],
                19 => ['name' => '水平前のばし'],
                20 => ['name' => '水平横のばし'],
                21 => ['name' => 'アラベスク'],
                22 => ['name' => '切り替え開脚（曲げ足から）'],
                23 => ['name' => '切り替え開脚（伸脚で）'],
                24 => ['name' => '回転を伴った大開脚'],
                25 => ['name' => 'シザー（前）'],
                26 => ['name' => 'シザー（後ろ）'],
                27 => ['name' => 'フェッテ'],
            ],

            // 中項目 : バランス
            ItemCategoryCode::BALANCE => [
                1 => ['name' => 'ルルベ'],
                2 => ['name' => 'パッセバランス'],
                3 => ['name' => '水平前伸ばし'],
                4 => ['name' => '水平横伸ばし'],
                5 => ['name' => 'アラベスク'],
                6 => ['name' => 'アチチュード'],
                7 => ['name' => '前支持'],
                8 => ['name' => '横支持'],
                9 => ['name' => '後ろ支持（ひざ曲げ）'],
                10 => ['name' => '後ろ支持（ひざのばし）'],
                11 => ['name' => 'コサックバランス'],
                12 => ['name' => 'コサックバランス（足上げ）'],
                13 => ['name' => '前屈バランス'],
                14 => ['name' => '後屈バランス'],
                15 => ['name' => '90度水平バランス（前）'],
                16 => ['name' => '90度水平バランス（横）'],
                17 => ['name' => '90度水平バランス（後ろ）'],
                18 => ['name' => '180度水平バランス（横）'],
                19 => ['name' => '180度水平バランス（後ろ）'],
                20 => ['name' => '支持なし前バランス'],
                21 => ['name' => '支持なし横バランス'],
                22 => ['name' => '胸支持バランス'],
                23 => ['name' => 'ダイナミックなバランス（後ろから）'],
                24 => ['name' => 'ダイナミックなバランス（前から）'],
                25 => ['name' => '高さを変えるコサックバランス'],
            ],

            // 中項目 : ローテーション
            ItemCategoryCode::ROTATION => [
                1 => ['name' => '基本のターン'],
                2 => ['name' => 'パッセターン'],
                3 => ['name' => 'アチチュードターン'],
                4 => ['name' => '前屈ターン'],
                5 => ['name' => '後屈ターン'],
                6 => ['name' => '水平前伸ばしターン'],
                7 => ['name' => '水平横伸ばしターン'],
                8 => ['name' => '水平前ひざ曲げターン'],
                9 => ['name' => 'アラベスクターン'],
                10 => ['name' => '足持ちターン（前）'],
                11 => ['name' => '足持ちターン（横）'],
                12 => ['name' => '足持ちターン（後ろ）'],
                13 => ['name' => '足持ちターン（後ろひざ曲げ）'],
                14 => ['name' => 'コサックターン'],
                15 => ['name' => '前屈コサックターン'],
                16 => ['name' => 'フェッテ'],
                17 => ['name' => 'イニュージョン'],
                18 => ['name' => '床での開脚回転'],
                19 => ['name' => '床での開脚回転（後屈）'],
                20 => ['name' => 'トーノー'],
                21 => ['name' => 'ピポットの組み合わせ'],
            ]
        ],

        // 大項目：手具
        ItemCategoryCode::APPARATUS => [

            // 中項目 : ロープ
            ItemCategoryCode::ROPE => [
                // 小項目 : ふり・回し・８の字
                ItemCategoryCode::ROPE_SWING => [
                    1 => ['name' => 'またぎごし'],
                    2 => ['name' => '左右のふり'],
                    3 => ['name' => 'ステップでの左右のふり'],
                    4 => ['name' => '体の横での前後のふり'],
                    5 => ['name' => '前回し'],
                    6 => ['name' => '体の横での８の字'],
                    7 => ['name' => 'ルルベ歩きを伴う体の横での８の字'],
                    8 => ['name' => 'シャッセを伴う体の横での８の字'],
                    9 => ['name' => '体の横の８の字からの方向転換'],
                    10 => ['name' => '頭上の水平面での回し（直立）'],
                    11 => ['name' => '頭上の水平面での回し（しゃがみこみ）'],
                    12 => ['name' => 'ルルベ歩きを伴う頭上の水平面での回し'],
                    13 => ['name' => '２つ折り、体の前後で回す'],
                    14 => ['name' => '片手で連続した８の字（体の前後）'],
                    15 => ['name' => '前で回す＋足の下での持ち替え'],
                    16 => ['name' => '片手で連続した８の字（体の左右）'],
                    17 => ['name' => '体の横での回し'],
                    18 => ['name' => 'ルルベ歩きを伴う８の字'],
                    19 => ['name' => 'ルルベ歩きを伴う水平面の片手回し'],
                    20 => ['name' => 'ピルエットを伴う水平面での回し'],
                    21 => ['name' => '水平回しからの前転'],
                    22 => ['name' => '水平面での８の字（体の上下）'],
                    23 => ['name' => 'ルルベ歩行中の足交差回転を伴う回し'],
                    24 => ['name' => '１本操作での風車'],
                    25 => ['name' => '１本持ち水平回し'],
                    26 => ['name' => '一本操作での振り上げ'],
                    27 => ['name' => '一本操作での振り上げからのもぐりターン'],
                ],
                // 小項目 : 縄跳び
                ItemCategoryCode::ROPE_JUMP => [
                    1 => ['name' => '垂直跳び'],
                    2 => ['name' => '駆け足飛び'],
                    3 => ['name' => '１跳躍３ステップ'],
                    4 => ['name' => 'ギャロップ'],
                    5 => ['name' => 'けんけん'],
                    6 => ['name' => '二重跳び'],
                    7 => ['name' => 'あやとび'],
                    8 => ['name' => 'はやぶさ'],
                    9 => ['name' => '開脚ジャンプ'],
                ],
                // 小項目 : エシャッペ
                ItemCategoryCode::ROPE_ECHAPPE => [
                    1 => ['name' => '水平回しからのエシャッペ'],
                    2 => ['name' => 'たて回しからのエシャッペ'],
                    3 => ['name' => 'エシャッペ（上下）'],
                    4 => ['name' => '体前での縦回しからのエシャッペ'],
                    5 => ['name' => 'バランス中のエシャッペ'],
                    6 => ['name' => 'バランス中のエシャッペ'],
                    7 => ['name' => 'コサックバランス中のエシャッペ'],
                ],
                // 小項目 : なげ・うけ
                ItemCategoryCode::ROPE_BALL_THROW_CATCH => [
                    1 => ['name' => '８の字からの投げ'],
                    2 => ['name' => 'くくり投げ'],
                    3 => ['name' => '１本投げ'],
                    4 => ['name' => '受けからのフルターン'],
                    5 => ['name' => '大きく投げ回転してうける'],
                ],
            ],

            // 中項目 : フープ
            ItemCategoryCode::HOOP => [
                // 小項目 : ふり・回し・８の字
                ItemCategoryCode::HOOP_SWING => [
                    1 => ['name' => '側面での振り'],
                    2 => ['name' => '体の前での振り'],
                    3 => ['name' => '水平面での振り'],
                    4 => ['name' => '体の前での回し'],
                    5 => ['name' => '背面での振り'],
                    6 => ['name' => '水平面での回し'],
                    7 => ['name' => '胴とひざの位置での水平面での回し'],
                    8 => ['name' => 'ルルベ歩行での胴とひざの位置での水平面での回し'],
                    9 => ['name' => '移動中の水平面の持ち替え'],
                    10 => ['name' => '足の下での持ち替え'],
                    11 => ['name' => '側面での８の字'],
                    12 => ['name' => 'ルルベ歩行中の側面での８の字'],
                    13 => ['name' => '体の前後での８の字'],
                    14 => ['name' => 'シャッセ中の前後の８の字'],
                    15 => ['name' => '体の回旋を伴う８の字'],
                    16 => ['name' => '体の回旋を伴う８の字（回転）'],
                    17 => ['name' => '体の前でのひねり'],
                    18 => ['name' => '頭上でのひねり'],
                    19 => ['name' => 'ひねり回し'],
                    20 => ['name' => '床上のひねり回し'],
                    21 => ['name' => '床上のひねり回し（足上げ）'],
                    22 => ['name' => 'バランス中のひねり回し'],
                    23 => ['name' => 'ひねり回し中の足交差回転'],
                    24 => ['name' => 'ひねり回し中のランニング'],
                    25 => ['name' => '両手でフープを回す（基本）'],
                    26 => ['name' => 'シャッセ中の両手回し'],
                    27 => ['name' => '両手でフープを回す（体の横）'],
                    28 => ['name' => '両手でフープを回す（頭上）'],
                    29 => ['name' => '両手回し中の足交差回転'],
                    30 => ['name' => '持ち替えを伴う前回し'],
                    31 => ['name' => '寄せ足ステップを伴う片手での回し'],
                    32 => ['name' => 'シャッセ中の片手での回し（体の前）'],
                    33 => ['name' => '片手での回し（体の横）'],
                    34 => ['name' => 'ルルベ歩き中の片手回し'],
                    35 => ['name' => 'シャッセ中の片手での回し'],
                    36 => ['name' => '片手回し（頭上）'],
                    37 => ['name' => '胴の周りでの回し（基本）'],
                    38 => ['name' => 'ピポット中の胴の周りでの回し'],
                    39 => ['name' =>'歩行中の胴の周りでの回し'],
                    40 => ['name' => '肘回し'],
                    41 => ['name' => '振りから腕に乗せての持ち替え'],
                    42 => ['name' => '足回し'],
                    43 => ['name' => 'アチチュードターンでの振りと回し'],
                    44 => ['name' => '前回し中のバランス'],
                ],
                // 小項目 : 転がし
                ItemCategoryCode::HOOP_ROLLING => [
                    1 => ['name' => '体の前後での床ころがし'],
                    2 => ['name' => '前後への床ころがし'],
                    3 => ['name' => 'フープの転がし、くぐり'],
                    4 => ['name' => '二人組でフープの転がし、くぐり'],
                    5 => ['name' => '背中の上を転がす'],
                    6 => ['name' => '引き戻し'],
                    7 => ['name' => '引き戻しからのジャンプ'],
                    8 => ['name' => '腕上での長い転がし（回しから入る）'],
                    9 => ['name' => '腕上での長い転がし（振りから入る）'],
                    10 => ['name' => '後方への転がしからのジャンプ'],
                    11 => ['name' => 'フープをくぐる（前・後）'],
                    12 => ['name' => 'フープをくぐる（横から）'],
                    13 => ['name' => 'その場跳び'],
                    14 => ['name' => 'ランニングしながら跳ぶ'],
                ],
                // 小項目 : なげ・うけ
                ItemCategoryCode::HOOP_THROW_CATCH => [
                    1 => ['name' => '体の横で回しからのなげ'],
                    2 => ['name' => 'ルルベ歩行からのなげ'],
                    3 => ['name' => '前回しからの投げ'],
                    4 => ['name' => '前回しからの連続した投げ'],
                    5 => ['name' => '二人組でのなげ受け'],
                    6 => ['name' => 'なげながらのくぐり抜け'],
                    7 => ['name' => '前回しからのくぐり抜け'],
                    8 => ['name' => '床上転がしからのひねり上げ'],
                    9 => ['name' => '投げ・シュネターン受け'],
                    10 => ['name' => 'フライ返し'],
                    11 => ['name' => '背面投げ'],
                    12 => ['name' => '足なげ'],
                    13 => ['name' => 'ジャンプ中の受け'],
                ],
            ],

            // 中項目 : ボール
            ItemCategoryCode::BALL => [
                // 小項目 : 手のひら乗せ・ふり・８の字
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
                // 小項目 : 転がし
                ItemCategoryCode::BALL_ROLLING => [
                    1 => ['name' => '腕の上での転がし（両手）'],
                    2 => ['name' => '腕の上での転がし（片手）'],
                    3 => ['name' => '腕の上での長い転がし（後方）'],
                    4 => ['name' => '腕の上での長い転がし（前方）'],
                    5 => ['name' => '背転がし（首から腰）'],
                    6 => ['name' => '背転がし（背中から手）'],
                    7 => ['name' => '上体そりを伴う腕の上での転がし'],
                    8 => ['name' => '床上転がし'],
                    9 => ['name' => '床上転がしからのひざ下くぐし'],
                    10 => ['name' => '床上転がしから、横転して受ける'],
                    11 => ['name' => '体全面の長い転がし'],
                    12 => ['name' => '背面での長い転がし'],
                    13 => ['name' => '長座で足の上の転がし'],
                    14 => ['name' => '二人組での床上転がし'],
                    15 => ['name' => '二人組での、反りを伴う床上転がし'],
                    16 => ['name' => '床上転がしからジャンプで越える'],
                    17 => ['name' => '長い転がしのシリーズ①'],
                    18 => ['name' => '長い転がしのシリーズ②'],
                ],
                // 小項目 : つき
                ItemCategoryCode::BALL_BOUND => [
                    1 => ['name' => 'その場でのつき'],
                    2 => ['name' => 'リズミカルなつき（大小交互）'],
                    3 => ['name' => 'つきながら歩く'],
                    4 => ['name' => 'つきながらのスキップ'],
                    5 => ['name' => 'バックスキップでのつき'],
                    6 => ['name' => '二人組でのつき'],
                    7 => ['name' => '二人同時のつきと受け'],
                    8 => ['name' => '二人組でのつき（足交差回転）'],
                    9 => ['name' => '二人組でのつき（移動して相手のボールを受ける）'],
                    10 => ['name' => 'ひじでつく'],
                    11 => ['name' => 'ひざの下でつく'],
                    12 => ['name' => 'ひざの上でつく'],
                    13 => ['name' => '胸で床につく'],
                    14 => ['name' => 'つま先でつく'],
                    15 => ['name' => '胸の上につく'],
                    16 => ['name' => '首の後ろでつく'],
                    17 => ['name' => 'ひじの内側で上につく'],
                    18 => ['name' => 'バランス中のリズミカルなつき'],
                    19 => ['name' => '開脚ジャンプ中の足でのつき'],
                    20 => ['name' => '壁つき（床での弾みあり）'],
                    21 => ['name' => '壁つき（床での弾みなし）'],
                    22 => ['name' => '壁つき（床での弾みあり・足交差回転）'],
                    23 => ['name' => '壁を使う（床での弾みなし・足交差回転）'],
                ],
                // 小項目 : なげ・うけ
                ItemCategoryCode::BALL_THROW_CATCH => [
                    1 => ['name' => '両手で投げて片手で受ける'],
                    2 => ['name' => '片手で投げて片手で受ける'],
                    3 => ['name' => '移動を伴う投げうけ'],
                    4 => ['name' => '投げて回転してうける'],
                    5 => ['name' => '投げて床タッチしてうける'],
                    6 => ['name' => '横方向への投げうけ'],
                    7 => ['name' => '二人組での投げうけ（１個のボール）'],
                    8 => ['name' => '二人組での投げうけ（２個のボール）'],
                    9 => ['name' => '二人組での投げうけ（回転を伴う）'],
                    10 => ['name' => '二人組での投げうけ（床タッチ）'],
                    11 => ['name' => '背面なげ、手の甲受け'],
                    12 => ['name' => '背面投げ（片手）'],
                    13 => ['name' => '小さく投げながらのランニング'],
                    14 => ['name' => '小さな投げ'],
                    15 => ['name' => '大きな投げからの足受け'],
                    16 => ['name' => '大きな投げからの座でのあし受け'],
                    17 => ['name' => '背中でうける'],
                    18 => ['name' => '頭の後ろでうける'],
                    19 => ['name' => '足の甲でうける'],
                    20 => ['name' => 'ジャンプ中の投げ'],
                    21 => ['name' => 'ジャンプ中に投げてうける'],
                    22 => ['name' => 'しかバックルで投げて、かかえ込みで受ける'],
                    23 => ['name' => '大きくなげ前転してうける'],
                    24 => ['name' => '視野外で座からの投げ'],
                    25 => ['name' => '回転の後でうけ（後方転回）'],
                    26 => ['name' => '回転の後でのうけ（ひじでの後方転回）'],
                ],

            ],

            // 中項目 : クラブ
            ItemCategoryCode::CLUB => [
                // 小項目 : ふり・回し・小円
                ItemCategoryCode::CLUB_SWING => [
                    1 => ['name' => '前後への大きなふり'],
                    2 => ['name' => '体の前での大きな回し（片手）'],
                    3 => ['name' => '側面での大きな回し（片手）'],
                    4 => ['name' => '体の前での大きな回し（両手）'],
                    5 => ['name' => '振りからの小円（前後）'],
                    6 => ['name' => '側面での小円'],
                    7 => ['name' => '正面での片方ずつの小円'],
                    8 => ['name' => '正面での左右同時の小円'],
                    9 => ['name' => '水平面での小円'],
                    10 => ['name' => '振りからの小円'],
                    11 => ['name' => '上体を反らして回す（１本持ち）'],
                    12 => ['name' => '上体を反らして回す（２本持ち）'],
                    13 => ['name' => '波状運動と合わせた小円'],
                    14 => ['name' => 'バランス中の小円'],
                    15 => ['name' => 'ひじからのまわし'],
                    16 => ['name' => '大、中、小のまわし'],
                    17 => ['name' => 'ひじからの背面まわし'],
                    18 => ['name' => '大中の回し（背面）'],
                    19 => ['name' => '肘からの体の前での回し'],
                    20 => ['name' => '大中の回し（前）'],
                ],
                // 小項目 : 風車
                ItemCategoryCode::CLUB_WINDMILL => [
                    1 => ['name' => '風車（縦方向）'],
                    2 => ['name' => '風車（水平方向）'],
                    3 => ['name' => '水平の風車からの体回旋'],
                    4 => ['name' => '水平の風車からの足交差回転'],
                    5 => ['name' => '水平風車しながらのワルツステップ'],
                    6 => ['name' => '風車（頭上）'],
                    7 => ['name' => '頭上風車中のワルツステップ'],
                    8 => ['name' => '風車のコンビネーション'],
                ],
                // 小項目 : なげ・うけ
                ItemCategoryCode::CLUB_THROW_CATCH => [
                    1 => ['name' => '空中でのまわし'],
                    2 => ['name' => '高い投げ'],
                    3 => ['name' => '高い投げと持ち替え'],
                    4 => ['name' => '２本投げ（基本）'],
                    5 => ['name' => '背面投げ（１本）'],
                    6 => ['name' => '背面投げ（２本）'],
                    7 => ['name' => '斜めからの背面なげ'],
                    8 => ['name' => '交互の投げ'],
                    9 => ['name' => '大きな投げ（非対称）'],
                    10 => ['name' => '片手の連続投げ'],
                    11 => ['name' => '投げ（シュネターン）'],
                    12 => ['name' => '投げ前転'],
                    13 => ['name' => '投げ前転（２本投げ）'],
                    14 => ['name' => '押し投げ'],
                    15 => ['name' => '非対称の投げ'],
                    16 => ['name' => '二人組での投げうけ（１本）'],
                    17 => ['name' => '二人組での投げうけ（２本）'],
                    18 => ['name' => '二人組での投げうけ（回転を伴う）'],
                    19 => ['name' => 'ジャンプ中の投げ'],
                    20 => ['name' => 'ジャンプ中の投げうけ（２本投げ）'],
                ],
            ],

            // 中項目 : リボン
            ItemCategoryCode::RIBBON => [
                // 小項目 : ふり・回し・８の字
                ItemCategoryCode::RIBBON_SWING => [
                    1 => ['name' => '前後のふりからまわし'],
                    2 => ['name' => '前後ふりと前からの側面大回旋'],
                    3 => ['name' => '振りからの後ろ持ち替え'],
                    4 => ['name' => 'シャッセ中の横まわし'],
                    5 => ['name' => 'シャッセ中の前まわし'],
                    6 => ['name' => 'リボンを前にまたぐ'],
                    7 => ['name' => 'リボンを横にまたぐ'],
                    8 => ['name' => '体の前でのリボンの振り'],
                    9 => ['name' => '上下運動を伴う頭上回し'],
                    10 => ['name' => '回転しながらの回し'],
                    11 => ['name' => '持ち替えを伴う８の字'],
                    12 => ['name' => 'リボンを歩いて通過'],
                    13 => ['name' => 'リボンをジャンプして通過'],
                    14 => ['name' => '足の交差回転を伴うリボンの上下回し'],
                    15 => ['name' => '体の前での垂直方向の８の字'],
                    16 => ['name' => '体の前で連続した小さな８の字'],
                    17 => ['name' => '側面での垂直方向の８の字'],
                    18 => ['name' => '体の前で大きな８の字'],
                    19 => ['name' => '横で８の字での通過'],
                    20 => ['name' => '前で８の字での通過'],
                ],
                // 小項目 : 波形
                ItemCategoryCode::RIBBON_WAVE => [
                    1 => ['name' => '下から上への波形②'],
                    2 => ['name' => '後ろへの走行を伴う波形'],
                    3 => ['name' => '下から上への波形①'],
                    4 => ['name' => '上下の波形'],
                    5 => ['name' => 'ステップ中の頭上での波形'],
                    6 => ['name' => 'リボンを前にまたぐ'],
                    7 => ['name' => 'リボンを後ろにまたぐ'],
                    8 => ['name' => 'バランス中の波形'],
                    9 => ['name' => 'ジャンプ中の大きな振り上げと波形'],
                    10 => ['name' => '体の前での横方向の波形'],
                    11 => ['name' => '踏み足ステップと回転中の波形'],
                    12 => ['name' => 'ピポッドを伴った波形'],
                ],
                // 小項目 : らせん
                ItemCategoryCode::RIBBON_SPIRAL => [
                    1 => ['name' => '後ろへの歩行を伴うらせん'],
                    2 => ['name' => '体の前での横方向のらせん'],
                    3 => ['name' => 'らせんで体の前に大きな円を描く'],
                    4 => ['name' => 'らせんで体の横に大きな円を描く'],
                    5 => ['name' => '踏み足回転を伴うらせん'],
                    6 => ['name' => '体回旋中のらせん'],
                    7 => ['name' => 'バランス中のらせん'],
                    8 => ['name' => 'らせんからのしかジャンプ'],
                    9 => ['name' => 'らせんからの開脚ジャンプ'],
                    10 => ['name' => '前転を伴ったリボン操作'],
                ],
                // 小項目 : なげ
                ItemCategoryCode::RIBBON_THROW => [
                    1 => ['name' => '小さな投げ'],
                    2 => ['name' => 'シュネターンを伴う大きな投げ'],
                    3 => ['name' => '後ろのブーメラン'],
                    4 => ['name' => '前のブーメラン'],
                ],
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