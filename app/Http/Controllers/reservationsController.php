<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class reservationsController extends Controller
{
   	public function index(Request $request)
    {	
    	$id = $request->id;
    	$publication = DB::table('publications')->where('id', $id)->first();
    	$pet = DB::table('tpets')->where('id', $request->pet)->first();

    	$datetime1 = date_create($request->beginDate);
		$datetime2 = date_create($request->endDate);
		$interval = date_diff($datetime1, $datetime2);
		$dias = 0;
		$i = 0;
		
		
		$fechaActual = date("Y-m-d", strtotime('now'));
		
		if ($datetime1 == $fechaActual) {
			return back();
		}else{
		
			if ($datetime2 == $fechaActual) {
				$datetime2 = $datetime1;
			}
			

			if ($datetime1 > $datetime2) {
				return back();
			}else{


				if ($interval->format('%R%a días') == 0) {

					$dias = 1;
					$cost = $publication->price;
					$total = $dias*$cost;
					
					
				}else{

					$dias = $interval->format('%a');
					$cost = $publication->price;
					$total = $dias*$cost;
					
									
				}
				$idHost = $publication->id_user;
				
				return View::make('publicate.testResults')->with(['beginDate' => $request->beginDate, 'endDate' => $request->endDate, 'pet' =>$pet->type, 'days' => $dias, 'total' => $total, 'publicationID' => $id,  'idHost' => $idHost]);
			}
		}
    	
    }

    public function confirmation(Request $request)
    {	
    	DB::table('reservations')->insert([
                'id_publication'=> $request->publication_id,
                'user_id'=> $request->user_id,
                'host_id'=> $request->idHost,
                'beginDate'=> $request->beginDate,
                'endDate'=> $request->endDate
                ]);


    	$datetime1 = date_create($request->beginDate);
		$datetime2 = date_create($request->endDate);
		$interval = date_diff($datetime1, $datetime2);
		$dias = 0;
		$i = 0;

		if ($interval->format('%R%a días') == 0) {

					$dias = 1;
				
					
					
				}else{

					$dias = $interval->format('%a');
					
					
									
				}

		while ($i <= $dias) {
             
            $days[]= date('Y-m-d', strtotime($request->beginDate. ' + '.$i.' days'));
                      
            $i++;
    	}

    	foreach ($days as $d) {
    		DB::table('invervals')->insert([
                'day'=> $d,
                'id_host'=> $request->idHost,
            ]);	
    	}
    	
    }
}
