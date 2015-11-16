<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare\Provider;

/**
 * Google Plus button provider class.
 */
class GooglePlusProvider extends TemplateBasedProvider
{
    /**
     * {@inheritdoc}
     */
    public function render(array $options = array())
    {
        $options['template'] = 'google_plus.html.twig';

        return $this->doRender($options);
    }
}
