<?php
namespace App\Helper;

class Helper
{
    public static function IDCustomize($model, $strow, $length, $prefix){
        $data = $model::orderBy($strow, 'desc')->first(); //lấy thằng có id lớn nhất
        if (!$data){
            $og_lenght = $length;
            $last_numer = '';
        }else{
            $code = substr($data->$strow, strlen($prefix)+1); //lấy ra phần số của id
            $actial_last_number = ($code/1)*1; //đổi phần số ra số thực
            $increment_last_number = $actial_last_number+1; //tăng thêm 1
            $last_numer_lenght = strlen($increment_last_number); //lấy độ dài
            $og_lenght = $length - $last_numer_lenght; //lấy độ dài thiết lập trừ độ dài kia
            $last_numer = $increment_last_number;
        }

        $zeros = "";
        for ($i=0; $i<$og_lenght; $i++){
            $zeros.="0"; //thêm các số 0 vào
        }

        return $prefix.'-'.$zeros.$last_numer;
    }
}
?>
