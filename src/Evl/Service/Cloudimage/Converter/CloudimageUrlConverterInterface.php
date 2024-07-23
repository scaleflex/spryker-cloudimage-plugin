<?php

namespace Evl\Service\Cloudimage\Converter;

interface CloudimageUrlConverterInterface
{
    /**
     * @param string $originalUrl
     * @param array $operations
     * @param array $filters
     *
     * @return string
     */
    public function convertUrl(string $originalUrl, array $operations = [], array $filters = []): string;
}
