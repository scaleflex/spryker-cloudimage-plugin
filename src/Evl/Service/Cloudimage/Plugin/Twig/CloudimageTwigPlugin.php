<?php

namespace Evl\Service\Cloudimage\Plugin\Twig;

use Spryker\Service\Kernel\AbstractPlugin;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Service\Container\ContainerInterface;
use Twig\Environment;
use Twig\TwigFilter;

/**
 *
 */
class CloudimageTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    /**
     * @var string
     */
    public const NAME = 'cloudimage';

    /**
     * Specification:
     * - Allows to extend Twig with additional functionality (e.g. functions, global variables, etc.).
     *
     * @api
     *
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        $twig->addFilter(
            new TwigFilter(
                static::NAME,
                [$this, 'getCloudimageUrl'],
            ),
        );

        return $twig;
    }

    /**
     * @param string $originalUrl
     * @param array $operations
     * @param array $filters
     *
     * @return string
     */
    public function getCloudimageUrl(string $originalUrl, array $operations = [], array $filters = []): string
    {
        return $this->getService()->getCloudimageUrl($originalUrl, $operations, $filters);
    }
}
