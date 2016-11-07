<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare;

use eZ\Publish\Core\MVC\ConfigResolverInterface;
use InvalidArgumentException;
use Twig_Environment;

class ShareButtonsRenderer implements ProviderInterface
{
    /** @var array all available providers */
    private $providers = array();

    /** @var array providers enabled by default (defined in siteaccess aware configuration) */
    private $defaultProviders = array();

    /** @var \Twig_Environment */
    private $templateEngine;

    /**
     * Sets templating engine.
     *
     * @param \Twig_Environment $templateEngine
     */
    public function setTemplateEngine(Twig_Environment $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    /**
     * Constructs share buttons renderer.
     *
     * @param \eZ\Publish\Core\MVC\ConfigResolverInterface $configResolver
     * @param array $providers
     */
    public function __construct(ConfigResolverInterface $configResolver, array $providers = array())
    {
        $this->providers = $providers;
        $this->setDefaultProvidersList($configResolver->getParameter('providers', 'ez_share_buttons'));
    }

    /**
     * Sets default providers list.
     *
     * @param string[] $providersList
     */
    private function setDefaultProvidersList($providersList)
    {
        $this->defaultProviders = $providersList;
    }

    /**
     * Retrieves array of default providers objects.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface[]
     */
    private function getDefaultProviders()
    {
        $defaultProviders = array();

        foreach ($this->defaultProviders as $provider) {
            $defaultProviders[$provider] = $this->getProvider($provider);
        }

        return $defaultProviders;
    }

    /**
     * Adds provider object to collection.
     *
     * @param \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface $provider
     * @param string $label
     */
    public function addProvider(ProviderInterface $provider, $label)
    {
        $this->providers[$label] = $provider;
    }

    /**
     * Retrieves a share button provider from collection by its label.
     *
     * @param string $label
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getProvider($label)
    {
        if (!isset($this->providers[$label])) {
            throw new InvalidArgumentException(sprintf('Unknown share button provider `%s`', $label));
        }

        return $this->providers[$label];
    }

    /**
     * Renders the share buttons list.
     *
     * @param array $options
     *
     * @return string[]
     */
    public function render(array $options = array())
    {
        if (!empty($options['providers'])) {
            $outputProviders = array();
            foreach ($options['providers'] as $provider) {
                $outputProviders[] = $this->getProvider($provider);
            }
        } else {
            $outputProviders = $this->getDefaultProviders();
        }

        unset($options['providers']);

        $renderedProviders = array();
        foreach ($outputProviders as $label => $provider) {
            $provider->setTemplateEngine($this->templateEngine);
            $provider->setTemplateName($options['template']);
            $provider->setLabel($label);
            $renderedProviders[$label] = $provider->render($options);
        }

        return $renderedProviders;
    }
}
