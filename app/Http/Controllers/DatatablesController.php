<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Yajra\DataTables\Html\Builder;

class DatatablesController extends Controller
{
    //
    public function getIndex()
    {
        return view('datatables.data');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

    	return \Datatables::of(User::query())->make(true);

    }

    public function index(Request $request, Builder $htmlBuilder) {
        if ($request->ajax()) {
            return datatables()->eloquent($this->query())->make(true);
        }

        $dataTable = $htmlBuilder->columns($this->getColumns());
        return view('datatables.data', compact('dataTable'));
    }

    public function query() {
        $query = User::query();
        return $query;
    }

    public function getColumns() {
        $return_value = [
            'id'           => ['title' => 'ID'],
            'name'         => ['title' => 'Name'],
            'email'        => ['title' => 'Email'],
        ];
        return $return_value;
    }
}
