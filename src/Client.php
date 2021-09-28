<?php


/**
 * 1. Register on the Let's Encrypt/ACME server
 * 2. Prove you own the domain
 * 3. Ask the server to check your proof
 * 4. Get your certificate
 * 5. Renew your certificate
 * 6. List the certificates handled by Acme PHP
 */

namespace AcmePhp\Core\src;

use AcmePhp\Core\AcmeClient;

class Client
{
    private AcmeClient $acmeClient;

    public function getClient(): AcmeClient
    {
        if (!isset($this->acmeClient)) {
            $this->acmeClient = new AcmeClient(
                (new SecureHttpClient())->getClient(),
                'https://acme-staging-v02.api.letsencrypt.org/directory'
            );
        }
        return $this->acmeClient;
    }

    public function register(): array
    {
        return $this->getClient()->registerAccount("narayanadhikary24@gmail.com");
    }

    public function authorize(string $domain = "wovo.xyz"): array
    {
        return $this->getClient()->requestAuthorization($domain);
    }
}