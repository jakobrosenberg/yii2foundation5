<?php
/**
 * Created by Jakob
 * Date: 09-09-13
 * Time: 15:07
 */

namespace simpletree\foundation5;

use simpletree\foundation5\Html;


class ActiveField extends \yii\widgets\ActiveField{

    public $switchOnLabel = 'On';
    public $switchOffLabel = 'Off';
    public $switchOnValue = 1;
    public $switchOffValue = 0;

    /**
     * @var array the default options for the error tags. The parameter passed to [[error()]] will be
     * merged with this property when rendering the error tag.
     * The following special options are recognized:
     *
     * - tag: the tag name of the container element. Defaults to "div".
     */
    public $errorOptions = array(
        'tag' => 'small',
        'class' => 'help-block'
    );
    /**
     * @var array the default options for the label tags. The parameter passed to [[label()]] will be
     * merged with this property when rendering the label tag.
     */
    public $labelOptions = array('class' => '');

    /**
     * @var array the HTML attributes (name-value pairs) for the field container tag.
     * The values will be HTML-encoded using [[Html::encode()]].
     * If a value is null, the corresponding attribute will not be rendered.
     * The following special options are recognized:
     *
     * - tag: the tag name of the container element. Defaults to "div".
     */
    public $options = array(
        'class' => 'form-group',
    );

    /**
     * @var string the template that is used to arrange the label, the input field, the error message and the hint text.
     * The following tokens will be replaced when [[render()]] is called: `{label}`, `{input}`, `{error}` and `{hint}`.
     */
    public $template = "{label}\n{input}\n{error}\n{hint}";
//    public $template = "<div class='large-12 columns'>{label}\n{input}\n{error}\n{hint}</div>";


    /**
     * Renders prefixText for an input field.
     * Examples:
     * $form->field($model, 'url')->textInput()->prefixText('http://');
     * $form->field($model, 'url')->textInput()->prefixText('http://', 3, 9, 'prefix radius');
     * $form->field($model, 'url')->textInput()->prefixText('http://', 'small-3 columns', 'small-9 columns', 'prefix radius');
     * $form->field($model, 'url')->textInput()->prefixText('http://', array('class'=>'small-3 columns'), 9);
     * @param string $prefix
     * @param mixed $prefixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @param string $class Defaults to "prefix".
     * @return $this
     */
    public function prefixText($prefix, $prefixSize = 2, $contentSize = null, $class="prefix")
    {
        $this->parts['{input}'] = Html::prefixText($prefix, $this->parts['{input}'], $prefixSize, $contentSize, $class);
        return $this;
    }

    /**
     * Renders a prefixButton for an input field.
     * Examples:
     * $form->field($model, 'url')->textInput()->prefixButton('Home', '/';
     * $form->field($model, 'url')->textInput()->prefixButton('Home', '/', array('class'=>'postfix radius'), 3, 9);
     * $form->field($model, 'url')->textInput()->prefixButton('Home', array(site/index), array(), 'small-3 columns', 'small-9 columns');
     * $form->field($model, 'url')->textInput()->prefixButton('Home', array(site/index), array(), array('class'=>'small-3 columns'), 9);
     * @param string $prefix
     * @param mixed $url url for prefix button
     * @param array $options HtmlOptions for prefix button
     * @param mixed $prefixSize use integer to set size, string to set class or array to use as htmlOptions
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions
     * @return $this
     */
    public function prefixButton($prefix, $url = null, $options = array(), $prefixSize = 2, $contentSize = null)
    {
        $this->parts['{input}'] = Html::prefixButton($prefix, $url, $options, $this->parts['{input}'], $prefixSize, $contentSize);
        return $this;
    }

    /**
     * Renders suffixText for an input field.
     * Examples:
     * $form->field($model, 'url')->textInput()->suffixText('http://');
     * $form->field($model, 'url')->textInput()->suffixText('http://', 3, 9, 'postfix radius');
     * $form->field($model, 'url')->textInput()->suffixText('http://', 'small-3 columns', 'small-9 columns', 'postfix radius');
     * $form->field($model, 'url')->textInput()->suffixText('http://', array('class'=>'small-3 columns'), 9);
     * @param string $suffix
     * @param mixed $suffixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @param string $class Defaults to "postfix".
     * @return $this
     */
    public function suffixText($suffix, $suffixSize = 2, $contentSize = null, $class="postfix")
    {
        $this->parts['{input}'] = Html::suffixText($suffix, $this->parts['{input}'], $suffixSize, $contentSize, $class);
        return $this;
    }

    /**
     * Renders a suffixButton for an input field.
     * Examples:
     * $form->field($model, 'url')->textInput()->suffixButton('Home', '/';
     * $form->field($model, 'url')->textInput()->suffixButton('Home', '/', array('class'=>'postfix radius'), 3, 9);
     * $form->field($model, 'url')->textInput()->suffixButton('Home', array(site/index), array(), 'small-3 columns', 'small-9 columns');
     * $form->field($model, 'url')->textInput()->suffixButton('Home', array(site/index), array(), array('class'=>'small-3 columns'), 9);
     * @param string $suffix
     * @param mixed $url url for suffix button
     * @param array $options HtmlOptions for suffix button
     * @param mixed $suffixSize use integer to set size, string to set class or array to use as htmlOptions
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions
     * @return $this
     */
    public function suffixButton($suffix, $url = null, $options = array(), $suffixSize = 2, $contentSize = null)
    {
        $this->parts['{input}'] = Html::suffixButton($suffix, $url, $options, $this->parts['{input}'], $suffixSize, $contentSize);
        return $this;
    }

    //TODO update to include dynamic options
    public function checkboxSwitch($options = array())
    {
        if (!isset($options['label'])) {
            $options['label'] = Html::encode($this->model->getAttributeLabel($this->attribute));
        }

        $name = Html::getInputName($this->model, $this->attribute);
        if(!isset($options['id']))
            $options['id'] = Html::getInputId($this->model, $this->attribute);



        $this->parts{'{input}'} = Html::checkboxSwitch($name, $options);
        return $this;
    }


    /**
     * Renders a switch list.
     * A switch list is like a checkbox list, except that it only allows only two options and a single selection.
     * The selection of the switch list is taken from the value of the model attribute.
     * @param array $items the data item used to generate the two switch states.
     * The array must consist of exactly two pairs where keys are the labels, while the array values are the corresponding radio button values.
     * Note that the labels will NOT be HTML-encoded, while the values will.
     * @param array $options options (name => config) for the radio button list. The following options are specially handled:
     *
     * - item: callable, a callback that can be used to customize the generation of the HTML code
     *   corresponding to a single item in $items. The signature of this callback must be:
     *
     * ~~~
     * function ($index, $label, $name, $checked, $value)
     * ~~~
     *
     * where $index is the zero-based index of the radio button in the whole list; $label
     * is the label for the radio button; and $name, $value and $checked represent the name,
     * value and the checked status of the radio button input.
     * @return ActiveField the field object itself
     */
    public function switchList($items, $options = array())
    {
        $this->parts['{input}'] = Html::activeSwitchList($this->model, $this->attribute, $items, $options);
        return $this;
    }
}