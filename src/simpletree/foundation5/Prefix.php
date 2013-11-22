<?php
/**
 * Created by Jakob
 * Date: 12-09-13
 * Time: 15:34
 */

namespace simpletree\foundation5;

use yii\base\InvalidConfigException;
use simpletree\foundation5\Widget;

class Prefix extends Widget
{
    public $label;
    public $url;
    public $options = array();
    public $content;
    public $dropdownButton;
//    public $buttons;
//    public $encodeLabels = true;
//    public $split = false;
//    public $buttonsOptions = array();
    public $size = 2;
    public $type = 'text'; //text, button, dropdownButton, html
    public $affixOrientation = 'prefix';

    public $foundationColumns = 12;



    /**
     * Renders the widget.
     */
    public function run()
    {
        if($this->type == 'text'){
            Html::addCssClass($this->options, $this->affixOrientation);
            $label = Html::tag('span', $this->label, $this->options);
        }elseif($this->type == 'button'){
            Html::addCssClass($this->options, 'button');
            Html::addCssClass($this->options, $this->affixOrientation);
            $label = Html::a($this->label, $this->url, $this->options);
        }elseif($this->type == 'dropdownButton'){
            Html::addCssClass($this->dropdownButton['buttons'][0]['options'], $this->affixOrientation);
            $label = ButtonDropdown::widget($this->dropdownButton);
        }elseif($this->type == 'html'){
            $label = $this->label;
        }else{
            throw new InvalidConfigException('type must be either text, button, dropdownButton or html');
        }


        echo $this->affixHtml($label, $this->content);

    }

    /**
     * Renders input with affix html
     * @param $affix
     * @param $content
     * @param int $affixSize
     * @param null $contentSize
     * @param $affixType
     * @return string
     * @throws \yii\base\InvalidCallException
     */
    private function affixHtml($label, $content)
    {
        $left = $this->createAffixContainer($this->size, $label);
        $right = $this->createAffixContainer(12-$this->size, $content);


        if($this->affixOrientation !== 'prefix')
            list($right, $left) = array($left, $right);

        return Html::tag('div', $left.$right, array('class'=>'row collapse'));
    }

    private function createAffixContainer($mixed, $content)
    {
        if(is_integer($mixed)){
            return Html::tag('div', $content, array('class'=>'small-'.$mixed.' columns'));
        }elseif(is_string($mixed)){
            return Html::tag('div', $content, array('class'=>$mixed));
        }elseif(is_array($mixed)){
            if(isset($mixed['tag'])){
                $tag = $mixed['tag'];
                unset($mixed['tag']);
            }
            return Html::tag($tag, $content, $mixed);
        }
        return false;
    }
} 