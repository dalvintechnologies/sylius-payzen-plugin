<?php


namespace DalvinTech\PayzenPlugin\Payum\Controller;


use Payum\Bundle\PayumBundle\Controller\PayumController;
use Payum\Core\Reply\HttpPostRedirect;
use DalvinTech\PayzenPlugin\Payum\Core\Request\CaptureRequest;
use Payum\Core\Request\Generic;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CaptureController extends PayumController
{
    public function doSessionTokenAction(Request $request)
    {
        if (false === $request->hasSession()) {
            throw new HttpException(400, 'This controller requires session to be started.');
        }

        if (null === $hash = $request->getSession()->get('payum_token')) {
            throw new HttpException(400, 'This controller requires token hash to be stored in the session.');
        }

        $request->getSession()->remove('payum_token');

        $redirectUrl = $this->generateUrl('payum_capture_do', array_replace(
            $request->query->all(),
            array(
                'payum_token' => $hash,
            )
        ));

        if ($request->isMethod('POST')) {
            throw new HttpPostRedirect($redirectUrl, $request->request->all());
        }

        return $this->redirect($redirectUrl);
    }

    public function doAction(Request $request)
    {
        $token = $this->getPayum()->getHttpRequestVerifier()->verify($request);

        $gateway = $this->getPayum()->getGateway($token->getGatewayName());

        $gateway->execute(new CaptureRequest($token));

        if ($token->getGatewayName() === "payzen") {

            return $this->render('Payzen/cardFormPayment.twig', ['formData' => $token->getDetails()->getFormData(), 'redirectUrl' => $token->getAfterUrl()]);

        }
        $this->getPayum()->getHttpRequestVerifier()->invalidate($token);

        return $this->redirect($token->getAfterUrl());
    }
}
