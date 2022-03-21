<?php

namespace app\controllers;

use app\models\Album;

class AlbumController extends \yii\rest\ActiveController {

    public $modelClass = 'app\models\Album';

    public function actionGetList()
    {
        $page_number = \Yii::$app->request->get('page_number');
        $number_per_page = 10;
        $offset = $page_number * $number_per_page;
        $albums = Album::find()->offset($offset)->limit($number_per_page)->all();
        return $this->asJson($albums);
    }

    public function actionGet()
    {
        $id = \Yii::$app->request->get('id');
        $album = Album::findOne($id);
        $result = $album->toArray();
        $result['photos'] = $album->getPhotos()->asArray()->all();
        return $this->asJson($result);
    }
}
