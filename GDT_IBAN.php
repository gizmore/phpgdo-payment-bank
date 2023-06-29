<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_String;

final class GDT_IBAN extends GDT_String
{

	public function gdtDefaultLabel(): ?string
    { return 'iban'; }


}
