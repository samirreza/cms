<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

/* @var $this yii\web\View */
/* @var $searchModel modules\post\backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'دسته‌های نوشته';
$this->params['breadcrumbs'][] = ['label' => 'نوشته‌ها', 'url' => ['/post/manage/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-index">
    <?= ActionButtons::widget([
        'buttons' => [
            'create' => ['label' => 'افزودن دسته'],
        ],
    ]); ?>
    <?php Panel::begin([
        'title' => Html::encode($this->title)
    ]) ?>
        <?php Pjax::begin([
            'id' => 'post-category-gridviewpjax',
            'enablePushState' => false,
        ]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'kalpok\grid\IDColumn'],
                    ['class' => 'kalpok\grid\LanguageColumn'],
                    'title',
                    [
                        'attribute' => 'createdAt',
                        'format' =>'date',
                        'filter' =>false
                    ],
                    ['class' => 'kalpok\grid\ActiveColumn'],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>
