<?php

/**
 * パンくずリストを生成
 */
class Breadcrumb
{
	/**
	 * パンくずの配列
	 * @var array
	 */
	private $items = array();

	/**
	 * コンストラクタ
	 * @param $name
	 * @param null $url
	 * @param null $icon
	 */
	public function __construct($name, $url = null, $icon = null)
	{
		$this->add_item($name, $url, $icon);
	}

	/**
	 * パンくずを追加
	 * @param $name
	 * @param null $url
	 * @param null $icon
	 */
	public function add_item($name, $url = null, $icon = null)
	{
		array_push($this->items, array(
			'name' => $name,
			'url'  => $url,
			'icon' => $icon,
		));
	}

	/**
	 * パンくずを配列で追加
	 */
	public function add_items()
	{
		foreach(func_get_args() as $arg)
		{
			$name = $arg[0];
			$url = (isset($arg[1]))?: null;
			$icon = (isset($arg[2]))?: null;
			$this->add_item($name, $url, $icon);
		}
	}

	/**
	 * パンくずリストを出力
	 */
	public function render()
	{
		$last_index = count($this->items) - 1;
		if($last_index < 0)
		{
			return;
		}
		echo '<ol class="breadcrumb">';
		foreach($this->items as $idx => $item)
		{
			$icon = (isset($item['icon'])) ? sprintf('<i class="fa %s"></i>%s ', $item['icon'], $item['name']) : $item['name'];
			$url = (isset($item['url'])) ? sprintf('<a href="%s">%s</a>', $item['url'], $icon) : $icon;
			$li = ($last_index === $idx) ? '<li class="active">' . $url . '</li>' : '<li>' . $url . '</li>';
			echo $li, "\n";
		}
		echo '</ol>';
	}
}