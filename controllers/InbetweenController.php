<?php
use Yii;
use yii\web\controller;
use yii\helpers\Json;

class InbetweenController extends Controller
{
    public function actionIndex(){
              return $this->render('index');
    }
}