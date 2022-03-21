<?php


namespace app\controllers;

use app\models\User;
use yii\rest\ActiveController;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\User';

    public function actionGetList()
    {
        $number_per_page = 5;
        $page_number = \Yii::$app->request->get('page_number');
        $offset = $page_number * $number_per_page;
        $users = User::find()->offset($offset)->limit($number_per_page)->all();
        $resultArray = [];
        foreach ($users as $user) {
            $result = $user->toArray();
            $result['albums'] = $user->getAlbums()->asArray()->all();
            $resultArray[] = $result;
        }

        return $this->asJson($resultArray);
    }

    public function actionGet()
    {
        $id = \Yii::$app->request->get('id');
        $user = User::findOne($id);
        return $this->asJson($user);
    }
}
