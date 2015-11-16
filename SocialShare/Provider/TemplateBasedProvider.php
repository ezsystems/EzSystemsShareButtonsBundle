<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\ShareButtonsBundle\SocialShare\Provider;

use EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface;
use InvalidArgumentException;

/**
 * Abstract class for share button provider.
 */
abstract class TemplateBasedProvider implements ProviderInterface
{
    /** @var string */
    protected $templateName;

    /** @var \Twig_Environment */
    protected $templateEngine;

    /** @var array */
    protected $options = array();

    /** @var string */
    protected $label;

    /**
     * Constructs provider object.
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->options = $options;
    }

    /**
     * Sets template engine.
     *
     * @param \Twig_Environment $templateEngine
     */
    public function setTemplateEngine($templateEngine)
    {
        $this->templateEngine = $templateEngine;
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
     * Sets provider label.
     *
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Performs share button rendering.
     *
     * @param array $options
     *
     * @return string
     *
     * @throws \InvalidArgumentException if template engine is not set
     * @throws \InvalidArgumentException if provider label is not set
     */
    protected function doRender(array $options)
    {
        if (!isset($this->templateEngine)) {
            throw new InvalidArgumentException('Missing template engine');
        }

        if (!isset($this->label)) {
            throw new InvalidArgumentException('Missing provider label');
        }

        if (isset($options[$this->label])) {
            $options = array_merge($this->options, $options[$this->label], $options);
            unset($options[$this->label]);
        } else {
            $options = $options + $this->options;
        }

        $template = sprintf(
            'EzSystemsShareButtonsBundle::%s/%s',
            $this->templateName,
            $options['template']
        );

        return $this->templateEngine->render($template, $options);
    }
}
