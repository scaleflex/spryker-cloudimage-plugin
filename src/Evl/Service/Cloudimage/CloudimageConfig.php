<?php

namespace Evl\Service\Cloudimage;

use Evl\Shared\Cloudimage\CloudimageConstants;
use Spryker\Service\Kernel\AbstractBundleConfig;

class CloudimageConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const DEFAULT_TOKEN = 'You need to set the Cloudimage Token';

    /**
     * @var string
     */
    public const DEFAULT_BASE_URL = '';

    /**
     * @var string[]
     */
    public const DEFAULT_IGNORED_URL_PATHS = [];

    /**
     * @return string
     */
    public function getCloudimageToken(): string
    {
        return $this->get(CloudimageConstants::TOKEN, static::DEFAULT_TOKEN);
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->get(CloudimageConstants::BASE_URL, static::DEFAULT_BASE_URL);
    }

    /**
     * @return string[]
     */
    public function getIgnoredUrlPaths(): array
    {
        return $this->get(CloudimageConstants::IGNORED_URL_PATHS, static::DEFAULT_IGNORED_URL_PATHS);
    }
}
