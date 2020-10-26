<?php

$root = $_ENV['PROJECT_DIR'];

Yii::setAlias('@root', $root);
Yii::setAlias('@common', $root . '/common');
Yii::setAlias('@frontend', $root . '/frontend');
Yii::setAlias('@backend', $root . '/backend');
Yii::setAlias('@console', $root . '/console');
Yii::setAlias('@api', $root . '/api');

function ffff($var) {
    if(is_array($var) && is_object($var)) {
        //$var = \ZnCore\Domain\Helpers\EntityHelper::toArray($var);
        $var = \ZnCore\Base\Legacy\Yii\Helpers\ArrayHelper::toArray($var);
    }
    if($var instanceof \Illuminate\Support\Collection) {
        $var = \ZnCore\Domain\Helpers\EntityHelper::collectionToArray($var);
    }
    if(is_array($var)) {
        foreach ($var as &$item) {
            $item = ffff($item);
        }
    }
    return $var;
}

function prr($var) {
    $var = ffff($var);
    Yii::$app->response->content = json_encode($var);
    Yii::$app->response->send();
    exit;
}
