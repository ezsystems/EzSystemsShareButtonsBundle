<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle;

use EzSystems\ShareButtonsBundle\DependencyInjection\Compiler\ProviderPass;
use EzSystems\ShareButtonsBundle\DependencyInjection\EzSystemsShareButtonsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EzSystemsShareButtonsBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ProviderPass());

        parent::build($container);
    }

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new EzSystemsShareButtonsExtension();
    }
}
