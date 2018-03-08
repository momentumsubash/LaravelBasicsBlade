<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Excel;

class FileController extends Controller
{
    //


    public function importExport()
	{
		return view('pages.importExport');
	}


	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$data = Employee::get()->toArray();
		return Excel::create('OurSalaryStructure', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}


	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{


		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();


			$data = Excel::load($path, function($reader) {})->get();


			if(!empty($data) && $data->count()){


				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {		
							$insert[] = ['name' => $v['name'], 'email' => $v['email'],'salary' => $v['salary'],'tax' => $v['tax']];
						}
					}
				}

				
				if(!empty($insert)){
					Employee::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}


			}


		}


		return back()->with('error','Please Check your file, Something is wrong there.');
	}


}

