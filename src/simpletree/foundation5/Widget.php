<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace simpletree\foundation5;

use Yii;
use yii\web\View;
use yii\helpers\Json;

/**
 * \simpletree\foundation5\Widget is the base class for all Simpletree Foundation widgets.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Widget extends \yii\base\Widget
{
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
    //todo fix description
	public $options = array();
	/**
	 * @var array the options for the underlying Foundation JS plugin.
	 * Please refer to the corresponding Foundation plugin Web page for possible options.
	 */
    //todo fix description
	public $clientOptions = array();
	/**
	 * @var array the event handlers for the underlying Bootstrap JS plugin.
	 * Please refer to the corresponding Bootstrap plugin Web page for possible events.
	 * For example, [this page](http://twitter.github.io/bootstrap/javascript.html#modals) shows
	 * how to use the "Modal" plugin and the supported events (e.g. "shown").
	 */
	public $clientEvents = array();

    /**
     * @var boolean whether the nav items labels should be HTML-encoded.
     */
    public $encodeLabels = false;

    /**
	 * Initializes the widget.
	 * This method will register the foundation asset bundle. If you override this method,
	 * make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->getId();
		}
	}

    public function registerPlugin($name)
    {
        $view = $this->getView();
		call_user_func('\simpletree\foundation5\bundles\Foundation'.ucwords($name).'Asset::register', $view);
    }
}


