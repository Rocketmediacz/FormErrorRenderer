<?php

/**
 * Copyright (c) 2014 David Zadražil (me@davidzadrazil.cz)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Scribe\Addons\FormErrorRenderer;

/**
 * Interface IFormErrorRendererFactory
 *
 * @package Scribe\Addons\FormErrorRenderer
 */
interface IFormErrorRendererFactory
{

	/**
	 * @param $templateFile
	 * @param $translator
	 *
	 * @return FormErrorRenderer
	 */
	public function create($templateFile, $translator);

}