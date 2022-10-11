<?php

// 都道府県連想配列で取得
function prefecture_array() {
    $prefecture = array(
    1 => '北海道', 2 => '青森県', 3 => '岩手県', 4 => '宮城県', 5 => '秋田県', 6 => '山形県', 7 => '福島県', 8 => '茨城県', 9 => '栃木県', 10 => '群馬県',
    11 => '埼玉県', 12 => '千葉県', 13 => '東京都', 14 => '神奈川県', 15 => '山梨県', 16 => '長野県', 17 => '新潟県', 18 => '富山県', 19 => '石川県', 20 => '福井県',
    21 => '岐阜県', 22 => '静岡県', 23 => '愛知県', 24 => '三重県', 25 => '滋賀県', 26 => '京都府', 27 => '大阪府', 28 => '兵庫県', 29 => '奈良県', 30 => '和歌山県',
    31 => '鳥取県', 32 => '島根県', 33 => '岡山県', 34 => '広島県', 35 => '山口県', 36 => '徳島県', 37 => '香川県', 38 => '愛媛県', 39 => '高知県', 40 => '福岡県',
    41 => '佐賀県', 42 => '長崎県', 43 => '熊本県', 44 => '大分県', 45 => '宮崎県', 46 => '鹿児島県', 47 => '沖縄県'
    );
    return $prefecture;
}

// 秘密の質問連想配列で取得
function secret_question_array() {
    $secret_question = array(
        1 => '店舗のあいことば', 2 => '好きなアーティスト', 3 => '好きなブランド'
    );
    return $secret_question;
}


// 店舗を追加（Create）
function insert_shop($db, $shop_name, $manager, $manager_kana, $passwd, $phone_number, $time) {
    $time = get_time();
    $sql = 'INSERT INTO shop_table(shop_name, manager, manager_kana, passwd, phone_number, created_at)
    VALUES(:shop_name, :manager, :manager_kana, :passwd, :phone_number, :created_at)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':shop_name', $shop_name);
    $stmt->bindValue(':manager', $manager);
    $stmt->bindValue(':manager_kana', $manager_kana);
    $stmt->bindValue(':passwd', $passwd);
    $stmt->bindValue(':phone_number', $phone_number);
    $stmt->bindValue(':created_at', $time);
    $stmt->execute();
    return $stmt;
}


// 店舗アドレスを追加（Create)
function insert_address($db, $shop_id, $postal_code, $prefecture, $city, $place, $time) {
    $time = get_time();
    // $shop_id = $db->lastInsertId();
    $sql = 'INSERT INTO address_table(shop_id, postal_code, prefectures, city, place, created_at)
    VALUES(:shop_id, :postal_code, :prefectures, :city, :place, :created_at)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':shop_id', $shop_id);
    $stmt->bindValue(':postal_code', $postal_code);
    $stmt->bindValue(':prefectures', $prefecture);
    $stmt->bindValue(':city', $city);
    $stmt->bindValue(':place', $place);
    $stmt->bindValue(':created_at', $time);
    $stmt->execute();
    return $stmt;
    // return execute_db($db, $sql, array($shop_id, $postal_code, $prefecture, $city, $place, $time));
}

// 秘密テーブル追加（Create)
function insert_secret($db, $shop_id, $secret_question, $secret_answer, $time) {
    $time = get_time();
    // $shop_id = $db->lastInsertId();
    $sql = 'INSERT INTO secret_table(shop_id, secret_question, secret_answer, created_at)
    VALUES(:shop_id, :secret_question, :secret_answer, :created_at)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':shop_id', $shop_id);
    $stmt->bindValue(':secret_question', $secret_question);
    $stmt->bindValue(':secret_answer', $secret_answer);
    $stmt->bindValue(':created_at', $time);
    $stmt->execute();
    return $stmt;
}

// ログイン用shop_id, passwd取得
function get_shop($db, $shop_id) {
    $sql = 'SELECT shop_id, passwd FROM shop_table WHERE shop_id = :shop_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':shop_id', $shop_id);
    // $stmt->bindValue(':passwd', $passwd);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row;
}

// 空文字バリデーション
function emptySign($shop_name, $manager, $manager_kana, $postal_code, $prefecture, $city, $place, $phone_number, $passwd, $passwd_check, $secret_question, $secret_answer) {
    $result = '';
    if (empty($shop_name) || empty($manager) || empty($manager_kana) || empty($postal_code) || empty($prefecture) || empty($city) || empty($place) || empty($phone_number) || empty($passwd) || empty($passwd_check) || empty($secret_question) || empty($secret_answer)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// 秘密の質問フォーム用データ取得
function get_secret($db, $params = array()) {
    $sql = 'SELECT secret_id FROM secret_table
    WHERE shop_id = ? AND secret_question = ? AND secret_answer = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch();
    return $row;
}

// passwd更新
function update_passwd($db, $params = array()) {
    $sql = 'UPDATE shop_table SET passwd = ? WHERE shop_id = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}