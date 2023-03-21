<?php
namespace GDO\PaymentBank;

use GDO\Core\GDT_String;
use GDO\Payment\GDO_Order;
use GDO\Payment\PaymentModule;

final class Module_PaymentBank extends PaymentModule
{

	#####################
	### PaymentModule ###
	#####################
	public function makePaymentButton(GDO_Order $order = null)
	{
		$button = parent::makePaymentButton($order);
		return $button->label('buy_bank_transfer');
	}

	##############
	### Module ###
	##############
	public function getDependencies(): array { return ['Payment']; }

	public function onLoadLanguage(): void { $this->loadLanguage('lang/bank'); }

	public function getConfig(): array
	{
		return array_merge(parent::getConfig(), [
			GDT_BIC::make('bic')->initial('00000000000'),
			GDT_IBAN::make('iban')->initial('000000000000000000000000'),
			GDT_String::make('owner')->initial('Firstname Lastname'),
		]);
	}

	##############
	### Config ###
	##############

	public function renderOrderFragment(GDO_Order $order)
	{
		return $this->php('order_fragment.php', ['order' => $order]);
	}

	public function getFooterHTML(GDO_Order $order = null)
	{
		return $this->php('pdf_footer_html.php', ['order' => $order]);
	}

	public function payment() { return Module_PaymentBank::instance(); }

	public function cfgBIC() { return $this->getConfigVar('bic'); }

	public function cfgIBAN() { return $this->getConfigVar('iban'); }

	public function cfgOwner() { return $this->getConfigVar('owner'); }

}
