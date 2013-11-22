<?php
/**
 * Created by Jakob
 * Date: 10-09-13
 * Time: 09:45
 */

namespace simpletree\foundation5;



use yii\base\InvalidCallException;

class Html extends \yii\helpers\Html
{
    static $foundationColumns = 12;

    /**
     * Renders prefixText for an input field.
     * Examples:
     * Html('http://', '<input type="text">');
     * Html('http://', '<input type="text">', 3, 9, 'prefix radius');
     * Html('http://', '<input type="text">', 'small-3 columns', 'small-9 columns', 'prefix radius');
     * Html('http://', '<input type="text">', array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param string $content
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @param string $class Defaults to "prefix".
     * @return $this
     */
    static function prefixText($affix, $content, $affixSize = 2, $contentSize = null, $class="prefix")
    {
        return self::affixText($affix, $content, $affixSize, $contentSize, $class, 'prefix');
    }

    /**
     * Renders prefixHtml for an input field.
     * Examples:
     * Html::prefixText('<span class="prefix">http://</span>', '<input type="text">');
     * Html::prefixText('<span class="prefix">http://</span>', '<input type="text">', 3, 9, 'prefix radius');
     * Html::prefixText('<span class="prefix">http://</span>', '<input type="text">', 'small-3 columns', 'small-9 columns', 'prefix radius');
     * Html::prefixText('<span class="prefix">http://</span>', '<input type="text">', array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param string $content
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @return $this
     */
    static function prefixHtml($affix, $content, $affixSize = 2, $contentSize = null)
    {
        return self::affixHtml($affix, $content, $affixSize, $contentSize, 'prefix');
    }

    /**
     * Renders a prefixButton for an input field.
     * Examples:
     * Html::prefixButton('Home', '/', false, '<input type="text">');
     * Html::prefixButton('Home', '/', false, '<input type="text">' 3);
     * Html::prefixButton('Home', '/', false, '<input type="text">' 3, 9);
     * Html::prefixButton('Home', array(site/index), array('class'=>'prefix radius'), '<input type="text">' array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param mixed $url url for prefix button
     * @param array $options HtmlOptions for prefix button
     * @param array $content HtmlOptions for prefix button
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 0.
     * @return $this
     */
    static function prefixButton($affix, $url = null, $options, $content, $affixSize = 2, $contentSize = null)
    {
        return self::affixButton($affix, $url, $options, $content, $affixSize, $contentSize, 'prefix');
    }

    /**
     * Renders suffixText for an input field.
     * Examples:
     * Html('http://', '<input type="text">');
     * Html('http://', '<input type="text">', 3, 9, 'postfix radius');
     * Html('http://', '<input type="text">', 'small-3 columns', 'small-9 columns', 'postfix radius');
     * Html('http://', '<input type="text">', array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param string $content
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @param string $class Defaults to "suffix".
     * @return $this
     */
    static function suffixText($affix, $content, $affixSize = 2, $contentSize = null, $class="postfix")
    {
        return self::affixText($affix, $content, $affixSize, $contentSize, $class, 'suffix');
    }

    /**
     * Renders suffixHtml for an input field.
     * Examples:
     * Html::suffixText('<span class="suffix">http://</span>', '<input type="text">');
     * Html::suffixText('<span class="suffix">http://</span>', '<input type="text">', 3, 9, 'postfix radius');
     * Html::suffixText('<span class="suffix">http://</span>', '<input type="text">', 'small-3 columns', 'small-9 columns', 'postfix radius');
     * Html::suffixText('<span class="suffix">http://</span>', '<input type="text">', array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param string $content
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to null.
     * @return $this
     */
    static function suffixHtml($affix, $content, $affixSize = 2, $contentSize = null)
    {
        return self::affixHtml($affix, $content, $affixSize, $contentSize, 'suffix');
    }

