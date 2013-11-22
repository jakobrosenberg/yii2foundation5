<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @author Jakob Rosenberg
 */

namespace simpletree\foundation5;

use simpletree\foundation5\Html;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use simpletree\foundation5\Nav;
 * use simpletree\foundation5\NavBar;
 *
 * NavBar::begin(
 *     array(
 *         'brandLabel' => 'NavBar Test',
 *         'brandUrl' => Yii::$app->homeUrl,
 *         'sticky' => true
 * ));
 * echo Nav::widget(array(
 *     'options' => array('class'=>'left'),
 *     'items' => array(
 *         array('label' => 'About', 'url' => array('/site/about')),
 *     ),
 * ));
 * echo Nav::widget(array(
 *     'options' => array('class'=>'right'),
 *     'items' => array(
 *         array('label' => 'User', 'url' => array('/user/view')),
 *         '<li class="divider hide-for-small"></li>',
 *         array('label' => 'About', 'url' => array('/site/about')),
 *     ),
 * ));
 * NavBar::end();
 * ```
 *
 * This file was originally written for Bootstrap by Antonio Ramirez <amigo.cobos@gmail.com>
 * To ease compatibility as little as possible has been altered.
 *
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 *
 */



class NavBar extends Widget
{
	/**
	 * @var string the text of the brand. Note that this is not HTML-encoded.
	 */
	public $brandLabel;
	/**
	 * @param array|string $url the URL for the brand's hyperlink tag. This parameter will be processed by [[Html::url()]]
	 * and will be used for the "href" attribute of the brand link. Defaults to site root.
	 */
	public $brandUrl = '/';
	/**
	 * @var array the HTML attributes of the brand link.
	 */
	public $brandOptions = array();

    /**
     * @var string the menu label on small screens
     */
    public $screenReaderToggleText = 'Menu';

    /**
     * @var bool wether the topbar is fixed at the top when scrolling down
     */
    public $sticky = false;

    /**
     * @var bool whether the topbar
     */
    public $containToGrid = false;

    /**
     * @var bool whether to disable dropdown on hover
     */
    public $disableHover = false;

    /**
     * @var array options for the topbar wrapper
     */
    public $containerOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
		$this->clientOptions = false;
		Html::addCssClass($this->options, 'top-bar');
		Html::addCssClass($this->brandOptions, 'navbar-brand');
		if (empty($this->options['role'])) {
			$this->options['role'] = 'navigation';
		}


        if($this->disableHover)
            $this->options['data-options'] ='is_hover:false';
        if($this->sticky){
            Html::addCssClass($this->containerOptions, 'sticky');
        }
        if($this->containToGrid){
            Html::addCssClass($this->containerOptions, 'contain-to-grid');
        }

        echo Html::beginTag('div', $this->containerOptions);
		echo Html::beginTag('nav', $this->options);
		echo Html::beginTag('ul', array('class' => 'title-area'));

        if ($this->brandLabel !== null) {
            echo $this->renderTitleArea();
        }

        echo $this->renderToggleButton();

        echo Html::endTag('ul');
        echo Html::beginTag('section', array('class' => 'top-bar-section'));
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{

		echo Html::endTag('section');

		echo Html::endTag('nav');
        echo Html::endTag('div');

        $this->registerPlugin('topbar');
	}

	/**
	 * Renders collapsable toggle button.
	 * @return string the rendering toggle button.
	 */
	protected function renderToggleButton()
	{
        echo Html::beginTag('li', array('class'=>'toggle-topbar menu-icon'));
        echo Html::beginTag('a', array('href'=>'#'));
        echo Html::tag('span', $this->screenReaderToggleText);
        echo Html::endTag('a');
        echo Html::endTag('li');
	}

    /**
     * Renders Title/Brand area
     * @return string the rendering title/brand area
     */
    protected function renderTitleArea()
    {
        echo Html::beginTag('li', array('class' => 'name'));
        echo Html::beginTag('h1');
        echo Html::a($this->brandLabel, $this->brandUrl, $this->brandOptions);
        echo Html::endTag('h1');
        echo Html::endTag('li');
    }
}
