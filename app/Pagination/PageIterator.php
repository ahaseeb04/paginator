<?php

namespace App\Pagination;

use Iterator;
use App\Pagination\Meta;

class PageIterator implements Iterator
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $pages;

    /**
     * Undocumented variable
     *
     * @var \App\Pagination\Meta
     */
    protected $meta;

    /**
     * Undocumented variable
     *
     * @var integer
     */
    protected $position = 0;

    /**
     * Undocumented function
     *
     * @param array $pages
     * @param \App\Pagination\Meta $meta
     */
    public function __construct(array $pages, Meta $meta)
    {
        $this->pages = $pages;
        $this->meta = $meta;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isCurrentPage()
    {
        return $this->current() === $this->meta->page;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function hasPrevious()
    {
        if ($this->meta->page <= 0) {
            return false;
        }

        return $this->meta->page > 1;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function hasNext()
    {
        return $this->meta->page < $this->meta->lastPage;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function current()
    {
        return $this->pages[$this->position];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function valid()
    {
        return isset($this->pages[$this->position]);
    }
}