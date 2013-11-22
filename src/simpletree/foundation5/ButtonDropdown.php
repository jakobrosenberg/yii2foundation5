<?php
/**
 * Created by Jakob
 * Date: 12-09-13
 * Time: 22:36
 */

namespace simpletree\foundation5;

use simpletree\foundation5\Button;
use simpletree\foundation5\Widget;
use simpletree\foundation5\Html;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

class ButtonDropdown extends Widget
{
    /**
     * @var array list of buttons. Each array element represents a single button
     * which can be specified as a string or an array of the following structure:
     *
     * - label: string, required, the button label.
     * - options: array, optional, the HTML attributes of the button.
     */
    public $buttons = array();

    /**
     * @var array options that apply to all buttons
     */
    public $buttonsOptions = array();

    /**
     * @var boolean whether to HTML-encode the button labels.
     */
    public $encodeLabels = true;

    /**
     * @var bool splits the first button from the rest
     */
    public $split = false;

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->registerPlugin('dropdown');
        echo $this->renderButtons();
    }

    /**
     * Generates the buttons that compound the group as specified on [[items]].
     * @return string the rendering result.
     * @throws \yii\base\InvalidConfigException
     */
    protected function renderButtons()
    {
        $links = array();
        if(!$this->buttons)
            throw new InvalidConfigException('$buttons must be configured in '.get_class($this));
        foreach ($this->buttons AS $k => $button)
        {
            $button['label'] = ArrayHelper::getValue($button, 'label');
            $button['options'] = ArrayHelper::getValue($button, 'options', array());
            $button['url'] = ArrayHelper::getValue($button, 'url', '#');

            $button['label'] = $this->encodeLabels ? Html::encode($button['label']) : $button['label'];

            if(!isset($primaryButton)){
                $primaryButton = $this->split ? $this->renderSplitButton($button) : $this->renderSingleButton($button);
            }else{
                $link = Html::a($button['label'], $button['url'], $button['options']);
                $links[] = Html::tag('li', $link);
            }
        }

        $linksOptions = array('id'=>'drop'.$this->id, 'class'=>'f-dropdown');

        if($this->split)
            $linksOptions['data-dropdown-content'] = true;


        $links = Html::tag('ul', implode("\n", $links), $linksOptions);

        return $primaryButton."\n".$links;
    }

    /**
     * @param $button
     * @return string
     */
    public function renderSplitButton($button)
    {
        $options = ArrayHelper::merge($this->options, $button['options']);
        Html::addCssClass($options, 'button split');
        $span = Html::tag('span', null, array('data-dropdown'=>'drop'.$this->id));
        return Html::a($button['label'] . $span, $button['url'], $options);
    }

    /**
     * @param $button
     * @return string
     */
    public function renderSingleButton($button)
    {
        $options = ArrayHelper::merge($this->options, $button['options']);
        Html::addCssClass($options, 'button dropdown');
        $options['data-dropdown'] = 'drop'.$this->id;
        return Html::a($button['label'], $button['url'], $options);
    }
}
