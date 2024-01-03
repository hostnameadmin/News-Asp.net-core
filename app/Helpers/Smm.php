<?php

namespace App\Helpers;

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class Smm
{
    private static $link;
    private static $token;

    public static function init($data = [])
    {
        self::$link = $data['link'];
        self::$token = $data['token'];
    }

    public static function connect($data)
    {
        if (is_array($data)) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => self::$link,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array_merge(['key' => self::$token], $data),
            ));
            $response = curl_exec($curl);
            if (!$response) {
                $error = curl_error($curl);
                curl_close($curl);
                echo "Có lỗi xảy ra: " . $error;
            } else {
                curl_close($curl);
                return $response;
            }
        } else {
            return 'Đầu vào không hợp lệ';
        }
    }
}
