<?php

namespace Index\Controller;

use Page\Model\Page;
use Phalcon\Exception;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->view->bodyClass = 'home';

        $page = Page::findCachedBySlug('index');
        if (!$page) {
            throw new Exception("Page 'index' not found");
        }
        $this->tag->prependTitle($page->getHeadTitle());
        $this->helper->meta()->set('description', $page->getMetaDescription());
        $this->helper->meta()->set('keywords', $page->getMetaKeywords());
        $this->view->page = $page;

        $this->helper->menu->setActive('index');
    }

}
