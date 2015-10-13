<?php
/**
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle;

use EzSystems\ShareButtonsBundle\DependencyInjection\Compiler\ProviderPass;
use EzSystems\ShareButtonsBundle\DependencyInjection\EzSystemsShareButtonsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EzSystemsShareButtonsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ProviderPass());
        parent::build($container);
    }

    public function getContainerExtension()
    {
        return new EzSystemsShareButtonsExtension();
    }
}
