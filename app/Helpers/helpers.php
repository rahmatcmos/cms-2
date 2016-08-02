<?php

if(!function_exists('calculate_time_span')){
        function calculate_time_span($date){
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);
//$seconds = date('Y-m-d H:i:s');
     
         //  $years = floor($seconds / 3153600);
            $years = date('Y') - date( "Y",strtotime($date));
            $months = floor($seconds / (3600*24*30));
            $day = floor($seconds / (3600*24));
            $hours = floor($seconds / 3600);
            $mins = floor(($seconds - ($hours*3600)) / 60);
            $secs = floor($seconds % 60);

            if($seconds > (24*(60*60))*(31*12)){
                $time = $years." year ago";
            }
            elseif($seconds > ((24*(60*60))*31)){
                $time = $months." month ago";
            } elseif ($seconds > 24*60*60) {
                $time = $day." day ago";
            } elseif ($seconds > 60*60){
                $time = $hours." hours ago";
            } elseif ($seconds > 60){
                $time = $mins." min ago";
            } else{
                $time = $secs." seconds ago";
            }
            return $time;
    }
}
if(!function_exists('formatMoney')){
    function formatMoney($number, $fractional=false) { 
        if ($fractional) { 
            $number = sprintf('%.2f', $number); 
        } 
        while (true) { 
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
            if ($replaced != $number) { 
                $number = $replaced; 
            } else { 
                break; 
            } 
        } 
        return $number; 
    } 
}

if (!function_exists('backend_url')) {
    function backend_url($url = '', $params = []) {
        return route(trim(config('backend.url'), '/'). ".$url", $params);
    }
}

if (!function_exists('dataPaginator')) {
    function dataPaginator($paginator, $pullRight) {
        return (new \App\Paginators\DataTable($paginator))->render($pullRight);
    }
}

if (!function_exists('backend_url')) {
    function backend_url() {
        return config('backend.url');
    }
}

/**
 * Clock
 */
if (!function_exists('backend_route')) {
    function backend_route($route, $param = []) {
        return route(trim(config('backend.url'), '/') . '.' . $route, $param);
    }
}

function profile_pic_url($filename = '') {
    $path = profile_pic_path($filename);
    if (!is_file($path)) {
        return url(join(config('app.profile_pic_path'), '/') . '/default.png');
    }
    return url(join(config('app.profile_pic_path'), '/') . '/' . $filename);
}

function profile_pic_path($filename = '') {
    return join(config('app.profile_pic_path'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $filename;
}

function custom_menu()
{
    $lang = BeyondPlus\CmsLibrary\Models\Bp_custom::get()->toArray();
    $languages = [];
    foreach ($lang as $key => $value) {
         $languages[$key]['custom_name'] = $value['custom_name'];
         $languages[$key]['custom_link'] = $value['custom_link'];
    }
    return $languages;
}

function cities()
{
    $city = App\Models\City::get()->toArray();
    $cities = [];
    foreach ($city as $value) {
        $cities[$value['id']] = $value['name'];
    }
    return $cities;
}


function packages()
{
    $pk = App\Models\Package::get()->toArray();
    $pks = [];
    foreach ($pk as $value) {
        $pks[$value['id']] = $value['name'];
    }
    return $pks;
}

function defaultCity()
{
    $city = App\Models\City::where('name', 'Yangon')->first();
    if (!$city) {
        return null;
    }
    return $city->id;
}



function parseCsv($path) {
    return \App\Libs\Convector\Csv2Array::convert($path);
}

function input($input, $default = null) {
    return \Request::get($input, $default);
}

function isActive($value)
{
    return !!($value == 1 || $value == "Yes");
}