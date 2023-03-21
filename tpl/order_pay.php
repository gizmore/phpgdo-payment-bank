<?php

use GDO\Core\GDT_String;
use GDO\Payment\GDO_Order;
use GDO\Payment\GDT_Money;
use GDO\PaymentBank\Module_PaymentBank;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Button;
use GDO\UI\GDT_Card;
use GDO\UI\GDT_Paragraph;

/** @var $order GDO_Order * */
$order instanceof GDO_Order;

$module = Module_PaymentBank::instance();

echo $order->getOrderable()->renderOrderCard();

$card = GDT_Card::make();
$card->title(t('t_pay_with_bank'));
$card->subtitle(t('st_pay_with_bank'));

$card->addFields(
	GDT_Paragraph::make()->text('p_pay_with_bank'),
	$module->getConfigColumn('owner'),
	$module->getConfigColumn('iban'),
	$module->getConfigColumn('bic'),
	GDT_Money::make('total_tax')->label('pdforder_sum_tax', [$order->getTax()])->value($order->getPriceMWST()),
	GDT_Money::make('price')->var($order->getPrice()),
	GDT_String::make('purpose')->var($module->getTransferPurpose($order)),
);

$card->addField(
	GDT_Bar::make()->horizontal()->addFields(
		GDT_Button::make('confirm')->label('btn_confirm')->href(href('PaymentBank', 'Confirm', "&order={$order->getID()}")),
		GDT_Button::make('cancel')->label('btn_cancel')->href(href('PaymentBank', 'Cancel', "&order={$order->getID()}")),
	),
);

echo $card->render();
