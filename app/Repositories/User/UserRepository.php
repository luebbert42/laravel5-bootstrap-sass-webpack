<?php

 namespace App\Repositories\User;
 use App\Repositories\FilteredRepositoryInterface;
 use Illuminate\Support\Collection;
 use Illuminate\Database\Eloquent\Builder;
 use Illuminate\Pagination\LengthAwarePaginator;


class UserRepository extends \App\Repositories\BaseRepository implements UserInterface, FilteredRepositoryInterface
{

    protected $model;

    use \App\Repositories\Filters;

    public static $defaultFilters = [
        'sort' => 'lastname',
        'order' => self::ORDER_ASC,
        'active' => null,
    ];


    public function __construct(\App\Models\User $user)
    {
        $this->model = $user;
    }

    public function collectUsers(int $limit = 0, int $offset = 0): Collection
    {
        $query = $this->getFilteredQuery();
        if ($offset) {
            $query->skip($offset);
        }

        if ($limit) {
            $query->take($limit);
        }
        return $query->get();
    }


    public function collectUsersPaginated(int $numElements = 50): LengthAwarePaginator
    {
        $query = $this->getFilteredQuery();
        $pager = $query->paginate($numElements);
        return $pager;
    }


    protected function getFilteredQuery(): Builder
    {
        $filters = $this->getFilters();
        $query = \App\Models\User::query();
        /**
         *
        if ($fieldname = $filters['fieldname']) {
            $query->where('fieldname', '=', $fieldname);
        }
        */
        $query->orderBy($filters['sort'], $filters['order']);
        return $query;
    }


    public function findRoleBySlug($roleSlug) {
        if (!isset($roleSlug) && !(is_string($roleSlug))) {
            throw new \InvalidArgumentException("String expected for roleSlug");
        }
        return \App\Models\Role::where("role_slug", $roleSlug)->first();
    }


    protected function getModel(): string
    {
        return \App\Models\User::class;
    }



}
