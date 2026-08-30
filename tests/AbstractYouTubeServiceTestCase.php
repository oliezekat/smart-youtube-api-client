<?php

declare(strict_types=1);

namespace Oliezekat\SmartYoutubeApiClient\Tests;

use PHPUnit\Framework\TestCase;

abstract class AbstractYouTubeServiceTestCase extends TestCase
{
    use GoogleApiKeyTestTrait;
    use GoogleClientTestTrait;
    use GoogleServiceYouTubeTestTrait;
}
