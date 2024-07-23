<?php

namespace Evl\Service\Cloudimage;

use Evl\Service\Cloudimage\Converter\CloudimageUrlConverter;
use Evl\Service\Cloudimage\Converter\CloudimageUrlConverterInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;

/**
 * @method \Evl\Service\Cloudimage\CloudimageConfig getConfig()
 */
class CloudimageServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Evl\Service\Cloudimage\Converter\CloudimageUrlConverterInterface
     */
    public function createCloudimageUrlConverter(): CloudimageUrlConverterInterface
    {
        $config = $this->getConfig();

        return new CloudimageUrlConverter(
            $config->getCloudimageToken(),
            $config->getBaseUrl(),
            $config->getIgnoredUrlPaths()
        );
    }
}
