<?php

namespace AcmePhp\Core\src;

use AcmePhp\Ssl\Generator\KeyPairGenerator;
use AcmePhp\Ssl\KeyPair;
use AcmePhp\Ssl\PrivateKey;
use AcmePhp\Ssl\PublicKey;

class GenerateKeyPair
{
    private string $privateKeyPath = __DIR__ . '/../keys/account.pem';
    private string $publicKeyPath = __DIR__ . '/../keys/account.pub.pem';

    public function getKeyPair(): KeyPair
    {
        [$publicKey, $privateKey] = $this->keyExists() ? $this->getKeys() : $this->generateKeyPair();
        return new KeyPair($publicKey, $privateKey);
    }

    public function keyExists(): bool
    {
        return file_exists($this->privateKeyPath);
    }

    public function generateKeyPair(): array
    {
        $keyPairGenerator = new KeyPairGenerator();

        $keyPair = $keyPairGenerator->generateKeyPair();
        file_put_contents($this->publicKeyPath, $keyPair->getPublicKey()->getPEM());
        file_put_contents($this->privateKeyPath, $keyPair->getPrivateKey()->getPEM());
        return [
            $keyPair->getPublicKey(),
            $keyPair->getPrivateKey()
        ];
    }

    public function getKeys(): array
    {
        return [
            new PublicKey(file_get_contents($this->publicKeyPath)),
            new PrivateKey(file_get_contents($this->privateKeyPath))
        ];
    }
}



