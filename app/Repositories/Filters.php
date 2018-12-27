<?php

namespace App\Repositories;

trait Filters
{
    /**
     * @var array
     */
    protected $filters = [];

    public function setFilters(array $filters = []) : FilteredRepositoryInterface
    {
        $this->filters = array_merge($this->filters, $filters);
        return $this;
    }

    public function getFilters() : array
    {
        return array_merge(self::$defaultFilters, $this->filters);
    }

    public function setFilter(string $key, $value) : FilteredRepositoryInterface
    {
        $this->filters[$key] = $value;
        return $this;
    }


    abstract protected function getModel() : string;
}
