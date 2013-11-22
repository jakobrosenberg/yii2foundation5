<?php
/**
 * Created by Jakob
 * Date: 13-09-13
 * Time: 18:12
 */

namespace simpletree\foundation5;

use yii\base\ErrorException;
use yii\base\View;

class Reveal extends Widget{

    /**
     * @var string the link text
     */
    public $label;

    /**
     * @var array the link options
     */
    public $linkOptions;

    /**
     * @var string modal header
     */
    public $header = '';

    /**
     * @var string modal content
     */
    public $content = '';

    //TODO add ajax functionality

    /**
     * Initialize the widget
     * @throws \yii\base\ErrorException
     */
    public function init()
    {
        if(empty($this->label))
            throw new ErrorException('label can\'t be empty');
        $this->renderLink();
        ob_start();
        ob_implicit_flush(false);
        $this->renderOpeningTags();
        $this->renderContent();
        $this->registerPlugin('reveal');
        parent::init();

    }

    /**
     * run the widget
     */
    public function run()
    {
        $this->renderClosingTags();
        $block = ob_get_clean();
        $block = json_encode($block);
        $this->view->registerJs("$($block).appendTo('body');", View::POS_END);
    }

    /**
     * render the opening tags for the modal
     */
    public function renderOpeningTags()
    {
        $this->options['id'] = $this->id;
        Html::addCssClass($this->options, 'reveal-modal');
        echo Html::beginTag('div', $this->options);
    }

    /**
     * render content for the modal
     */
    public function renderContent()
    {
        if($this->header)
            echo Html::tag('h2', $this->header);
        if($this->content)
            echo Html::tag('p', $this->content);
    }

    /**
     * render closing tags for the modal
     */
    public function renderClosingTags()
    {
        echo Html::a('&#215;', '#', array('class'=>'close-reveal-modal'));
        echo Html::endTag('div');
    }

    /**
     * render the link that toggles the modal
     */
    public function renderLink()
    {
        $options = $this->linkOptions;
        $options['data-reveal-id'] = $this->id;
        echo Html::a($this->label, '#', $options);
    }


} 