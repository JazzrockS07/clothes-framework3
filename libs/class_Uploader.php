<?php


class Uploader {
	static $error = '';
	static $rezult = '';
	static $filename = '';
	private static $width = '';
	private static $height = '';
	private static $temp = array();
	private static $matches = array();

	static function upload($file) {
		$array = array ('image/gif','image/jpeg','image/png');
		$array2 = array ('jpg','jpeg','gif','png');
		if ($file['error'] == 0) {
			if ($file['size'] < 5000 || $file['size'] > 35000000) {
				self::$error = 'Размер изображения нам не подходит';
			}
			else {
				preg_match('#\.([a-z]+)$#iu', $file['name'], $matches);
				if (isset($matches[1])) {

					self::$matches[1] = mb_strtolower($matches[1]);
					self::$temp = getimagesize($file['tmp_name']);
					self::$filename = date('Ymd-His').'img'.rand(10000, 99999).'.'.self::$matches[1];
					self::$width = self::$temp[0];
					self::$height = self::$temp[1];

					if (!in_array(self::$matches[1], $array2)) {
						self::$error = 'Не подходит расширение изображения';
					}
					elseif (!in_array(self::$temp['mime'], $array)) {
						self::$error = 'Не подходит тип файла, можно загружать только изображения';
					}
					elseif (!move_uploaded_file($file['tmp_name'], './uploaded/'.self::$filename)) {
						self::$error = 'Изображение не загружено! Ошибка';
					}
					else {
						return true;
					}
				} else {
					self::$error = 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, png, gif';
				}
			}
		}
	}

	static function resize($size_width,$size_height,$dir) {
		if (!file_exists('./uploaded/'.$dir)) {
			mkdir('./uploaded/'.$dir);
		}
		if ((self::$width <= $size_width) && (self::$height <= $size_height)) {
			copy('./uploaded/'.self::$filename,'./uploaded/'.$dir.self::$filename);
			self::$rezult = 'Ваше изображение было успешно загружено';
		}
		else {
			if(self::$width > $size_width) {
				$newwidth = $size_width;
				$newheight = round($newwidth * self::$height / self::$width);
				if($newheight > $size_height) {
					$newheight = $size_height;
					$newwidth = round($newheight * self::$width / self::$height);
				}
			}
			elseif(self::$height > $size_height) {
				$newheight = $size_height;
				$newwidth = round($newheight * self::$width / self::$height);
			}
			if($newheight < 5 || $newwidth < 5) {
				self::$rezult = 'Непропорциональное изображение, выберите другое';
			}
			else {
				if(self::$temp['mime'] == 'image/jpeg') {
					$templ = imagecreatefromjpeg('./uploaded/'.self::$filename);
					$tmp = imagecreatetruecolor($newwidth, $newheight);
					imagecopyresampled($tmp, $templ, 0, 0, 0, 0, $newwidth, $newheight, self::$width, self::$height);
					imagejpeg($tmp, './uploaded/'.$dir.self::$filename, 100);
				}
				elseif(self::$temp['mime'] == 'image/gif') {
					$templ = imagecreatefromgif('./uploaded/'.self::$filename);
					$tmp = imagecreatetruecolor($newwidth, $newheight);
					imagecopyresampled($tmp, $templ, 0, 0, 0, 0, $newwidth, $newheight, self::$width, self::$height);
					$background = imagecolorallocate($tmp, 0, 0, 0);
					imagecolortransparent($tmp, $background);
					imagegif($tmp, './uploaded/'.$dir.self::$filename);
				}
				elseif(self::$temp['mime'] == 'image/png') {
					$templ = imagecreatefrompng('./uploaded/'.self::$filename);
					$tmp = imagecreatetruecolor($newwidth, $newheight);
					imagealphablending($tmp, false);
					imagesavealpha($tmp, true);
					imagecopyresampled($tmp, $templ, 0, 0, 0, 0, $newwidth, $newheight, self::$width, self::$height);
					imagepng($tmp, './uploaded/'.$dir.self::$filename);
				}
				imagedestroy($tmp);
				self::$rezult = 'Ваше изображение было успешно изменено и загружено';
			}
		}
	}
}