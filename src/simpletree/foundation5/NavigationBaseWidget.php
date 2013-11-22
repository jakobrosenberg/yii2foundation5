<?php
/**
 * Created by Jakob
 * Date: 18-09-13
 * Time: 12:32
 */

namespace simpletree\foundation5;

use Yii;
use yii\helpers\ArrayHelper;

class NavigationBaseWidget extends Widget{

    public $itemOptions = array();
    public $firstItemIsTitle = false;

    /**
     * @var array list of items in the nav widget. Each array element represents a single
     * menu item with the following structure:
     *
     * - label: string, required, the nav item label.
     * - url: optional, the item's URL. Defaults to "#".
     * - visible: boolean, optional, whether this menu item is visible. Defaults to true.
     * - linkOptions: array, optional, the HTML attributes of the item's link.
     * - options: array, optional, the HTML attributes of the item container (LI).
     * - active: boolean, optional, whether the item should be on active state or not.
     * - items: array|string, optional, the configuration array for creating a [[Dropdown]] widget,
     *   or a string representing the dropdown menu. Note that Bootstrap does not support sub-dropdown menus.
     */
    public $items = array();

    /**
     * @var string the route used to determine if a menu item is active or not.
     * If not set, it will use the route of the current request.
     * @see params
     * @see isItemActive
     */
    public $route;

    /**
     * @var boolean whether to automatically activate items according to whether their route setting
     * matches the currently requested route.
     * @see isItemActive
     */
    public $activateItems = true;

    /**
     * @var array the parameters used to determine if a menu item is active or not.
     * If not set, it will use `$_GET`.
     * @see route
     * @see isItemActive
     */
    public $params;

    /**
     * @var string default value for empty item strings
     */
    public $emptyItemString = '';


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = $_GET;
        }
    }

    /**
     * Renders the widget
     */
    public function run()
    {
        $items = $this->normalizeItems($this->items);

        echo  $this->renderItems($items);
    }

    /**
     * Renders items
     * @param $items
     */
    public function renderItems($items)
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag');

        echo Html::beginTag($tag, $options);

        //render title
        if($this->firstItemIsTitle){
            $title = array_shift($items);
            echo Html::tag('dt',$title['label']);
        }

        //render items
        foreach ($items AS $item){
            $this->renderItem($item);
        }

        echo Html::endTag($tag);
    }

    /**
     * Renders an item
     * @param $item
     */
    public function renderItem($item)
    {

        if($item['active'])
            Html::addCssClass($item['options'], 'active');
        $tag = ArrayHelper::remove($item['options'], 'tag');


        echo Html::beginTag($tag, $item['options']);
        if($item['html'] !== null){
            echo $item['html'];
        }else{
            echo Html::a($item['label'], $item['url']);
        }
        echo Html::endTag($tag);
    }

    /**
     * Returns a normalized array of items
     * @param $disorderedItems
     * @param $level
     * @return array
     */
    public function normalizeItems($disorderedItems, $level = -1)
    {
        $level++;
        $items = array();
        foreach($disorderedItems AS $item)
        {
            if(!$item)
                $item = $this->emptyItemString;

            if(is_string($item)){
                $item = array('url'=>'#', 'html'=>$item);
            }

            if(isset($item['visible']) && !$item['visible'])
                continue;

            $item = array_merge(array(
                    'label' => 'undefined label',
                    'url' => '#',
                    'options' => array(),
                    'active' => false,
                    'visible' => true,
                    'nestLevel' => $level,
                    'items' => null,
                    'html' => null,
                    'linkOptions' => array(),
                    'active' => $this->isItemActive($item),
                ), $item);

            $item['options'] = array_merge($this->itemOptions, $item['options']);

            if($this->encodeLabels)
                $item['label'] = Html::encode($item['label']);

            if(isset($item['items']))
                $item['items'] = $this->normalizeitems($item['items'], $level);

            $items[] = $item;
        }
        return $items;
    }

    /**
     * Checks whether a menu item is active.
     * This is done by checking if [[route]] and [[params]] match that specified in the `url` option of the menu item.
     * When the `url` option of a menu item is specified in terms of an array, its first element is treated
     * as the route for the item and the rest of the elements are the associated parameters.
     * Only when its route and parameters match [[route]] and [[params]], respectively, will a menu item
     * be considered active.
     * @param array $item the menu item to be checked
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== $this->route) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if (!isset($this->params[$name]) || $this->params[$name] != $value) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
} 