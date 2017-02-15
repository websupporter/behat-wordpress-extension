<?php
namespace PaulGibbs\WordpressBehatExtension\Driver;

use PaulGibbs\WordpressBehatExtension\Exception\UnsupportedDriverActionException;

/**
 * Common base class for WordPress drivers.
 *
 * A driver represents and manages the connection between the Behat environment and a WordPress site.
 */
abstract class BaseDriver implements DriverInterface
{
    /**
     * Track driver bootstrapping.
     *
     * @var bool
     */
    protected $is_bootstrapped = false;


    /**
     * Has the driver has been bootstrapped?
     */
    public function isBootstrapped()
    {
        return $this->is_bootstrapped;
    }

    /**
     * Set up anything required for the driver.
     *
     * Called when the driver is used for the first time.
     */
    public function bootstrap()
    {
        $this->is_bootstrapped = true;
    }

    /**
     * Clear object cache.
     */
    public function clearCache()
    {
        throw new UnsupportedDriverActionException('clear cache in ' . static::class);
    }

    /**
     * Activate a plugin.
     *
     * @param string $plugin
     */
    public function activatePlugin($plugin)
    {
        throw new UnsupportedDriverActionException('activate plugins in ' . static::class);
    }

    /**
     * Deactivate a plugin.
     *
     * @param string $plugin
     */
    public function deactivatePlugin($plugin)
    {
        throw new UnsupportedDriverActionException('deactivate plugins in ' . static::class);
    }

    /**
     * Switch active theme.
     *
     * @param string $theme
     */
    public function switchTheme($theme)
    {
        throw new UnsupportedDriverActionException('switch themes in ' . static::class);
    }

    /**
     * Create a term in a taxonomy.
     *
     * @param string $term
     * @param string $taxonomy
     * @param array  $args     Optional. Set the values of the new term.
     * @return array {
     *     @type int    $id   Term ID.
     *     @type string $slug Term slug.
     * }
     */
    public function createTerm($term, $taxonomy, $args = [])
    {
        throw new UnsupportedDriverActionException('create terms in ' . static::class);
    }

    /**
     * Delete a term from a taxonomy.
     *
     * @param int    $term_id
     * @param string $taxonomy
     */
    public function deleteTerm($term_id, $taxonomy)
    {
        throw new UnsupportedDriverActionException('delete terms in ' . static::class);
    }

    /**
     * Create content.
     *
     * @param array $args Set the values of the new content item.
     * @return array {
     *     @type int    $id   Content ID.
     *     @type string $slug Content slug.
     * }
     */
    public function createContent($args)
    {
        throw new UnsupportedDriverActionException('create content in ' . static::class);
    }

    /**
     * Delete specified content.
     *
     * @param int   $id   ID of content to delete.
     * @param array $args Optional. Extra parameters to pass to WordPress.
     */
    public function deleteContent($id, $args = [])
    {
        throw new UnsupportedDriverActionException('delete content in ' . static::class);
    }

    /**
     * Create a comment.
     *
     * @param array $args Set the values of the new comment.
     * @return array {
     *     @type int $id Content ID.
     * }
     */
    public function createComment($args)
    {
        throw new UnsupportedDriverActionException('create comments in ' . static::class);
    }

    /**
     * Delete specified comment.
     *
     * @param int   $id   ID of comment to delete.
     * @param array $args Optional. Extra parameters to pass to WordPress.
     */
    public function deleteComment($id, $args = [])
    {
        throw new UnsupportedDriverActionException('delete comments in ' . static::class);
    }

    /**
     * Export WordPress database.
     *
     * @return string Absolute path to database SQL file.
     */
    public function exportDatabase()
    {
        throw new UnsupportedDriverActionException('export the database in ' . static::class);
    }

    /**
     * Import WordPress database.
     *
     * @param string $import_file Relative path and filename of SQL file to import.
     */
    public function importDatabase($import_file)
    {
        throw new UnsupportedDriverActionException('import the database in ' . static::class);
    }

    /**
     * Create a user.
     *
     * @param string $user_login User login name.
     * @param string $user_email User email address.
     * @param array  $args       Optional. Extra parameters to pass to WordPress.
     * @return array {
     *     @type int    $id   User ID.
     *     @type string $slug User slug (nicename).
     * }
     */
    public function createUser($user_login, $user_email, $args = [])
    {
        throw new UnsupportedDriverActionException('create users in ' . static::class);
    }

    /**
     * Delete a user.
     *
     * @param int   $id   ID of user to delete.
     * @param array $args Optional. Extra parameters to pass to WordPress.
     */
    public function deleteUser($id, $args = [])
    {
        throw new UnsupportedDriverActionException('delete users in ' . static::class);
    }

    /**
     * Get a User's ID from their username.
     *
     * @param string $username The username of the user to get the ID of
     * @return int ID of the user user.
     */
    public function getUserIdFromLogin($username)
    {
        throw new UnsupportedDriverActionException('get user\'s ID in ' . static::class);
    }

    /**
     * Start a database transaction.
     */
    public function startTransaction()
    {
        throw new UnsupportedDriverActionException('start a database transaction in ' . static::class);
    }

    /**
     * End (rollback) a database transaction.
     */
    public function endTransaction()
    {
        throw new UnsupportedDriverActionException('rollback a database transaction in ' . static::class);
    }
}
