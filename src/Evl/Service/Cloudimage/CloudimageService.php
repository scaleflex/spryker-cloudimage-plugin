<?php

namespace Evl\Service\Cloudimage;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \Evl\Service\Cloudimage\CloudimageServiceFactory getFactory()
 */
class CloudimageService extends AbstractService implements CloudimageServiceInterface
{
    /**
     * @param string $originalUrl
     * @param array $operations
     * @param array $filters
     *
     * @return string
     */
    public function getCloudimageUrl(string $originalUrl, array $operations = [], array $filters = []): string
    {
        return $this->getFactory()
            ->createCloudimageUrlConverter()
            ->convertUrl($originalUrl, $operations, $filters);
    }
}
