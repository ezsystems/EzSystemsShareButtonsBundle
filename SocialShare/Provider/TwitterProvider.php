<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare\Provider;

/**
 * Twitter share button provider class.
 */
class TwitterProvider extends TemplateBasedProvider
{
    /**
     * {@inheritdoc}
     */
    public function render(array $options = array())
    {
        $options['template'] = 'twitter.html.twig';

        return $this->doRender($options);
    }
}
