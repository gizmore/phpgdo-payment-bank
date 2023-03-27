<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_String;

/**
 * Bank Identifier Code.
 *
 * @version 6.10.4
 * @since 6.10.1
 * @author gizmore
 */
final class GDT_BIC extends GDT_String
{

	protected function __construct()
	{
		parent::__construct();
		$this->max(34);
		$this->ascii();
		$this->caseI();
	}

	public function defaultLabel(): self { return $this->label('bic'); }

	public function validate(int|float|string|array|null|object|bool $value): bool
	{
		if (parent::validate($value))
		{
			return true; # @TODO Implement BIC check
		}

		return true;
	}

}
