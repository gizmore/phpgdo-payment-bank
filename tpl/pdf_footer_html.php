<?php

use GDO\Address\Module_Address;
use GDO\Payment\Module_Payment;
use GDO\PaymentBank\Module_PaymentBank;

$ma = Module_Address::instance();
$mp = Module_Payment::instance();
$mpb = Module_PaymentBank::instance();
?>
<table>
    <tr>
        <td><?=sitename()?></td>
        <td><?=$mpb->cfgOwner()?></td>
        <td><?=sitename()?></td>
    </tr>
    <tr>
        <td><?=html($ma->cfgStreet())?></td>
        <td><?=t('iban')?>: <?=$mpb->cfgIBAN()?></td>
        <td><?=t('vat')?>: <?=$mp->cfgVat()?></td>
    </tr>
    <tr>
        <td><?=html($ma->cfgZIP())?> <?=html($ma->cfgCity())?></td>
        <td><?=t('bic')?>: <?=$mpb->cfgBIC()?></td>
        <td></td>
    </tr>
</table>
