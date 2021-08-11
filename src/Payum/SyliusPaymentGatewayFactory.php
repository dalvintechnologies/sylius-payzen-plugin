<?php

declare(strict_types=1);

namespace DalvinTech\PayzenPlugin\Payum;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;
use DalvinTech\PayzenPlugin\Payum\SyliusApi;
use DalvinTech\PayzenPlugin\Payum\Action\StatusAction;

final class SyliusPaymentGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'sylius_payment',
            'payum.factory_title' => 'Sylius Payment',
            'payum.action.status' => new StatusAction(),
        ]);
        $config['payum.api'] = function (ArrayObject $config) {
            return new SyliusApi($config['api_key'], $config['id_boutique']);
        };
    }
}
