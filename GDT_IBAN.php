<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_String;

final class GDT_IBAN extends GDT_String
{
	public function defaultLabel(): static { return $this->label('iban'); }
	

}
