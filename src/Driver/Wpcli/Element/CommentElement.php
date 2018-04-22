<?php
declare(strict_types=1);
namespace PaulGibbs\WordpressBehatExtension\Driver\Wpcli\Element;

use PaulGibbs\WordpressBehatExtension\Driver\Element\Interfaces\CommentElementInterface;
use function PaulGibbs\WordpressBehatExtension\Util\buildCLIArgs;
use UnexpectedValueException;
use PaulGibbs\WordpressBehatExtension\Driver\Wpcli\WpcliDriverInterface;

/**
 * WP-CLI driver element for post comments.
 */
class CommentElement implements CommentElementInterface
{
    /**
     * @var WpcliDriverInterface $driver;
     */
    var $driver;

    public function __construct(WpcliDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Create an item for this element.
     *
     * @param array $args Data used to create an object.
     *
     * @return mixed The new item.
     */
    public function create($args)
    {
        $wpcli_args = buildCLIArgs(
            array(
                'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_date',
                'comment_date_gmt', 'comment_parent', 'comment_post_ID', 'user_id', 'comment_agent', 'comment_author_IP',
            ),
            $args
        );

        array_unshift($wpcli_args, '--porcelain');
        $comment_id = (int) $this->driver->wpcli('comment', 'create', $wpcli_args)['stdout'];

        return $this->get($comment_id);
    }

    /**
     * Retrieve an item for this element.
     *
     * @param int|string $id   Object ID.
     * @param array      $args Optional data used to fetch an object.
     *
     * @throws \UnexpectedValueException
     *
     * @return mixed The item.
     */
    public function get($id, $args = [])
    {
        $wpcli_args = buildCLIArgs(
            array(
                'field',
                'fields',
            ),
            $args
        );

        array_unshift($wpcli_args, $id, '--format=json');
        $comment = $this->driver->wpcli('comment', 'get', $wpcli_args)['stdout'];
        $comment = json_decode($comment);

        if (! $comment) {
            throw new UnexpectedValueException(sprintf('[W500] Could not find comment with ID %d', $id));
        }

        return $comment;
    }

    /**
     * Delete an item for this element.
     *
     * @param int|string $id   Object ID.
     * @param array      $args Optional data used to delete an object.
     */
    public function delete($id, $args = [])
    {
        $wpcli_args = buildCLIArgs(
            ['force'],
            $args
        );

        array_unshift($wpcli_args, $id);

        $this->driver->wpcli('comment', 'delete', $wpcli_args);
    }
}
