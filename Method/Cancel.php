<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\Core\Website;
use GDO\User\GDO_User;

final class Cancel extends MethodPayment
{
    public function isTrivial() : bool { return false; }
    
	public function execute()
	{
		$user = GDO_User::current();
		if (!($order = $this->getOrder()))
		{
		    return $this->error('err_order');
		}
		
		if ( (!$order->isPaid()) && ($order->getCreator()===$user) )
		{
			$order->delete();
    		return $this->message('msg_order_cancelled')->addField($this->redirect($order->href_failure()));
		}

		return $this->error('err_order_cancel');
	}
	
}
