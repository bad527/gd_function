<?php
// 設定原始圖像的相對路徑
$source_image_path = 'C:/wamp64/www/gd_function/upload_file/2018-08-08_185658.jpg';

// 新圖片保存的路徑（不覆蓋原圖）
$destination_image_path = 'C:/wamp64/www/gd_function/upload_file/2018-08-08_185658_large.jpg';

// 取得原始圖像的尺寸
list($original_width, $original_height) = getimagesize($source_image_path);

// 檢查是否成功取得圖像尺寸
if (!$original_width || !$original_height) {
    die("Failed to retrieve image size. Please check the image path.");
}

// 設定新圖片的寬和高（假設放大 2 倍）
$new_width = $original_width * 2;
$new_height = $original_height * 2;

// 增加記憶體限制，防止內存耗盡錯誤
ini_set('memory_limit', '256M');

// 建立一個新的空白圖片
$new_image = imagecreatetruecolor($new_width, $new_height);

// 從原圖載入圖片資源
$source_image = imagecreatefromjpeg($source_image_path);

// 將原圖縮放並拷貝到新圖片中
imagecopyresampled($new_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

// 輸出並保存新的圖像，不覆蓋原圖
imagejpeg($new_image, $destination_image_path, 50); // 100 表示最佳質量

// 釋放資源
imagedestroy($source_image);
imagedestroy($new_image);

echo "Image resized and saved successfully as $destination_image_path.";
?>
<img src="upload_file/2018-08-08_185658.jpg" alt="">
<img src="upload_file/2018-08-08_185658_large.jpg
" alt="">