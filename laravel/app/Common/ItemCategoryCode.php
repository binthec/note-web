<?php

namespace App\Common;

class ItemCategoryCode
{
    /**
     * 大分類
     */
    const EMPTY_HAND = 100; // 徒手
    const APPARATUS = 200;  // 手具

    /**
     * 中分類
     */
    // 徒手
    const BASIC_ACTION = 110; // 基本動作

    const STEP = 120;         // ステップ
    const ACROBAT = 130;      // アクロ
    const JUMP = 140;         // ジャンプ
    const BALANCE = 150;      // バランス
    const ROTATION = 160;     // ローテーション

    /**
     * 徒手の小分類
     */
    // 徒手の基本動作
    const SITTING_BASIC_ACTION = 111;   // 座ってする基本動作
    const SITTING_APPLIED_ACTION = 112; // 座ってする応用動作
    const STANDING_BASIC_ACTION = 113;  // 立ってする基本動作


    /**
     * 手具
     */
    const ROPE = 210;   // ロープ
    const HOOP = 220;   // フープ
    const BALL = 230;   // ボール
    const CLUB = 240;   // クラブ
    const RIBBON = 250; // リボン

    // ロープ
    const ROPE_SWING = 211;            // ふり・回し・８の字
    const ROPE_JUMP = 212;             // 縄跳び
    const ROPE_ECHAPPE = 213;          // エシャッペ
    const ROPE_BALL_THROW_CATCH = 214; // なげ・うけ

    // フープ
    const HOOP_SWING = 221;       // ふり・回し・８の字
    const HOOP_ROLLING = 222;     // 転がし
    const HOOP_THROW_CATCH = 223; // なげ・うけ

    // ボール
    const BALL_SWING = 231;       // 手のひら乗せ・ふり・８の字
    const BALL_ROLLING = 232;     // 転がし
    const BALL_BOUND = 233;       // つき
    const BALL_THROW_CATCH = 234; // なげ・うけ

    // クラブ
    const CLUB_SWING = 241;        // ふり・回し・小円
    const CLUB_WINDMILL = 242;     // 風車
    const CLUB_THROW_CATCH = 243; // なげ・うけ

    // リボン
    const RIBBON_SWING = 251;  // ふり・回し・８の字
    const RIBBON_WAVE = 252;   // 波形
    const RIBBON_SPIRAL = 253; // らせん
    const RIBBON_THROW = 254;  // なげ

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
