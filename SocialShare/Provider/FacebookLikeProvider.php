<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare\Provider;

/**
 * Facebook like button provider class.
 */
class FacebookLikeProvider extends TemplateBasedProvider
{
    /**
     * {@inheritdoc}
     */
    public function render(array $options = array())
    {
        $options['template'] = 'facebook_like.html.twig';

        return $this->doRender($options);
    }
}
