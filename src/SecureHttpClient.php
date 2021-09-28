<?php

namespace AcmePhp\Core\src;

use AcmePhp\Core\Http\Base64SafeEncoder;
use AcmePhp\Core\Http\SecureHttpClientFactory;
use AcmePhp\Core\Http\ServerErrorHandler;
use AcmePhp\Ssl\Parser\KeyParser;
use AcmePhp\Ssl\Signer\DataSigner;
use GuzzleHttp\Client as GuzzleHttpClient;

class SecureHttpClient
{
    public function getClient(): \AcmePhp\Core\Http\SecureHttpClient
    {
        return $this
            ->secureHttpClientFactory()
            ->createSecureHttpClient((new GenerateKeyPair())->getKeyPair());
    }

    public function secureHttpClientFactory(): SecureHttpClientFactory
    {
        return new SecureHttpClientFactory(
            new GuzzleHttpClient(),
            new Base64SafeEncoder(),
            new KeyParser(),
            new DataSigner(),
            new ServerErrorHandler()
        );
    }

}