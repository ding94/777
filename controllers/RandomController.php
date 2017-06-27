<?php

namespace app\controllers;

class RandomController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
