<?php

namespace App\Common;

class ItemCategoryCode
{
    /**
     * 大分類
     */
    const EMPTY_HAND = 1; // 徒手
    const APPARATUS = 2;  // 手具

    /**
     * 中分類
     */
    // 徒手
    const BASIC_ACTION = 1; // 基本動作
    const STEP = 2;         // ステップ
    const ACROBAT = 3;      // アクロ
    const JUMP = 4;         // ジャンプ
    const BALANCE = 5;      // バランス
    const ROTATION = 6;     // ローテーション

    /**
     * 手具
     */
    const ROPE = 11;   // ロープ
    const HOOP = 12;   // フープ
    const BALL = 13;   // ボール
    const CLUB = 14;   // クラブ
    const RIBBON = 15; // リボン


    /**
     * 徒手の小分類
     */
    // 徒手の基本動作
    const SITTING_BASIC_ACTION = 1;   // 座ってする基本動作
    const SITTING_APPLIED_ACTION = 2; // 座ってする応用動作
    const STANDING_BASIC_ACTION = 3;  // 立ってする基本動作


    /**
     * 手具の小分類
     */
    // ロープ
    const ROPE_SWING = 11;            // ふり・回し・８の字
    const ROPE_JUMP = 12;             // 縄跳び
    const ROPE_ECHAPPE = 13;          // エシャッペ
    const ROPE_BALL_THROW_CATCH = 14; // なげ・うけ

    // フープ
    const HOOP_SWING = 21;       // ふり・回し・８の字
    const HOOP_ROLLING = 22;     // 転がし
    const HOOP_THROW_CATCH = 23; // なげ・うけ

    // ボール
    const BALL_SWING = 31;       // 手のひら乗せ・ふり・８の字
    const BALL_ROLLING = 32;     // 転がし
    const BALL_BOUND = 33;       // つき
    const BALL_THROW_CATCH = 34; // なげ・うけ

    // クラブ
    const CLUB_SWING = 41;        // ふり・回し・小円
    const CLUB_WINDMILL = 42;     // 風車
    const CLUB_THROW_CATCH = 43; // なげ・うけ

    // リボン
    const RIBBON_SWING = 51;  // ふり・回し・８の字
    const RIBBON_WAVE = 52;   // 波形
    const RIBBON_SPIRAL = 53; // らせん
    const RIBBON_THROW = 54;  // なげ

    /** *******
     *
     * ラベル
     *
     ********  */

    /**
     * 大分類
     *
     * @var string[]
     */
    public static $first_category_labels = [
        self::EMPTY_HAND => '徒手要素',
        self::APPARATUS => '手具要素'
    ];



    /**
     * 徒手要素
     *
     * @var string[]
     */
    public static $empty_hand_labels = [
        self::BASIC_ACTION => '基本動作',
        self::STEP => 'ステップ',
        self::ACROBAT => 'アクロ',
        self::JUMP => 'ジャンプ',
        self::BALANCE => 'バランス',
        self::ROTATION => 'ローテーション',
    ];

    /**
     * 手具要素
     *
     * @var string[]
     */
    public static $apparatus_labels = [
        self::ROPE => 'ロープ',
        self::HOOP => 'フープ',
        self::BALL => 'ボール',
        self::CLUB => 'クラブ',
        self::RIBBON => 'リボン',
    ];

    /**
     * 小分類を持たない中分類
     *
     * @var int[]
     */
    public static $has_no_third_category = [
        self::STEP,
        self::ACROBAT,
        self::JUMP,
        self::BALANCE,
        self::ROTATION
    ];

    /**
     * 中分類のラベル
     *
     * @var \string[][]
     */
    public static $second_category_labels = [
        self::EMPTY_HAND => [
            self::BASIC_ACTION => '基本動作',
            self::STEP => 'ステップ',
            self::ACROBAT => 'アクロ',
            self::JUMP => 'ジャンプ',
            self::BALANCE => 'バランス',
            self::ROTATION => 'ローテーション',
        ],
        self::APPARATUS => [
            self::ROPE => 'ロープ',
            self::HOOP => 'フープ',
            self::BALL => 'ボール',
            self::CLUB => 'クラブ',
            self::RIBBON => 'リボン',
        ]
    ];

    /**
     * 小分類
     *
     * @var array
     */
    public static $third_category_labels = [
        // 徒手
        self::BASIC_ACTION => [
            self::SITTING_BASIC_ACTION => '座ってする基本動作',
            self::SITTING_APPLIED_ACTION => '座ってする応用動作',
            self::STANDING_BASIC_ACTION => '立ってする基本動作',
        ],
        self::STEP => null,
        self::ACROBAT => null,
        self::JUMP => null,
        self::BALANCE => null,
        self::ROTATION => null,

        // 手具
        self::ROPE => [
            self::ROPE_SWING => 'ふり・回し・８の字',
            self::ROPE_JUMP => '縄跳び',
            self::ROPE_ECHAPPE => 'エシャッペ',
            self::ROPE_BALL_THROW_CATCH => 'なげ・うけ'
        ],
        self::HOOP => [
            self::HOOP_SWING => 'ふり・回し・８の字',
            self::HOOP_ROLLING => '転がし',
            self::HOOP_THROW_CATCH => 'なげ・うけ'
        ],
        self::BALL => [
            self::BALL_SWING => '手のひら乗せ・ふり・８の字',
            self::BALL_ROLLING => '転がし',
            self::BALL_BOUND => 'つき',
            self::BALL_THROW_CATCH => 'なげ・うけ',
        ],
        self::CLUB => [
            self::CLUB_SWING => 'ふり・回し・小円',
            self::CLUB_WINDMILL => '風車',
            self::CLUB_THROW_CATCH => 'なげ・うけ'
        ],
        self::RIBBON => [
            self::RIBBON_SWING => 'ふり・回し・８の字',
            self::RIBBON_WAVE => '波形',
            self::RIBBON_SPIRAL => 'らせん',
            self::RIBBON_THROW => 'なげ',
        ],
    ];

    /**
     * 基本動作のラベル
     *
     * @var string[]
     */
    public static $basic_action_labels = [
        self::SITTING_BASIC_ACTION => '座ってする基本動作',
        self::SITTING_APPLIED_ACTION => '座ってする応用動作',
        self::STANDING_BASIC_ACTION => '立ってする基本動作',
    ];

}
