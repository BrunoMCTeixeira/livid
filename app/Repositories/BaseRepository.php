<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;

abstract class BaseRepository
{
	protected $model;
	
	protected function newQuery()
	{
		return app($this->model)->newQuery();
	}
	
	/**
	 * Perform a custom query
	 */
	protected function doQuery($query = null, $take = 15, $paginate = true)
	{
		if (is_null($query)):
		  $query = $this->newQuery();
		endif;

		if (true == $paginate):
		  return $query->paginate($take);
		endif;

		if ($take > 0 || false !== $take):
		  $query->take($take);
		endif;

		return $query->get();
	}
	
	
	/**
	 * Find in the by a custom field column
	 */
	public function findByField($att, $column)
	{
		return $this->doQuery()->where($att, $column)->first();
	}
	
	
	/**
	 * Find specifically by the record id
	 */
	public function findByID($id, $fail = true)
	{
		if($fail):
		  return $this->newQuery()->findOrFail($id);
		endif;
		
		return $this->newQuery()->find($id);
	}
	
	/**
	 * Create a record in a specific model
	 * @param  [[ARRAY]] $fields - Array Request
	 */
	public function create($fields)
	{
		try 
		{
			$modelInstance = app($this->model);
			$modelInstance->fill($fields);
			$modelInstance->save();
		}
		catch(Exception $e)
		{
			return abort(404);
		}
			
		return $modelInstance;
	}
	
	
	public function update($fields, $entity, $identifier = 'id')
	{
		try 
		{
			$modelInstance = app($this->model)->where($identifier, $entity->id)->update($fields);
		}
		catch(Exception $e)
		{
			return abort(404);
		} 
		
		
		return $modelInstance;
	}
	
	public function delete()
	{}
}