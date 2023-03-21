<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\User\GDO_User;

/**
 * Pay with bank transfer.
 *
 * @author gizmore
 */
final class InitPayment extends MethodPayment
{

	public function isAlwaysTransactional(): bool { return true; }

	public function execute()
	{
		$user = GDO_User::current();
		# Check
		$order = $this->getOrderPersisted();
		if ((!$order->isCreator($user)))
		{
			return $this->error('err_order')->addField(
				$order ? $order->redirectFailure() : $this->redirect(href(GDO_MODULE, GDO_METHOD)));
		}
		$tVars = [
			'order' => $order,
		];
		return $this->templatePHP('order_pay.php', $tVars);
	}

}
