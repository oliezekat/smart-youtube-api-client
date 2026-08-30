<?php

declare(strict_types=1);

namespace Oliezekat\SmartYoutubeApiClient\Tests;

use PHPUnit\Framework\Attributes\TestDox;

trait GoogleApiKeyTestTrait
{
    private static string $ENV_API_KEY   = 'GOOGLE_API_KEY';
    private ?string $googleApiKey                     = null;

    protected function getGoogleApiKey(): string
    {
        if ($this->googleApiKey === null) {
            $apiKey = getenv(static::$ENV_API_KEY);
            $this->googleApiKey = (is_string($apiKey) ? trim($apiKey) : '');
        }
        return $this->googleApiKey;
    }

    #[TestDox('Get Google API key for tests')]
    public function testGetGoogleApiKey(): void
    {
        $apiKey = $this->getGoogleApiKey();
        $this->assertTrue(empty($apiKey) === false, 'Found "' . static::$ENV_API_KEY . '" environment variable');
    }
}
