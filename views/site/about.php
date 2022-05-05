<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\components\GroupWidget;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$group = [
    ['color' => 'green', 'alphabet' => 'B'],
    ['color' => 'yellow', 'alphabet' => 'E'],
    ['color' => 'green', 'alphabet' => 'A'],
    ['color' => 'yellow', 'alphabet' => 'R'],
    ['color' => 'grey', 'alphabet' => 'S']
];
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
        </p>
    <?= GroupWidget::widget(['group' => $group])?>
    <br/>
    <code><?= __FILE__ ?></code>
</div>
