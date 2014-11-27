<?php namespace Illuminati\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Builder;

class FirebirdGrammar extends Grammar 
{

	/**
	 * Wrap a table in keyword identifiers.
	 *
	 * @param  string  $table
	 * @return string
	 */
	public function wrapTable($table)
	{
		return parent::wrapTable(strtoupper($table));
	}

	/**
	 * Wrap a single string in keyword identifiers.
	 *
	 * @param  string  $value
	 * @return string
	 */
	protected function wrapValue($value)
	{
		return parent::wrapValue(strtoupper($value));
	}

	/**
	 * Compile a select query into SQL.
	 *
	 * @param  \Illuminate\Database\Query\Builder
	 * @return string
	 */
	public function compileSelect(Builder $query)
	{
		$sql = parent::compileSelect($query);

		if ($query->unions) {
			$sql = '('.$sql.') '.$this->compileUnions($query);
		}

		if (isset($query->limit) || isset($query->offset)) {
			$limit = isset($query->limit) ? ' first '.(int) $query->limit : '';
			$offset = isset($query->offset) ? ' skip '.(int) $query->offset : '';
			$sql = str_replace("select", "select".$limit.$offset, $sql);
		}

		return $sql;
	}

	/**
	 * Compile the "limit" portions of the query.
	 *
	 * @param  \Illuminate\Database\Query\Builder  $query
	 * @param  int  $limit
	 * @return string
	 */
	protected function compileLimit(Builder $query, $limit, $type = '')
	{
		return '';
	}

	/**
	 * Compile the "offset" portions of the query.
	 *
	 * @param  \Illuminate\Database\Query\Builder  $query
	 * @param  int  $offset
	 * @return string
	 */
	protected function compileOffset(Builder $query, $offset)
	{
		return '';
	}
}
