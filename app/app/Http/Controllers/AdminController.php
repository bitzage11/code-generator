<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Codes;
use DB;
use Excel;

class AdminController extends Controller
{
    public function download()
    {
        $excel = Excel::load('storage/excel/exports/codes.csv');
        $excel->download();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $check = Codes::where('code', $request->code)->exists();
        if($check == true){

            $code = Codes::where('code_status', '1')->where('code', $request->code)->get();
        
            if(count($code) > 0){

                $code = Codes::findOrFail($code[0]->code_id);

                $code->code_status = '0';
                $code->save();

                return redirect('http://facebook.com/');
            }else{
                return redirect()->back()->with('error', 'Already Used');
            }


        }else{
            return redirect()->back()->with('error', 'Wrong Code');
        }

        
    }

    public function dashboard()
    {
    	$codes = Codes::where('code_status', '1')->take(200)->get();
    	
    	return view('admin.dashboard', compact('codes'));
    }

    public function generator(Request $request)
    {
    	if($request->code < 100001){

            Codes::truncate();
            // $excel = Excel::create('codes');

            $one = $request->code/5;
            $two = $request->code/5;
            $three = $request->code/5;
            $four = $request->code/5;
            $five = $request->code/5;

            $array = array();
            for ($i= 0; $i< $one ; $i++){
                $code = strtoupper(str_random(8));
                $array[$i]['code'] =  $code;
                
                
            }
            
            Codes::insert($array); 
            

            $array2 = array();
            for ($i= 0; $i< $two ; $i++){

                $array2[$i]['code'] =  strtoupper(str_random(8));
            }
            
            Codes::insert($array2); 

            $array3 = array();
            for ($i= 0; $i< $three ; $i++){

                $array3[$i]['code'] =  strtoupper(str_random(8));
            }
            
            Codes::insert($array3); 

            $array4 = array();
            for ($i= 0; $i< $four ; $i++){

                $array4[$i]['code'] =  strtoupper(str_random(8));
            }
            
            Codes::insert($array4); 

            $array5 = array();
            for ($i= 0; $i< $five ; $i++){

                $array5[$i]['code'] =  strtoupper(str_random(8));
            }
            
            Codes::insert($array5); 

            // $data = array_merge($array, $array2, $array3, $array4, $array5);
            
            // $excel->sheet('Sheetname', function($sheet) use($data) {

            //     $sheet->fromArray($data);

            // });

            // $excel->store('xls', storage_path('excel/exports'));

            return redirect('code/excel');
        }else{
            return redirect('admin/dashboard')->with('error', 'Please Enter Less Then 100k');
        }
    }

    public function excelsheet()
    {
        $codes = Codes::where('code_status', '1')->get();
        $excel = Excel::create('codes');

        $data = array();

        foreach ($codes as $key => $value) {
            
            $data[$key]['code'] = $value->code;

        }

        $excel->sheet('Sheetname', function($sheet) use($data) {

            $sheet->fromArray($data);

        });

        $excel->store('csv', storage_path('excel/exports'));

        return redirect('admin/dashboard')->with('success', 'Code Generated');

    }

    private function generate_random(){
        
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];
        
        return $rand;
    }

    public function generateCoupons($count, $length = 8)
    {
        $coupons = [];
        $count2 = 0; 
        while(count($coupons) < $count) {
            do {
                $coupon = strtoupper(str_random($length));
            } while (in_array($coupon, $coupons));
            $coupons[$count2]['code'] = $coupon;
            $count2++;
        }

        return $coupons;
    }
}
