<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\Twig\Extension;

use EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface;
use eZ\Publish\Core\MVC\ConfigResolverInterface;
use Twig_Extension;
use Twig_SimpleFunction;
use Twig_Environment;

/**
 * ShareButtons Twig extension.
 */
class ShareButtonsExtension extends Twig_Extension
{
    /** @var \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface */
    private $shareButtonsRenderer;

    /** @var \eZ\Publish\Core\MVC\ConfigResolverInterface */
    private $configResolver;

    /**
     * Constructs EzSystemsShareButtonsBundle Twig extension.
     *
     * @param \eZ\Publish\Core\MVC\ConfigResolverInterface $configResolver
     * @param \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface $shareButtonsRenderer
     */
    public function __construct(ConfigResolverInterface $configResolver, ProviderInterface $shareButtonsRenderer)
    {
        $this->shareButtonsRenderer = $shareButtonsRenderer;
        $this->configResolver = $configResolver;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ez_share_buttons';
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction(
                'show_share_buttons',
                array($this, 'showShareButtons'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true,
                )
            ),
        );
    }

    /**
     * Renders share buttons bar template based on user settings.
     *
     * @param \Twig_Environment $twigEnvironment
     * @param array $options
     * @param string[] $providers
     *
     * @return string
     */
    public function showShareButtons(
        Twig_Environment $twigEnvironment,
        array $options = array(),
        array $providers = array()
    ) {
        $this->shareButtonsRenderer->setTemplateEngine($twigEnvironment);

        if (isset($providers)) {
            $options['providers'] = $providers;
        }

        if (!isset($options['template'])) {
            $options['template'] = $this->configResolver->getParameter('template', 'ez_share_buttons');
        }

        return $twigEnvironment->render(sprintf(
            'EzSystemsShareButtonsBundle::%s.html.twig',
            $options['template']
        ), array(
            'shareButtons' => $this->shareButtonsRenderer->render($options),
        ));
    }
}
