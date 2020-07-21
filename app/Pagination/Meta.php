<?php

namespace App\Pagination;

class Meta
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $page;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $perPage;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $total;

    /**
     * Undocumented function
     *
     * @param [type] $page
     * @param [type] $perPage
     * @param [type] $total
     */
    public function __construct($page, $perPage, $total)
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function page()
    {
        return (int) $this->page;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function perPage()
    {
        return (int) $this->perPage;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function total()
    {
        return (int) $this->total;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function lastPage()
    {
        return (int) ceil($this->total() / $this->perPage());
    }

    /**
     * Undocumented function
     *
     * @param [type] $property
     * @return void
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return null;
    }
}
