<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <div class="call-to-action bg-light p-3 mb-3 rounded"> <div class="cta-text">
            <h3>Empower Your Workforce</h3>
            <p class="lead">Manage employee information efficiently and streamline your HR processes.</p> </div>
        <?= Html::a('Learn More', '#', ['class' => 'btn btn-primary cta-button']) ?> </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?> </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'first_name',
            'last_name',
            'email:email',
            'phone_number',
            'hire_date:date',
            'job_title',
            'department',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions' => ['class' => 'btn btn-sm'], // Base styling for all buttons
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="bi bi-eye-fill"></i>', $url, [
                            'class' => 'btn-info',
                            'title' => Yii::t('yii', 'View'),
                            'data-bs-toggle' => 'tooltip',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="bi bi-pencil-square"></i>', $url, [
                            'class' => 'btn-primary ms-2', // ms-2 for a little spacing
                            'title' => Yii::t('yii', 'Update'),
                            'data-bs-toggle' => 'tooltip',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="bi bi-trash-fill"></i>', $url, [
                            'class' => 'btn-danger ms-2', // ms-2 for a little spacing
                            'title' => Yii::t('yii', 'Delete'),
                            'data' => [
                                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                            'data-bs-toggle' => 'tooltip',
                        ]);
                    },
                ],
            ],
        ],
        'options' => ['class' => 'table table-striped table-bordered'], // Basic table styling
    ]); ?>

</div>