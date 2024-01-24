<?php

namespace App\Helpers;

class Anhyeuem37
{

    public static function curl($link, $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
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
    }

    public static function get($link)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
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
    }

    public static function format_number($number)
    {
        return str_replace(',', '.', number_format($number));
    }

    public static function get_username_bank($syntax, $string)
    {
        $array = explode(" ", $string);
        if (in_array($syntax, $array)) {
            if (in_array("MBVCB", $array)) {
                $total = array_search($syntax, $array);
                return $array[$total + 1] . "" .  $array[$total + 2];
            } else {
                $total = array_search($syntax, $array);
                return rtrim($array[$total + 1], ".");
            }
        }
    }
}
