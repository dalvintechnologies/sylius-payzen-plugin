<?php

declare(strict_types=1);

namespace DalvinTech\PayzenPlugin\Payum;

final class SyliusApi
{
    /** @var string */
    private $apiKey;
    /** @var string */
    private $idBoutique;
    /** @var string */
    private $publicKey;
    /** @var string */
    private $SHA256Key;

    /**
     * SyliusApi constructor.
     * @param string $apiKey
     * @param string $idBoutique
     * @param string $publicKey
     * @param string $SHA256Key
     */
    public function __construct(string $apiKey, string $idBoutique, string $publicKey, string $SHA256Key)
    {
        $this->apiKey = $apiKey;
        $this->idBoutique = $idBoutique;
        $this->publicKey = $publicKey;
        $this->SHA256Key = $SHA256Key;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getSHA256Key(): string
    {
        return $this->SHA256Key;
    }


    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getIdBoutique(): string
    {
        return $this->idBoutique;
    }

}
