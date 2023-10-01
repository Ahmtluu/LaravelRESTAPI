<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{

    protected $avaibleParams = [];

    protected $tableColumnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
    ];

    public function transform(Request $request)
    {
        $mainQuery = [];

        foreach ($this->avaibleParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->tableColumnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $mainQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $mainQuery;
    }
}