    /**
     * Renders a suffixButton for an input field.
     * Examples:
     * Html::suffixButton('Home', '/', false, '<input type="text">');
     * Html::suffixButton('Home', '/', false, '<input type="text">' 3);
     * Html::suffixButton('Home', '/', false, '<input type="text">' 3, 9);
     * Html::suffixButton('Home', array(site/index), array('class'=>'postfix radius'), '<input type="text">' array('class'=>'small-3 columns'), 9);
     * @param string $affix
     * @param mixed $url url for suffix button
     * @param array $options HtmlOptions for suffix button
     * @param array $content HtmlOptions for suffix button
     * @param mixed $affixSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 2.
     * @param mixed $contentSize use integer to set size, string to set class or array to use as htmlOptions. Defaults to 0.
     * @return $this
     */
    static function suffixButton($affix, $url = null, $options, $content, $affixSize = 2, $contentSize = null)
    {
        return self::affixButton($affix, $url, $options, $content, $affixSize, $contentSize, 'suffix');
    }

    /**
     * Renders input with affix
     * @param $affix
     * @param $content
     * @param int $affixSize
     * @param null $contentSize
     * @param $class
     * @param $affixType
     * @return string
     */
    static function affixText($affix, $content, $affixSize = 2, $contentSize = null, $class, $affixType)
    {
        $affixElement = Html::tag('span', $affix, array('class'=>$class));

        return self::affixHtml($affixElement, $content, $affixSize, $contentSize, $affixType);
    }

    /**
     * Renders input with affix button
     * @param $affix
     * @param null $url
     * @param $options
     * @param $content
     * @param int $affixSize
     * @param null $contentSize
     * @param $affixType
     * @return string
     */
    static function affixButton($affix, $url = null, $options, $content, $affixSize = 2, $contentSize = null, $affixType)
    {
        if ($url !== null) {
            $options['href'] = self::url($url);
        }
        if (!isset($options['class']))
            $options['class'] = 'button '.str_replace('suffix','postfix',$affixType);

        $affixElement = Html::a($affix, $url, $options);

        return self::affixHtml($affixElement, $content, $affixSize, $contentSize, $affixType);
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
    static function affixHtml($affix, $content, $affixSize = 2, $contentSize = null, $affixType)
    {
        if(!$affixSize)
            throw new InvalidCallException('$affixSize can\'t be empty');

        if(is_integer($affixSize) && !$contentSize)
            $contentSize = self::$foundationColumns-$affixSize;

        if(!$contentSize)
            throw new InvalidCallException('$contentSize can only be empty if $affixSize is integer');

        $left = self::CreateAffixContainer($affixSize, $affix);
        $right = self::CreateAffixContainer($contentSize, $content);
        if($affixType=='suffix')
            list($right, $left) = array($left, $right);

        return Html::tag('div', $left.$right, array('class'=>'row collapse'));
    }

    /**
     * Creates container for affixHtml
     * @param $mixed
     * @param $content
     * @return string
     */
    static function CreateAffixContainer($mixed, $content)
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
    }


    static function switchList($name, $selection = null, $items, $options = array())
    {
        $encode = !isset($options['encode']) || $options['encode'];
        $options['name'] = $name;
        Html::addCssClass($options, 'switch');

        if(!array_key_exists($selection, $items))
            $selection = key($items);

        $lines = array();
        foreach ($items as $value => $label) {
            $id = '_' . $value;
            $checked = $selection === $value;

            $labelHtml = Html::label($encode ? Html::encode($label) : $label, $id);
            $radioHtml = Html::radio($name, $checked, array('id'=>$id, 'value'=>$id));
            $lines[] = $radioHtml.$labelHtml;
        }


        return Html::tag('div', implode("\n", $lines) . Html::tag('span'), $options);
    }



    static function activeSwitchList($model, $attribute, $items, $options)
    {
        Html::addCssClass($options, 'switch');
        $name = isset($options['name']) ? $options['name'] : static::getInputName($model, $attribute);
        $checked = static::getAttributeValue($model, $attribute);
        if (!array_key_exists('id', $options)) {
            $options['id'] = static::getInputId($model, $attribute);
        }
        return static::switchList($name, $checked, $items, $options);
    }



} 