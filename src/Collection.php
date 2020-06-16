<?php

namespace TerminalLib;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class Collection implements Countable, IteratorAggregate
{
    /**
     * @var array
     */
    private $items;

    /**
     * Create a new Collection
     *
     * @param array $items
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Add a new item by key
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function add($key, $value)
    {
        $this->items[$key] = $value;
    }

    /**
     * Count the number of items in the Collection
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Get an iterator for the items
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function has($key)
    {
        return $this->offsetExists($key);
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Get an item from the Collection by key
     *
     * @param mixed $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->items[$key] ?? null;
    }

    /**
     * Sort through each item with a callback
     *
     * @param callable $callback
     * @return void
     */
    public function sort(callable $callback)
    {
        $callback($this->items);
    }

}