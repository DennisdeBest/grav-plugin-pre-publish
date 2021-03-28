<?php

namespace Grav\Plugin;

use Grav\Common\Config\Config;
use Grav\Common\Page\Collection;
use Grav\Common\Page\Interfaces\PageInterface;
use Grav\Common\Page\Page;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class PrePublishPlugin
 * @package Grav\Plugin
 */
class PrePublishPlugin extends Plugin
{
    /** @var Config $config */
    protected $config;

    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->config = $this->grav['config']->get('plugins.pre-publish');

        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }

    public function onPageInitialized(Event $event): void
    {
        /** @var PageInterface $page */
        $page = $this->grav['page'];
        $filter = $this->config['filter'];

        $filteredPages =  array_filter($filter, fn($item) => array_key_exists('@page',$item));

        $pageInFilteredPages = array_filter($filteredPages, fn ($item) => $item['@page'] === $page->rawRoute());

        if(count($pageInFilteredPages)){
            $this->enable([
                'onCollectionProcessed' => ['onCollectionProcessed', 10]
            ]);
        }
    }

    public function onCollectionProcessed(Event $event): void
    {
        /** @var Collection $collection */
        $collection = $event['collection'];

        /** @var Page $collectionPage */
        foreach ($collection as $collectionPage) {
            $published = $collectionPage->published();
            $publishedDate = $collectionPage->publishDate();
            $header = $collectionPage->header();
            //Check if the disable_pre_persist has been set in the pages header and if it is true
            $disable = (property_exists($header, 'disable_pre_persist') && $header->disable_pre_persist);
            //If that is the case go to the next page in the collection
            if($disable) continue;
            //Else check the published state and the dates
            if ($published && $publishedDate && ($publishedDate > (new \DateTime())->getTimestamp())) {
                $collection->remove($collectionPage->path());
            }
        }
    }
}
