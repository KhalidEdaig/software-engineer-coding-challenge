<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Libs\JsonResp;

class ResponseController extends BaseController
{
    use  ValidatesRequests;
    /** @var JsonResponse */
    protected $resp;
    function __construct()
    {
        $this->resp = new JsonResp();
    }
    public function row_number()
    {
        $row_number = request()->input('rows');
        return is_numeric($row_number) && $row_number <= 100 ? request()->input('rows') : 20;
    }
}
