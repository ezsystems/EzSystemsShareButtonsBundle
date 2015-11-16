<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use LogicException;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This compiler pass registers share button providers.
 */
class ProviderPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @throws \LogicException
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('ez_share_buttons.renderer')) {
            return;
        }

        $shareButtonsRendererDef = $container->getDefinition('ez_share_buttons.renderer');
        foreach ($container->findTaggedServiceIds('ez_share_buttons.provider') as $id => $attributes) {
            foreach ($attributes as $attribute) {
                if (!isset($attribute['alias'])) {
                    throw new LogicException('ez_share_buttons.renderer service tag needs an `alias` attribute to identify the share buttons provider. None given.');
                }

                $shareButtonsRendererDef->addMethodCall(
                    'addProvider',
                    array(new Reference($id), $attribute['alias'])
                );
            }
        }
    }
}
