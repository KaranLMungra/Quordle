<?php
namespace app\components;

use yii\base\Widget;

class SquareWidget extends Widget {
    public string $color;
    public string $alphabet;
    public function init()
    {
        parent::init();
        if($this->color === null) {
            $this->color = 'grey';
        }
        if($this->alphabet === null) {
            $this->alphabet = ' ';
        }
    }

    public function run() {
        return $this->render('square', ['color' => $this->color . '-sq', 'alpha' => $this->alphabet]);
    }
}