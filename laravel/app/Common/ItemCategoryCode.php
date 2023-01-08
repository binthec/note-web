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
    const SWING = 211;       // 手のひら乗せ・ふり・８の字
    const ROLLING = 212;     // 転がし
    const BOUND = 213;       // つき
    const THROW_CATCH = 214; // なげ・うけ

    /**
     * 大分類
     *
     * @var string[]
     */
    public static $first_categories = [
        self::EMPTY_HAND => '手具要素',
        self::APPARATUS => '徒手要素'
    ];

    /**
     * 徒手要素
     *
     * @var string[]
     */
    public static $empty_hand_element = [
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
    public static $apparatus_element = [
        self::BALL => 'ボール',
        self::HOOP => 'フープ',
        self::RIBBON => 'リボン',
        self::CLUB => 'クラブ',
        self::ROPE => 'ロープ',
    ];
}
