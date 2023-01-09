<?php

namespace App\Common;

class ItemCategoryCode
{
    /**
     * 大分類
     */
    const EMPTY_HAND = 100;
    const APPARATUS = 200;

    /**
     * 中分類
     */
    // 徒手
    const BASIC_ACTION = 110;

    const STEP = 120;
    const ACROBAT = 130;
    const JUMP = 140;
    const BALANCE = 150;
    const ROTATION = 160;

    // 手具
    const BALL = 210;   // ボール
    const RIBBON = 220; // リボン
    const CLUB = 230;   // クラブ
    const ROPE = 240;   // ロープ
    const HOOP = 250;   // フープ

    /**
     * 小分類
     */
    // 徒手の基本動作
    const SITTING_BASIC_ACTION = 111;   // 座ってする基本動作
    const SITTING_APPLIED_ACTION = 112; // 座ってする応用動作
    const STANDING_BASIC_ACTION = 113;  // 立ってする基本動作

    // ボール
    const BALL_SWING = 211;       // 手のひら乗せ・ふり・８の字
    const BALL_ROLLING = 212;     // 転がし
    const BALL_BOUND = 213;       // つき
    const BALL_THROW_CATCH = 214; // なげ・うけ

    // リボン
    const RIBBON_SWING = 221;  // ふり・回し・８の字
    const RIBBON_WAVE = 222;   // 波形
    const RIBBON_SPIRAL = 223; // らせん
    const RIBBON_THROW = 224;  // なげ

    /**
     * 大分類
     *
     * @var string[]
     */
    public static $first_category_labels = [
        self::EMPTY_HAND => '手具要素',
        self::APPARATUS => '徒手要素'
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
        self::BALL => 'ボール',
        self::HOOP => 'フープ',
        self::RIBBON => 'リボン',
        self::CLUB => 'クラブ',
        self::ROPE => 'ロープ',
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
            self::BALL => 'ボール',
            self::HOOP => 'フープ',
            self::RIBBON => 'リボン',
            self::CLUB => 'クラブ',
            self::ROPE => 'ロープ',
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
        self::BALL => [
            self::BALL_SWING => '手のひら乗せ・ふり・８の字',
            self::BALL_ROLLING => '転がし',
            self::BALL_BOUND => 'つき',
            self::BALL_THROW_CATCH => 'なげ・うけ',
        ],
        self::RIBBON => [
            self::RIBBON_SWING => 'ふり・回し・８の字',
            self::RIBBON_WAVE => '波形',
            self::RIBBON_SPIRAL => 'らせん',
            self::RIBBON_THROW => 'なげ',
        ],
        self::HOOP => [],
        self::CLUB => [],
        self::ROPE => [],
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
