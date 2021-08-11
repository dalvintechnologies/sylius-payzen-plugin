<?php
declare(strict_types=1);

namespace DalvinTech\PayzenPlugin\Payum\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Request\GetStatusInterface;
use Sylius\Component\Core\Model\PaymentInterface as SyliusPaymentInterface;

final class StatusAction implements ActionInterface
{
    public function execute($request): void
    {
        RequestNotSupportedException::assertSupports($this, $request);

        /** @var SyliusPaymentInterface $payment */
        $payment = $request->getFirstModel();

        $details = $payment->getDetails();

        $paymentResponse= json_decode($_POST['kr-answer']);
        $statusPayment= $paymentResponse->orderStatus;

        switch ($statusPayment) {
            case "PAID" : // transaction approuvée ou traitée avec succès
                $request->markCaptured();
                break;
            case "RUNNING" : // contacter l’émetteur de carte
                $request->markPending();
                break;
            case "UNPAID" : // Annulation client.
                $request->markCanceled();
                break;
        }

    }

    public function supports($request): bool
    {
        return
            $request instanceof GetStatusInterface &&
            $request->getFirstModel() instanceof SyliusPaymentInterface;
    }
}
