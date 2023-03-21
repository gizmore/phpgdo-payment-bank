<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_Char;

/**
 * Bank identifier.
 *
 * @since 6.10.4
 * @author gizmore
 */
final class GDT_BLZ extends GDT_Char
{

	protected function __construct()
	{
		parent::__construct();
		$this->min(8);
		$this->max(8);
		$this->ascii();
		$this->caseS();
		$this->icon('bank');
		$this->label('blz');
	}

}
