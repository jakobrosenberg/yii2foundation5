<?php
/**
 * Created by Jakob
 * Date: 09-09-13
 * Time: 12:05
 */

namespace simpletree\foundation5;

use Yii;
use yii\base\Model;
use simpletree\foundation5\Html;
use yii\helpers\ArrayHelper;
use simpletree\foundation5\ActiveField;

/**
 * Class ActiveForm
 * @package simpletree\foundation5
 */
class ActiveForm extends \yii\widgets\ActiveForm{
//
//    /**
//     * @var string the css class for the left side columns in inline fields.
//     * defaults to '3-large columns'.
//     */
//    public $inlineLeftCssClass = 'small-3 columns';
//
//    /**
//     * @var string the css class for the right side columns in inline fields.
//     * defaults to '9-large columns'.
//     */
//    public $inlineRightCssClass = 'small-9 columns';
//
//    /**
//     * @var array the options for the prefix container in prefix/suffix fields.
//     * defaults to '3-large columns'.
//     */
//    public $prefixLabelContainerClass = 'small-3 columns';
//
//    /**
//     * @var string the class for the suffix container in prefix/suffix fields.
//     * defaults to '3-large columns'.
//     */
//    public $suffixLabelContainerClass = 'small-3 columns';
//
//    /**
//     * @var string the class for the input container in prefix fields.
//     * defaults to '3-large columns'.
//     */
//    public $prefixInputContainerClass = 'small-9 columns';
//
//    /**
//     * @var string the class for the input container in suffix fields.
//     * defaults to '3-large columns'.
//     */
//    public $suffixInputContainerClass = 'small-9 columns';
//
//    /**
//     * @var string
//     */
//    public $prefixClass = 'prefix radius';
//
//    /**
//     * @var string
//     */
//    public $suffixClass = 'postfix radius';


//    /**
//     * @var string
//     */
//    public $errorCssClass = 'error';

//    /**
//     * @var array
//     */
//    public $prefixOptions = array();

//    /**
//     * @var string
//     */
//    public $rowTemplate = '<div class="row">{content}</div>';

    /**
     * @var string
     */
//    public $template = "<div class='large-12 columns'>{label}\n{input}\n{error}</div>\n";

    /**
     * @var string the template for inline fields
     */
    public $inlineTemplate = "<div class='small-3 columns'>{label}</div>\n<div class='small-9 columns'>{input}\n{error}</div>\n";

    /**
     * @var string
     */
    public $prefixTemplate = "<div class='small-3 columns'><span class='prefix radius'>{label}</span></div>\n<div class='small-9 columns'>{input}\n{error}</div>\n";

    /**
     * @var string
     */
    public $suffixTemplate = "<div class='small-9 columns'>{input}\n{error}</div>\n<div class='small-3 columns'><span class='postfix radius'>{label}</span></div>\n";

    /**
     * @var string
     */
    public $collapseTemplate = "<div class='large-12 columns'><div class='row collapse'>{content}</div></div>";

    public function init()
    {
        $this->registerCss();
        if(!isset($this->options['class']))
            $this->options['class'] = 'custom';
        $this->fieldConfig['class'] = ActiveField::className();
        parent::init();
    }

    /**
     * Generates an inline form field.
     * A form field is associated with a model and an attribute. It contains a label, an input and an error message
     * and use them to interact with end users to collect their inputs for the attribute.
     * @param Model $model the data model
     * @param string $attribute the attribute name or expression. See [[Html::getAttributeName()]] for the format
     * about attribute expression.
     * @param array $options the additional configurations for the field object
     * @return ActiveField the created ActiveField object
     * @see fieldConfig
     */
    public function fieldInline($model, $attribute, $options = array()){

        $options['template'] = $this->inlineTemplate;

        Html::addCssClass($options['labelOptions'], 'inline right');

        return $this->field($model, $attribute, $options);
    }



    /**
     * @param $model
     * @param $attribute
     * @param array $options
     * @return ActiveField
     */
    public function fieldPrefix($model, $attribute, $options = array())
    {
//        $options = ArrayHelper::merge(array(
//            'template' => $this->assembleTemplates(array(
//                $this->prefixTemplate,
//                $this->collapseTemplate)),
////            'parts' => array(
////                '{prefixClass}' => $this->prefixClass,
////                '{labelClass}' => $this->prefixLabelContainerClass,
////                '{inputClass}' => $this->prefixInputContainerClass)
//            ), $options);

//        $options['template'] = strtr($this->collapseTemplate, array('{content}' => $this->prefixTemplate));
        $options['template'] = $this->prefixTemplate;
        Html::addCssClass($options['options'], 'row collapse');


        return $this->field($model, $attribute, $options);
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $options
     * @return ActiveField
     */
    public function fieldSuffix($model, $attribute, $options = array())
    {
//        $options = ArrayHelper::merge(array(
//            'template' => $this->assembleTemplates(array(
//                $this->suffixTemplate,
//                $this->collapseTemplate,
//            )),
////            'parts' => array(
////                '{suffixClass}' => $this->suffixClass,
////                '{labelClass}' => $this->suffixLabelContainerClass,
////                '{inputClass}' => $this->prefixInputContainerClass)
//            ), $options);

//        $options['template'] = strtr($this->collapseTemplate, array('{content}' => $this->suffixTemplate));

        $options['template'] = $this->suffixTemplate;
        Html::addCssClass($options['options'], 'row collapse');

        return $this->field($model, $attribute, $options);
    }

    /**
     * Merge templates. Start with the innermost templates
     * example: array(
     *  'innerTemplate',
     *  'middleTemplate',
     *  'outerTemplate'
     * )
     * @param $templates array
     * @return string
     */
    public function assembleTemplates($templates)
    {
        $template = array_shift($templates);
        foreach ($templates AS $templatePart)
            $template = strtr($templatePart, array('{input}' => $template));
        return $template;
    }

//    /**
//     * Generates a form field.
//     * A form field is associated with a model and an attribute. It contains a label, an input and an error message
//     * and use them to interact with end users to collect their inputs for the attribute.
//     * @param Model $model the data model
//     * @param string $attribute the attribute name or expression. See [[Html::getAttributeName()]] for the format
//     * about attribute expression.
//     * @param array $options the additional configurations for the field object
//     * @return ActiveField the created ActiveField object
//     * @see fieldConfig
//     */
//    public function field($model, $attribute, $options = array())
//    {
//
////        if(!isset($options['options']['class']))
////            $options['options']['class']='row';
////        if(!isset($options['template']))
////            $options['template'] = $this->template;
////        $options['errorOptions']['tag'] = 'small';
////        $options['errorOptions']['class'] = 'error';
//
//        return parent::field($model, $attribute, $options);
//    }

    public function registerCss()
    {
//        $this->view->registerCss(
//            'form div small.error {display: none}'.
//            'form div.error small.error {display: block}'
//        );
    }
} 