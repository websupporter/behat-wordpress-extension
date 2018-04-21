<?php
declare(strict_types=1);
namespace PaulGibbs\WordpressBehatExtension\Driver\Wpcli\Element;

use PaulGibbs\WordpressBehatExtension\Driver\Element\BaseElement;
use PaulGibbs\WordpressBehatExtension\Driver\Element\Interfaces\PluginElementInterface;

/**
 * WP-CLI driver element for plugins.
 */
class PluginElement extends BaseElement implements PluginElementInterface
{
    /**
     * Activate or deactivate specified plugin.
     *
     * @param string $id   Plugin name.
     * @param array  $args Optional data used to update an object.
     */
    public function update($id, $args = [])
    {
        $this->getDriver()->wpcli('plugin', $args['status'], [$id]);
    }

    /*
     * Convenience methods.
     */

    /**
     * Alias of update().
     *
     * @see update()
     *
     * @param string $id   Plugin name to activate.
     * @param array  $args Optional data used to update an object.
     */
    public function activate($id, $args = [])
    {
        $this->update($id, ['status' => 'activate']);
    }

    /**
     * Alias of update().
     *
     * @see update()
     *
     * @param string $id   Plugin name to deactivate.
     * @param array  $args Optional data used to update an object.
     */
    public function deactivate($id, $args = [])
    {
        $this->update($id, ['status' => 'deactivate']);
    }
}
