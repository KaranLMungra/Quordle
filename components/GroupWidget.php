<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;


class GroupWidget extends Widget
{
    public $group = [];
    public function init()
    {
        $DEF_GROUP = [['color' => 'grey', 'alphabet' => ' '], ['color' => 'grey', 'alphabet' => ' '], ['color' => 'grey', 'alphabet' => ' '], ['color' => 'grey', 'alphabet' => ' '], ['color' => 'grey', 'alphabet' => ' ']];
        parent::init();
        if ($this->group === null) {
            $this->group = $DEF_GROUP;
        }
    }

    public function run()
    {
        return $this->render('group', ['group' => $this->group]);
    }
}
