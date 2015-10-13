<?php
/**
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare;

/**
 * Interface for share button providers.
 */
interface ProviderInterface
{
    /**
     * Renders the social share button.
     *
     * @param array $options
     * @return string
     */
    public function render(array $options = array());
}
