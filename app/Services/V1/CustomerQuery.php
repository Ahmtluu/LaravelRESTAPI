<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery
{
    protected $avaibleParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']

    ];

    protected $tableColumnMap = [
        'postalCode' => "postal_code"
    ];

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

            if (isset($query)) {
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
