<?php
/**
 * Created by Jakob
 * Date: 19-09-13
 * Time: 15:01
 */

namespace simpletree\foundation5;


use yii\base\InvalidConfigException;

class CheckboxSwitch extends Widget{

    public $name;
    public $onLabel = 'on';
    public $offLabel = 'off';
    public $onValue = 1;
    public $offValue = 0;

    public $options = array();

    public function run()
    {
        if(!$this->name)
            throw new InvalidConfigException('$name can\'t be empty in ' . __FILE__ );
        echo $this->renderCheckboxSwitch();
    }

    public function renderCheckboxSwitch()
    {
        Html::addCssClass($this->options, 'switch');

        $idOff = $this->id.'_off';
        $idOn = $this->id.'_on';
        $this->options['id'] = $this->id;

        $html = array(
            'offInput' => Html::radio($this->name, 'checked', array('value'=>$this->offValue, 'id'=>$idOff)),
            'offLabel' => Html::label($this->offLabel, $idOff),
            'onInput' => Html::radio($this->name, 'checked', array('value'=>$this->onValue, 'id'=>$idOn)),
            'onLabel' => Html::label($this->onLabel, $idOn),
            'span' => Html::tag('span')
        );

        return Html::tag('div', implode('', $html), $this->options);

    }

} 