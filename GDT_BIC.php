<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_String;

/**
 * Bank Identifier Code.
 * 
 * @author gizmore
 * @version 6.10.4
 * @since 6.10.1
 */
final class GDT_BIC extends GDT_String
{
	public function defaultLabel() : self { return $this->label('bic'); }
	
	protected function __construct()
	{
	    parent::__construct();
	    $this->max(34);
	    $this->ascii();
	    $this->caseI();
	}
	
	public function validate($value) : bool
	{
	    if (parent::validate($value))
	    {
	        return true; # @TODO Implement BIC check
	    }
	}
	
}
