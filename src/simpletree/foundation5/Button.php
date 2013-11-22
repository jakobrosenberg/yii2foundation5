<?php
/**
 * Created by Jakob
 * Date: 12-09-13
 * Time: 22:14
 */

namespace simpletree\foundation5;

use simpletree\foundation5\Html;

/**
 * Button renders a bootstrap button.
 *
 * For example,
 *
 * echo Button::widget(array(
 *     'label' => 'Action',
 *     'url' => '#',
 *     'options' => array('class' => 'round'),
 * ));
 * @see http://twitter.github.io/bootstrap/javascript.html#buttons
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class Button extends Widget
{
    /**
     * @var mixed the button url
     */
    public $url;

    /**
     * @var string the button label
     */
    public $label = 'Button';
    /**
     * @var boolean whether the label should be HTML-encoded.
     */
    public $encodeLabel = true;

    /**
     * @var string the tag used to render the button
     */
    public $tagName = 'a';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
        if($this->url)
            $this->options['href'] = static::url($this->url);
        Html::addCssClass($this->options, 'button');
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        echo Html::tag($this->tagName, $label, $this->options);
    }
}
