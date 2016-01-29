<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\DependencyInjection;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware\Configuration as SiteAccessConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration extends SiteAccessConfiguration
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ez_share_buttons');

        $systemNode = $this->generateScopeBaseNode($rootNode);
        $this->addCommonSettings($systemNode);
        $this->addFacebookLikeSettings($systemNode);
        $this->addFacebookRecommendSettings($systemNode);
        $this->addGooglePlusSettings($systemNode);
        $this->addTwitterSettings($systemNode);
        $this->addLinkedinSettings($systemNode);
        $this->addXingSettings($systemNode);

        return $treeBuilder;
    }

    private function addCommonSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('providers')
                ->info('List of supported share button providers.')
                ->prototype('scalar')
                ->end()
            ->end()
            ->scalarNode('template')
                ->isRequired()
                ->info('Template for share buttons.')
            ->end();
    }

    private function addFacebookLikeSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('facebook_like')
                ->children()
                    ->scalarNode('layout')->isRequired()->end()
                    ->scalarNode('width')->isRequired()->end()
                    ->scalarNode('show_faces')->isRequired()->end()
                    ->scalarNode('share')->isRequired()->end()
                ->end()
            ->end();
    }

    private function addFacebookRecommendSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('facebook_recommend')
               ->children()
                    ->scalarNode('layout')->isRequired()->end()
                    ->scalarNode('width')->isRequired()->end()
                    ->scalarNode('show_faces')->isRequired()->end()
                    ->scalarNode('share')->isRequired()->end()
                ->end()
            ->end();
    }

    private function addTwitterSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('twitter')
                ->children()
                    ->scalarNode('show_username')->isRequired()->end()
                    ->scalarNode('large_button')->isRequired()->end()
                    ->scalarNode('language')->isRequired()->end()
                ->end()
            ->end();
    }

    private function addLinkedinSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('linkedin')
                ->children()
                    ->scalarNode('count_mode')->isRequired()->end()
                    ->scalarNode('language')->isRequired()->end()
                ->end()
            ->end();
    }

    private function addGooglePlusSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('google_plus')
                ->children()
                    ->scalarNode('size')->isRequired()->end()
                    ->scalarNode('annotation')->isRequired()->end()
                    ->scalarNode('width')->isRequired()->end()
                    ->scalarNode('language')->isRequired()->end()
                ->end()
            ->end();
    }

    private function addXingSettings(NodeBuilder $nodeBuilder)
    {
        $nodeBuilder
            ->arrayNode('xing')
                ->children()
                    ->scalarNode('shape')->isRequired()->end()
                    ->scalarNode('counter')->isRequired()->end()
                    ->scalarNode('language')->isRequired()->end()
                ->end()
            ->end();
    }
}
