<?php

declare(strict_types=1);

namespace DalvinTech\PayzenPlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class SyliusGatewayConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('api_key', PasswordType::class)
        ->add('id_boutique', TextType::class)
        ->add('public_key', PasswordType::class)
        ->add('hash_key', PasswordType::class);
    }
}
