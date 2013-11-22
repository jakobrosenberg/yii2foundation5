<?php
/**
 * Created by Jakob
 * Date: 12-09-13
 * Time: 22:03
 */

namespace simpletree\foundation5;

use yii\helpers\ArrayHelper;
use simpletree\foundation5\Html;

/**
 * ButtonGroup renders a button group bootstrap component.
 *
 * For example,
 *
 * ```php
 * // a button group with items configuration
 * echo ButtonGroup::::widget(array(
 *     'even'=>true,
 *     'buttonOptions'=>array('class'=>'small'),
 *     'buttons' => array(
 *         array('label' => 'A'),
 *         array('label' => 'B'),
 *     )
 * ));
 *
 * // button group with an item as a string
 * echo ButtonGroup::::widget(array(
 *     'buttons' => array(
 *         Button::widget(array('label' => 'A')),
 *         array('label' => 'B'),
 *     )
 * ));
 * ```
 */
class ButtonGroup extends Widget
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
     * @var boolean whether to HTML-encode the button labels.
     */

    /**
     * @var array options that apply to all buttons
     */
    public $buttonOptions = array();

    /**
     * @var boolean whether to HTML-encode the button labels.
     */
    public $encodeLabels = true;

    /**
     * @var bool distribute buttons evenly
     */
    public $even = false;

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'button-group');
        if($this->even)
            Html::addCssClass($this->options, 'even-'.count($this->buttons));
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::tag('ul', $this->renderButtons(), $this->options);
    }

    /**
     * Generates the buttons that compound the group as specified on [[items]].
     * @return string the rendering result.
     */
    protected function renderButtons()
    {
        $buttons = array();
        foreach ($this->buttons as $button) {
            if (is_array($button)) {
                if(!isset($button['options']))
                    $button['options'] = array();
                $button['options'] = array_merge($this->buttonOptions, $button['options']);
                if(!isset($button['encodeLabels']))
                    $button['encodeLabel'] = $this->encodeLabels;
                $buttons[] = Html::tag('li',Button::widget($button));
            } else {
                $buttons[] = Html::tag('li',$button);
            }
        }
        return implode("\n", $buttons);
    }
}
