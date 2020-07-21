<?php

namespace App\Pagination;

use App\Pagination\Meta;
use App\Pagination\Results;

class Builder
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $builder;

    /**
     * Undocumented function
     *
     * @param [type] $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * Undocumented function
     *
     * @param integer $page
     * @param integer $perPage
     * @return void
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $page = max(1, $page);

        $total = $this->builder->execute()->rowCount();

        $result = $this->builder
            ->setFirstResult($this->getFirstResultIndex($page, $perPage))
            ->setMaxResults($perPage)
            ->execute()
            ->fetchAll();

        return new Results($result, new Meta($page, $perPage, $total));
    }

    /**
     * Undocumented function
     *
     * @param [type] $page
     * @param [type] $perPage
     * @return void
     */
    protected function getFirstResultIndex($page, $perPage)
    {
        return ($page - 1) * $perPage;
    }
}
