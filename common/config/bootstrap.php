<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@admin', dirname(dirname(__DIR__)) . '/admin');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

function p ($data, $status = NULL) {
    echo '<pre>';
    if (is_object($data) && $status == 'see') {
        p(get_class_methods($data));
    }
    if ($data == NULL || $status == 1) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo '<pre/>';
    exit;
}