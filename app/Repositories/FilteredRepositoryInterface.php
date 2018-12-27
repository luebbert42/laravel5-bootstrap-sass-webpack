<?php

namespace App\Repositories;

interface FilteredRepositoryInterface
{

    public function setFilters(array $filters = []) : FilteredRepositoryInterface;

    public function getFilters() : array;

    public function setFilter(string $key, $value) : FilteredRepositoryInterface;
}
