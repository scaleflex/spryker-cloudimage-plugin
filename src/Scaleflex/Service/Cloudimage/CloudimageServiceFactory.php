<?php

namespace Scaleflex\Service\Cloudimage;

use Scaleflex\Service\Cloudimage\Converter\CloudimageUrlConverter;
use Scaleflex\Service\Cloudimage\Converter\CloudimageUrlConverterInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;

/**
 * @method \Scaleflex\Service\Cloudimage\CloudimageConfig getConfig()
 */
class CloudimageServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Scaleflex\Service\Cloudimage\Converter\CloudimageUrlConverterInterface
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
