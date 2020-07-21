<?php

namespace App\Pagination;

use App\Pagination\Meta;
use App\Pagination\Renderers\PlainRenderer;

class Results
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $results;

    /**
     * Undocumented variable
     *
     * @var \App\Pagination\Meta
     */
    protected $meta;

    /**
     * Undocumented function
     *
     * @param array $results
     * @param \App\Pagination\Meta $meta
     */
    public function __construct(array $results, Meta $meta)
    {
        $this->results = $results;
        $this->meta = $meta;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function get()
    {
        return $this->results;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function render()
    {
        return (new PlainRenderer($this->meta))->render();
    }
}
