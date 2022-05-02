<?php

declare(strict_types=1);

namespace OKBlog\Blog\Controller;

use OKBlog\Blog\Block\Modules\RecentlyViewedPosts;
use OKBlog\Framework\Http\Response\Raw;
use OKBlog\Blog\Model\Post\Entity;

class Post implements \OKBlog\Framework\Http\ControllerInterface
{
    private  \OKBlog\Framework\View\PageResponse $pageResponse;

    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Framework\Session\Session $session;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Framework\Session\Session $session
     * @param \OKBlog\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Framework\Session\Session $session,
        \OKBlog\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
        $this->session = $session;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        /** @var Entity $post */
        $post = $this->request->getParameter('post');
        $recentlyViewedPosts = (array) $this->session->getData(RecentlyViewedPosts::SESSION_KEY_RECENTLY_VIEWED_POSTS);
        array_unshift($recentlyViewedPosts, $post->getPostId());
        $this->session->setData(
            RecentlyViewedPosts::SESSION_KEY_RECENTLY_VIEWED_POSTS,
            array_unique($recentlyViewedPosts)
        );

        return $this->pageResponse->setBody(\OKBlog\Blog\Block\PostBlock::class);
    }
}