<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace simpletree\foundation5;

//use simpletree\foundation5\Html;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Nav renders a nav HTML component.
 *
 * For example:
 *
 *
 * ```php
 * echo Nav::widget(array(
 *     'options' => array('class' => 'left'),
 *     'items' => array(
 *         array(
 *             'label' => 'Home',
 *             'url' => array('site/index'),
 *             'linkOptions' => array(...),
 *         ),
 *         '<li class="divider hide-for-small"></li>'
 *         array(
 *             'label' => 'Dropdown',
 *             'items' => array(
 *                  array(
 *                      'label' => 'Level 1 -DropdownA',
 *                      'url' => '#',
 *                      'items' => array(
 *                          array(
 *                              'label' => 'Level 2 -DropdownA',
 *                              'url' => '#',
 *                          ),
 *                      ),
 *                  ),
 *                  array(
 *                      'label' => 'Level 1 -DropdownB',
 *                      'url' => '#',
 *                  ),
 *             ),
 *         ),
 *     ),
 * ));
 * echo Nav::widget(array(
 *     'options' => array('class' => 'right'),
 *     'items' => array(
 *         array(
 *             'label' => 'User',
 *             'url' => array('user/index'),
 *             'linkOptions' => array(...),
 *         ),
 *     ),
 * ));
 * ```
 *
 * This file was originally written for Bootstrap by Antonio Ramirez <amigo.cobos@gmail.com>
 * To ease compatibility and transition as little as possible has been altered.
 *
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 */
class Nav extends NavigationBaseWidget
{



	/**
	 * Renders widget items.
	 */
	public function renderItems($rawItems, $level = 0)
	{
		foreach ($rawItems as $item) {
			$items[] = $this->renderItem($item);
		}

        $options = $level ? array('class'=>'dropdown '.$level) : $this->options;

		return Html::tag('ul', implode("\n", $items), $options);
	}

	/**
	 * Renders a widget's item.
	 * @param array $item the item to render.
	 * @return string the rendered result.
	 */
	public function renderItem($item)
	{
		if(!$item['html'])
        {
            if ($item['active']) {
                Html::addCssClass($item['options'], 'active');
            }

            if ($item['items']){
                Html::addCssClass($item['options'], 'has-dropdown');
                $item['items'] = $this->renderItems($item['items'], $item['nestLevel']+1);
            }

            $a = Html::a($item['label'], $item['url'], $item['linkOptions']);
        }else{
            $a = $item['html'];
        }



        return Html::tag('li', $a . $item['items'], $item['options']);
	}


}
