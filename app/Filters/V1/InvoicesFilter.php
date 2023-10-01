<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class InvoicesFilter extends ApiFilter
{

    protected $avaibleParams = [
        'customerId' => ['eq'],
        'amount' => ['gt', 'lt', 'lte', 'gte', 'eq'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['gt', 'lt', 'lte', 'gte', 'eq'],
        'paidDate' => ['gt', 'lt', 'lte', 'gte', 'eq'],

    ];

    protected $tableColumnMap = [
        'customerId' => "customer_id",
        'billedDate' => "billed_date",
        'paidDate' => "paid_date",
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!='
    ];
}
