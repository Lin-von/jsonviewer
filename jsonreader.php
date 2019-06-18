<?php


$listPop = function ($params) {
    $result = array(
        "data" => array()
    );
    array_push($result["data"], array("name" => "本地平台(local)", "id" => "local"));


    return $result;
};

$listConf = function ($params) {
    $result = array(
        "data" => array()
    );
    array_push($result["data"], array("name" => "name"));
    return $result;
};

$query = function ($params) {
    $result = array("data" => "data");
    return $result;
};


$info = $_GET;
$opr = $info['opr'];
$data = array(
    "zone" => $info['zone'],
    "conf" => $info['conf']
);


$operates = array(
    "listPop"      => $listPop,
    "listConf"     => $listConf,
    "query"        => $query
    );



if (!isset($operates[$opr])) {
    echo "不支持的操作";
}
$operate = $operates[$opr];


$ret = call_user_func($operate, $data);
if ($ret == -1) {
    echo "调用失败";
}

echo json_encode($ret);


