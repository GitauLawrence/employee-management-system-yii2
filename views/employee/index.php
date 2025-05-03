<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider; // Added this line

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */ // Updated this line

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <div class="call-to-action">
        <div class="cta-text">
            <h3>Empower Your Workforce</h3>
            <p>Manage employee information efficiently and streamline your HR processes.</p>
        </div>
        <?= Html::a('Learn More', '#', ['class' => 'btn btn-primary cta-button']) ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider, // Changed this line
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
            ],
        ],
    ]); ?>

</div>