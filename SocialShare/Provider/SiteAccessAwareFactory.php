<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare\Provider;

use eZ\Publish\Core\MVC\ConfigResolverInterface;

/**
 * Factory class for share button providers.
 */
class SiteAccessAwareFactory
{
    /** @var \eZ\Publish\Core\MVC\ConfigResolverInterface */
    protected $configResolver;

    /** @var string */
    protected $templateName;

    /**
     * @param \eZ\Publish\Core\MVC\ConfigResolverInterface $configResolver
     */
    public function __construct(ConfigResolverInterface $configResolver)
    {
        $this->configResolver = $configResolver;
    }

    /**
     * Sets template (theme) name.
     *
     * @param string $templateName
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    /**
     * Builds Facebook like button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildFacebookLike()
    {
        $facebookLikeProvider = new FacebookLikeProvider(array(
            'layout' => $this->configResolver->getParameter('facebook_like.layout', 'ez_share_buttons'),
            'width' => $this->configResolver->getParameter('facebook_like.width', 'ez_share_buttons'),
            'showFaces' => $this->configResolver->getParameter('facebook_like.show_faces', 'ez_share_buttons'),
            'share' => $this->configResolver->getParameter('facebook_like.share', 'ez_share_buttons'),
        ));

        return $facebookLikeProvider;
    }

    /**
     * Builds Facebook recommend button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildFacebookRecommend()
    {
        $facebookRecommendProvider = new FacebookRecommendProvider(array(
            'layout' => $this->configResolver->getParameter('facebook_recommend.layout', 'ez_share_buttons'),
            'width' => $this->configResolver->getParameter('facebook_recommend.width', 'ez_share_buttons'),
            'showFaces' => $this->configResolver->getParameter('facebook_recommend.show_faces', 'ez_share_buttons'),
            'share' => $this->configResolver->getParameter('facebook_recommend.share', 'ez_share_buttons'),
        ));

        return $facebookRecommendProvider;
    }

    /**
     * Builds Twitter button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildTwitter()
    {
        $twitterProvider = new TwitterProvider(array(
            'showUsername' => $this->configResolver->getParameter('twitter.show_username', 'ez_share_buttons'),
            'largeButton' => $this->configResolver->getParameter('twitter.large_button', 'ez_share_buttons'),
            'language' => $this->configResolver->getParameter('twitter.language', 'ez_share_buttons'),
        ));

        return $twitterProvider;
    }

    /**
     * Builds Linkedin button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildLinkedin()
    {
        $linkedinProvider = new LinkedinProvider(array(
            'countMode' => $this->configResolver->getParameter('linkedin.count_mode', 'ez_share_buttons'),
            'language' => $this->configResolver->getParameter('linkedin.language', 'ez_share_buttons'),
        ));

        return $linkedinProvider;
    }

    /**
     * Builds Google Plus button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildGooglePlus()
    {
        $googlePlusProvider = new GooglePlusProvider(array(
            'size' => $this->configResolver->getParameter('google_plus.size', 'ez_share_buttons'),
            'annotation' => $this->configResolver->getParameter('google_plus.annotation', 'ez_share_buttons'),
            'width' => $this->configResolver->getParameter('google_plus.width', 'ez_share_buttons'),
            'language' => $this->configResolver->getParameter('google_plus.language', 'ez_share_buttons'),
        ));

        return $googlePlusProvider;
    }

    /**
     * Builds Xing button provider.
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildXing()
    {
        $xingProvider = new XingProvider(array(
            'shape' => $this->configResolver->getParameter('xing.shape', 'ez_share_buttons'),
            'counter' => $this->configResolver->getParameter('xing.counter', 'ez_share_buttons'),
            'language' => $this->configResolver->getParameter('xing.language', 'ez_share_buttons'),
        ));

        return $xingProvider;
    }
}
