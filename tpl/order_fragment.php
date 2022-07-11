<?phpuse GDO\Payment\GDO_Order;
use GDO\UI\GDT_Card;use GDO\PaymentBank\Module_PaymentBank;use GDO\Core\GDT_String;use GDO\Payment\GDT_Money;/** @var $order GDO_Order **/
$order instanceof GDO_Order;$module = Module_PaymentBank::instance(); $card = GDT_Card::make();$card->addFields(array(	$module->getConfigColumn('owner'),	$module->getConfigColumn('bic'),	$module->getConfigColumn('iban'),	GDT_Money::make('price')->var($order->getPrice()),	GDT_String::make('purpose')->var($module->getTransferPurpose($order)),));if ($order->isPersisted()){	echo $card->render();}