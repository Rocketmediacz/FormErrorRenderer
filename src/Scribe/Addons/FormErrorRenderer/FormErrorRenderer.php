<?php

/**
 * Copyright (c) 2014 David Zadražil (me@davidzadrazil.cz)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Scribe\Addons\FormErrorRenderer;

use Nette;
use Scribe\Application\UI\Control;

/**
 * Class FormErrorRenderer
 *
 * @author David Zadražil <me@davidzadrazil.cz>
 */
class FormErrorRenderer extends Control
{

	/** @var string */
	private $templateFile = NULL;

	private $translator = NULL;



	/**
	 * @param null $templateFile
	 * @param null $translator
	 */
	public function __construct($templateFile = NULL, $translator = NULL)
	{
		parent::__construct();

		$this->translator = $translator;

		if (!$templateFile) {
			$templateFile = __DIR__ . '/FormErrorRenderer.latte';
		}

		$this->templateFile = $templateFile;
	}



	/**
	 * @param $parameters
	 *
	 * @throws Nette\Application\ApplicationException
	 */
	public function render($parameters)
	{

		if ($parameters instanceof Nette\Forms\Controls\BaseControl)
		{
			$this->template->errors = $parameters->errors;
			
		} elseif (isset($parameters['form']) && $parameters['form'] instanceof Nette\Forms\Controls\BaseControl) {

			$this->template->errors = $parameters['forms']->errors;
		} else {
			throw new Nette\Application\ApplicationException('From input was not found.');
		}

		$this->template->setFile($this->templateFile)->render();
	}

}