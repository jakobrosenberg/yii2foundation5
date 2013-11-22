<?php
/**
 * Created by Jakob
 * Date: 18-09-13
 * Time: 08:18
 */

namespace simpletree\foundation5;

use Yii;
use simpletree\foundation5\Html;


class Magellan extends NavigationBaseWidget
{
    /**
     * Shifts the first item from the items list and renders it as the title
     * @var bool
     */
    public $firstItemIsTitle = false;

    public $options = array('tag'=>'dl','class'=>'sub-nav');

    public $itemOptions = array('tag'=>'dd');

    public function init()
    {
        $this->registerPlugin('magellan');

        foreach($this->items AS $k => $item){
            if(isset($item['url']) && is_string($item['url']) && $item['url']){
                $this->items[$k]['options']['data-magellan-arrival'] = preg_replace('/^#/','',$item['url']);
            }
        }
        echo Html::beginTag('div', array('data-magellan-expedition'=>'fixed'));
        parent::init();
    }

    public function run()
    {
        parent::run();
        echo Html::endTag('div');
    }
} 