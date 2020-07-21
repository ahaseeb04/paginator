<?php

namespace App\Pagination\Renderers;

use App\Pagination\Meta;

abstract class RendererAbstract
{
    /**
     * Undocumented variable
     *
     * @var \App\Pagination\Meta
     */
    protected $meta;

    /**
     * Undocumented function
     *
     * @param \App\Pagination\Meta $meta
     */
    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function pages()
    {
        $lrCount = 2;
        $range = range(1, $this->meta->lastPage);

        $endDifference = max(0, $this->meta->page - ($this->meta->lastPage - $lrCount) + 1);

        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page - $lrCount) - $endDifference)), 
            0, 
            $lrCount * 2
        );

        array_unshift($range, 1);
        $range[] = $this->meta->lastPage;

        return array_unique($range);
    }
    
    abstract public function render();
}