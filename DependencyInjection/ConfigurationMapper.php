<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\DependencyInjection;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware\ContextualizerInterface;
use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware\HookableConfigurationMapperInterface;

class ConfigurationMapper implements HookableConfigurationMapperInterface
{
    /**
     * {@inheritdoc}
     */
    public function mapConfig(array &$scopeSettings, $currentScope, ContextualizerInterface $contextualizer)
    {
        // common settings
        if (isset($scopeSettings['providers'])) {
            $contextualizer->setContextualParameter('providers', $currentScope, $scopeSettings['providers']);
        }
        if (isset($scopeSettings['template'])) {
            $contextualizer->setContextualParameter('template', $currentScope, $scopeSettings['template']);
        }

        // Facebook like settings
        if (isset($scopeSettings['facebook_like.layout'])) {
            $contextualizer->setContextualParameter('facebook_like.layout', $currentScope, $scopeSettings['facebook_like.layout']);
        }
        if (isset($scopeSettings['facebook_like.width'])) {
            $contextualizer->setContextualParameter('facebook_like.width', $currentScope, $scopeSettings['facebook_like.width']);
        }
        if (isset($scopeSettings['facebook_like.show_faces'])) {
            $contextualizer->setContextualParameter('facebook_like.show_faces', $currentScope, $scopeSettings['facebook_like.show_faces']);
        }
        if (isset($scopeSettings['facebook_like.share'])) {
            $contextualizer->setContextualParameter('facebook_like.share', $currentScope, $scopeSettings['facebook_like.share']);
        }

        // Facebook recommend settings
        if (isset($scopeSettings['facebook_recommend.layout'])) {
            $contextualizer->setContextualParameter('facebook_recommend.layout', $currentScope, $scopeSettings['facebook_recommend.layout']);
        }
        if (isset($scopeSettings['facebook_recommend.width'])) {
            $contextualizer->setContextualParameter('facebook_recommend.width', $currentScope, $scopeSettings['facebook_recommend.width']);
        }
        if (isset($scopeSettings['facebook_recommend.show_faces'])) {
            $contextualizer->setContextualParameter('facebook_recommend.show_faces', $currentScope, $scopeSettings['facebook_recommend.show_faces']);
        }
        if (isset($scopeSettings['facebook_recommend.share'])) {
            $contextualizer->setContextualParameter('facebook_recommend.share', $currentScope, $scopeSettings['facebook_recommend.share']);
        }

        // Twitter settings
        if (isset($scopeSettings['twitter.show_username'])) {
            $contextualizer->setContextualParameter('twitter.show_username', $currentScope, $scopeSettings['twitter.show_username']);
        }
        if (isset($scopeSettings['twitter.large_button'])) {
            $contextualizer->setContextualParameter('twitter.large_button', $currentScope, $scopeSettings['twitter.large_button']);
        }
        if (isset($scopeSettings['twitter.language'])) {
            $contextualizer->setContextualParameter('twitter.language', $currentScope, $scopeSettings['twitter.language']);
        }

        // LinkedIn settings
        if (isset($scopeSettings['linkedin.count_mode'])) {
            $contextualizer->setContextualParameter('linkedin.count_mode', $currentScope, $scopeSettings['linkedin.count_mode']);
        }
        if (isset($scopeSettings['linkedin.language'])) {
            $contextualizer->setContextualParameter('linkedin.language', $currentScope, $scopeSettings['linkedin.language']);
        }

        // Google Plus settings
        if (isset($scopeSettings['google_plus.size'])) {
            $contextualizer->setContextualParameter('google_plus.size', $currentScope, $scopeSettings['google_plus.size']);
        }
        if (isset($scopeSettings['google_plus.annotation'])) {
            $contextualizer->setContextualParameter('google_plus.annotation', $currentScope, $scopeSettings['google_plus.annotation']);
        }
        if (isset($scopeSettings['google_plus.width'])) {
            $contextualizer->setContextualParameter('google_plus.width', $currentScope, $scopeSettings['google_plus.width']);
        }
        if (isset($scopeSettings['google_plus.language'])) {
            $contextualizer->setContextualParameter('google_plus.language', $currentScope, $scopeSettings['google_plus.language']);
        }

        // Xing settings
        if (isset($scopeSettings['xing.shape'])) {
            $contextualizer->setContextualParameter('xing.shape', $currentScope, $scopeSettings['xing.shape']);
        }
        if (isset($scopeSettings['xing.counter'])) {
            $contextualizer->setContextualParameter('xing.counter', $currentScope, $scopeSettings['xing.counter']);
        }
        if (isset($scopeSettings['xing.language'])) {
            $contextualizer->setContextualParameter('xing.language', $currentScope, $scopeSettings['xing.language']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function preMap(array $config, ContextualizerInterface $contextualizer)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function postMap(array $config, ContextualizerInterface $contextualizer)
    {
    }
}
