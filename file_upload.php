<?php
require_once "./dbc.php";
// ファイル関連の取得
$file = $_FILES['img'];
// var_dump($file);
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = '/Applications/MAMP/htdocs/upload_test/images/';
$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir . $save_filename;

// キャプションを取得
$caption = filter_input(
  INPUT_POST,
  'caption',
  FILTER_SANITIZE_SPECIAL_CHARS
);

// キャプションのバリデーション
// 未入力の判定
if (empty($caption)) {
  array_push($err_msgs, 'キャプションを入力してください');
  echo '<br>';
}

// ・140文字以内かの判定
if (strlen($caption) > 140) {
  // echo 'キャプションは140文字以内にしてください';
  array_push($err_msgs, 'キャプションは140文字以内にしてください');
  echo '<br>';
}

// ファイルのバリデーション
// ファイルサイズが1MB未満か
if ($filesize > 1048576 || $file_err == 2) {
  // echo 'ファイルサイズは1MB未満にしてください。';
  array_push($err_msgs, 'ファイルサイズは1MB未満にしてください。');
  echo '<br>';
}

// 拡張は画像形式か
$allow_ext = array('jpg', 'jpeg', 'png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array(strtolower($file_ext), $allow_ext)) {
  // echo '画像ファイルを添付してください';
  array_push($err_msgs, '画像ファイルを添付してください');
  echo '<br>';
}

if (count($err_msgs) === 0) {
  // ファイルが存在するか
  if (is_uploaded_file($tmp_path)) {
    if (move_uploaded_file($tmp_path, $save_path)) {
      echo $filename . 'がアップロードされました';
      echo '<br>';
      // DBに保存する処理(ファイル名、ファイルパス、キャプション)
      // ↓配列に入れる場合
      // $fileData = array($filename, $save_path, $caption);
      // $result = $fileSave($fileData);
      $result = fileSave($filename, $save_path, $caption);
      if ($result){
        echo "データベースに保存しました";
        echo '<br>';
      }else{
        echo "データベースへの保存が失敗しました";
        echo '<br>';
      }
    } else {
      echo 'ファイルをアップロードできませんでした。';
    }
    // move_uploaded_file($tmp_path,$upload_dir,$save_filename);
    // echo $filename.'がアップロードされました';
  } else {
    echo 'ファイルが選択されていません';
    echo '<br>';
  }
} else {
  foreach ($err_msgs as $msg) {
    echo $msg;
    echo '<br>';
  }
}
echo '<br>';
// var_dump($file);
// echo '<br>';
?>

<a href="./upload_form.php">戻る</a>