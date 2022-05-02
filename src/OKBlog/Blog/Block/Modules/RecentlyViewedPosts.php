<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block\Modules;

use OKBlog\Blog\Model\Post\Entity;
use OKBlog\Blog\Traits\GetAuthor;
use OKBlog\Framework\View\Block;

class RecentlyViewedPosts extends Block
{
    public const SESSION_KEY_RECENTLY_VIEWED_POSTS =  '';

    public const RECENTLY_VIEWED_QUANTITY = 15;

    protected string $template = '../src/OKBlog/Blog/View/Modules/recently_viewed.php';

    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Framework\Session\Session $session;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    use GetAuthor;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Framework\Session\Session $session
     * @param \OKBlog\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Framework\Session\Session $session,
        \OKBlog\Blog\Model\Post\Repository $postRepository,
        \OKBlog\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->session = $session;
        $this->postRepository = $postRepository;
        $this->setAuthorRepository($authorRepository);
    }

    /**
     * @return Entity[]
     */
    public function getPosts(): array
    {
        $postsIds = (array) $this->session->getData(self::SESSION_KEY_RECENTLY_VIEWED_POSTS);

        /** @var Entity $post */
        if ($post = $this->request->getParameter('post')) {
            if (($key = array_search($post->getPostId(), $postsIds, true)) !== false) {
                unset($postsIds[$key]);
            }
        }

        if (empty($postsIds)) {
            return [];
        }

        $in = str_repeat('?,', count($postsIds) - 1) . '?';
        $select = $this->postRepository->select()
            ->where("post_id IN($in)")
            ->limit(self::RECENTLY_VIEWED_QUANTITY)
            ->orderBy(sprintf('FIELD(post_id,%s)', implode(',', $postsIds)));

        return $this->postRepository->fetchEntities($select, array_values($postsIds));
    }

}