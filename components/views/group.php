<?php
    use yii\helpers\Html;
    use app\components\SquareWidget;
?>
    <div class="group">
    <?php foreach( $group as $sq ): ?>
        <?= SquareWidget::widget($sq) ?>
    <?php endforeach; ?>
    </div>
</div>