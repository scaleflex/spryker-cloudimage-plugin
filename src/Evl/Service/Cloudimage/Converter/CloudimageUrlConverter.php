<?php

namespace Evl\Service\Cloudimage\Converter;

class CloudimageUrlConverter implements CloudimageUrlConverterInterface
{
    /**
     * @var string
     */
    private string $cloudimageToken;

    /**
     * @var string
     */
    private string $baseUrl;

    /**
     * @var string[]
     */
    private array $ignoredUrlPaths;

    /**
     * @param string $cloudimageToken
     * @param string $baseUrl
     * @param string[] $ignoredUrlPaths
     */
    public function __construct(
        string $cloudimageToken,
        string $baseUrl,
        array $ignoredUrlPaths
    ) {
        $this->cloudimageToken = $cloudimageToken;
        $this->baseUrl = $baseUrl;
        $this->ignoredUrlPaths = $ignoredUrlPaths;
    }

    /**
     * @param string $originalUrl
     * @param array $operations
     * @param array $filters
     *
     * @return string
     */
    public function convertUrl(string $originalUrl, array $operations = [], array $filters = []): string
    {
        $urlToConvert = $originalUrl;
        if (substr($originalUrl, 0, 1) === '/') {
            $urlToConvert = $this->baseUrl . $originalUrl;
        }

        foreach ($this->ignoredUrlPaths as $ignoredPath) {
            if (strpos($urlToConvert, $ignoredPath) !== false) {
                return $originalUrl;
            }
        }

        $cloudimageBaseUrl = sprintf(
            'https://%s.cloudimg.io/%s',
            $this->cloudimageToken,
            $urlToConvert,
        );

        $queryParameters = array_merge($operations, $filters);
        if (count($queryParameters) !== 0) {
            return $cloudimageBaseUrl . '?' . http_build_query($queryParameters);
        }

        return $cloudimageBaseUrl;
    }
}
