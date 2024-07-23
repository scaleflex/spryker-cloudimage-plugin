## Cloudimage

### Installation
Start up the Spryker shop and run:
~~~
composer require evl/cloudimage
~~~

### Configuration in the shop
To get the package running, register the "Evl" namespace into the config_default.php in the KernelConstants::CORE_NAMESPACES
~~~
$config[KernelConstants::CORE_NAMESPACES] = [
    'Evl',
    ...
];
~~~
Set these constants in the config, where it is needed. the BaseUrl and the ignoredUrlPaths need to be set according to the use case.
~~~
use Evl\Shared\Cloudimage\CloudimageConstants;

$config[CloudimageConstants::TOKEN] = '{{YOUR_TOKEN}}';
$config[CloudimageConstants::BASE_URL] = 'http://yves.de.spryker.local';
$config[CloudimageConstants::IGNORED_URL_PATHS] = ['http://yves.de.spryker.local'];
~~~

### Integration into the code
Register the Twig plugin in the Pyz\Yves\Twig\TwigDependencyProvider.php
~~~
/**
 * @return \Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface[]
 */
protected function getTwigPlugins(): array
{
    return [
        ...
        new CloudimageTwigPlugin(),
    ];
]
~~~

#### Example
Use the TwigFilter for the images. Here is an example of how to extend the Pyz\Yves\ShopUi\Theme\default\components\molecules\lazy-image.twig. 
Everywhere this molecule will use Cloudimage and apply a grey filter.
~~~
{% block body %}
    {% set data = data | merge({'imageSrc': data.imageSrc | cloudimage({}, {grey: 1}) }) %}
    ...
{% endblock %}
~~~

#### How to use the plugin
~~~
cloudimage({YOUR_OPERATIONS}, {YOUR_FILTERS})
~~~
Cloudimage documentation for the operations:
https://docs.cloudimage.io/go/cloudimage-documentation-v7/en/image-resizing

Cloudimage documentation for the filters:
https://docs.cloudimage.io/go/cloudimage-documentation-v7/en/image-filters
