<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use PDF;
use DateTime;
use App;
Use Storage;
use File;
use Response;
use Session;
use Carbon\Carbon;
use Redirect;
// use Illuminate\Contracts\Filesystem\Filesystem as Storage;

class PdfController extends Controller
{



					public function render_pdf($value='')
					{

						$data = Employee::where('name','Pradeep Acharya')->get();

						$date= new DateTime();
						// dd($data[0]);
						$now=$date->format('Ym');

						$html = view('pages.pdf', ['data' => $data])->render();
				$pdf = App::make('dompdf.wrapper');
				$invPDF = $pdf->loadHTML($html);

				$invPDF->path='docs/'.$data[0]['name'].$now.'.pdf';

				if(File::isFile($invPDF->path)){
					echo "file already exists";
					Session::flash('pdf_file',$invPDF->path);
						dd($invPDF->path);
					return $pdf->download('invoice.pdf');


				}else{

					Storage::disk('s3')->put($invPDF->path,$invPDF->output());
					
					Session::flash('pdf_file',$invPDF->path);
					dd($invPDF->path);
					


				}
				

				return $pdf->download('invoice.pdf');


					}

	public function get_pdf($value='')
	{
		// $file=Storage::disk('local')->download('pdf/a.pdf','.pdf');
		// $file=Storage::get('pdf/a.pdf','.pdf');

		$exists = Storage::disk('s3')->exists('pdf/201804.pdf');
		if($exists){
					$assetPath =Storage::disk('s3')->temporaryUrl('pdf/201804.pdf',Carbon::now()->addMinutes(5));
			$filename = basename($assetPath);

        // return file_put_contents($filename,file_get_contents($assetPath));
		$response=	Response::file('Pradeep Acharya201803.pdf',  ['location' => $assetPath]);
		return $response;
		}


		}

 

}
