<?php

namespace Victoire\Widget\ConnectBundle\Resolver;


use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Bundle\WidgetBundle\Twig\LinkExtension;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Provider\FileProvider;

/**
 * CRUD operations on WidgetConnect Widget
 *
 * The widget view has two parameters: widget and content
 *
 * widget: The widget to display, use the widget as you wish to render the view
 * content: This variable is computed in this WidgetManager, you can set whatever you want in it and display it in the show view
 *
 * The content variable depends of the mode: static/businessEntity/entity/query
 *
 * The content is given depending of the mode by the methods:
 *  getWidgetStaticContent
 *  getWidgetBusinessEntityContent
 *  getWidgetEntityContent
 *  getWidgetQueryContent
 *
 * So, you can use the widget or the content in the show.html.twig view.
 * If you want to do some computation, use the content and do it the 4 previous methods.
 *
 * If you just want to use the widget and not the content, remove the method that throws the exceptions.
 *
 * By default, the methods throws Exception to notice the developer that he should implements it owns logic for the widget
 */
class WidgetConnectContentResolver extends BaseWidgetContentResolver
{
    /** @var FileProvider  */
    protected $fileProvider;

    protected $linkExtension;

    public function __construct(FileProvider $fileProvider, LinkExtension $linkExtension) {
        $this->fileProvider = $fileProvider;
        $this->linkExtension = $linkExtension;
    }

    /**
     * Get the static content of the wdget
     *
     * @param Widget $widget
     * @return string The static content
     */
    public function getWidgetStaticContent(Widget $widget)
    {
        $parameters = parent::getWidgetStaticContent($widget);

        if (isset($parameters['resourceOwners']['resource_owners'])) {
            $resourceOwners = $parameters['resourceOwners']['resource_owners'];
        } else {
            $resourceOwners = [];
        }

        foreach ($resourceOwners as $resourceOwner) {
            $path = $this->fileProvider->getTemplatePathFunction("VictoireWidgetConnectBundle:buttons:$resourceOwner.html.twig") ?
                : 'VictoireWidgetConnectBundle:buttons:default.html.twig';
            $parameters['resourceOwners'][WidgetConnect::PREFIX_RESOURCE_OWNER_TEMPLATE . $resourceOwner] = $path;
        }

        /** @var WidgetConnect $widget */
        $parameters['redirectUrl'] = $this->linkExtension->victoireLinkUrl($widget->getLink()->getParameters());

        return $parameters;
    }

    /**
     * Get the business entity content
     * @param Widget $widget
     * @return string
     */
    public function getWidgetBusinessEntityContent(Widget $widget)
    {
        return parent::getWidgetBusinessEntityContent($widget);
    }

    /**
     * Get the content of the widget by the entity linked to it
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetEntityContent(Widget $widget)
    {
        return parent::getWidgetEntityContent($widget);
    }

    /**
     * Get the content of the widget for the query mode
     *
     * @param Widget $widget
     * @throws \Exception
     */
    public function getWidgetQueryContent(Widget $widget)
    {
        return parent::getWidgetQueryContent($widget);
    }
}
