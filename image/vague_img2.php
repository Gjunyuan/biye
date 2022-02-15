<?php
header("content-type:image/png");
// 缩放资源路径
$src_img = $_GET['url'];
// 缩放倍数
$x = $_GET['x'];
list($width, $height, $type, $attr) = getimagesize($src_img);
// 输出图像
echo image_resize(file_get_contents($src_img), $width / $x, $height / $x);
// 缩放图像
function image_resize($imagedata, $width, $height, $per = 0)
{
    // 获取图像信息
    list($bigWidth, $bigHight, $bigType) = getimagesizefromstring($imagedata);
    // 缩放比例
    if ($per > 0) {
        $width  = $bigWidth * $per;
        $height = $bigHight * $per;
    }
    // 创建缩略图画板
    $block = imagecreatetruecolor($width, $height);
    // 启用混色模式
    imagealphablending($block, false);
    // 保存PNG alpha通道信息
    imagesavealpha($block, true);
    // 创建原图画板
    $bigImg = imagecreatefromstring($imagedata);
    // 缩放
    imagecopyresampled($block, $bigImg, 0, 0, 0, 0, $width, $height, $bigWidth, $bigHight);
    // 生成临时文件名
    $tmpFilename = tempnam(sys_get_temp_dir(), 'image_');

    // 销毁
    imagegif($block);
    imagedestroy($block);
    $image = file_get_contents($tmpFilename);
    unlink($tmpFilename);
    //返回图像
    return $image;
}
