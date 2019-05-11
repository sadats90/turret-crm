<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
Use Redirect;
use Session;
use App\Group_Sales_Report;

use App\Home_Details_Report;

use App\Http\Controllers\Controller;

class HomeDetailsController extends Controller
{
	public function __construct() {
	    $store_code="60701";
	    // if(isset(Auth::user()->id)!=true){

	    //     Redirect::to('/')->send();
	    //  }
	    //  if($store_code==null || $store_code==''){

	    //     Redirect::to('/')->send();
	    // }

        $this->company_code = "535";
        $this->emp_code = "15051971";
	}

    public function index(Request $request) {

    	$user="222";
        $company_info = DB::table('users')
            ->join('employee_msts', 'employee_msts.Emp_Code', '=', 'users.Emp_Code')
            ->join('company_msts', 'company_msts.Company_Code', '=', 'employee_msts.Company_Code')
            ->select('employee_msts.Company_Code','company_msts.Company_Name','company_msts.Company_Address')
            ->where('users.id',$user)
            ->where('employee_msts.delete_cd','=','Y')
            ->get()->toArray();
        //dd($company_info);
        $company_code=$company_info[0]->Company_Code;
        $company_name=$company_info[0]->Company_Name;
        $company_address=$company_info[0]->Company_Address;

        //===========================================
        //Adding company code into session
        // session(['the_company_code' => $company_code]);

        // //Adding company code into session
        // session(['the_emp_code' => emp_code]);
        //===========================================


        //Initialize fields
        $place_type = $period_type = $product_type = 0;
        $store_ar = $article_ar = array();
        $from_date = $to_date = '';

        //$data = $request->session()->all();
        //dd($data);
        $place_type = $request->input('place_type') ?? 0;
        $places_ar = $request->input('place') ?? array();

        $period_type = $request->input('period_type') ?? 0;
        $periods_ar = $request->input('period') ?? array();

        $product_type = $request->input('product_type') ?? 0;
        $products_ar = $request->input('product') ?? array();

        $store_ar = $this->get_stores_by_place_type($place_type, $places_ar);

        $date_ar = $this->get_from_to_date($period_type, $periods_ar);
        $from_date = $date_ar['StartDate'];
        $to_date = $date_ar['EndDate'];

        $article_ar = $this->get_articles_by_product_type($product_type, $products_ar);

        $home_details_report = new Home_Details_Report();
        $report_data = $home_details_report->details_report($place_type, $period_type, $product_type, $store_ar, $from_date, $to_date, $article_ar) ?? array();

        // dd($report_data);

        $widget_data['tot_qty'] = $widget_data['tot_value'] = $widget_data['tot_discount'] = $widget_data['average'] = $widget_data['tot_trx'] = $widget_data['abs'] = $widget_data['abv'] = $widget_data['diversity'] = 0;

        $tot_fw_value = $tot_nfw_value = 0;

        //init chart
        $bar_chart['periods'] = array();
        $bar_chart['last_year'] = $bar_chart['estimate'] = $bar_chart['actuals'] = array();

        if ( count($report_data) > 0 ) {
            foreach ($report_data as $key => $report) {
                $widget_data['tot_qty'] += $report->tot_qty;
                $widget_data['tot_value'] += $report->tot_value;
                $widget_data['tot_discount'] += $report->tot_discount;
                $widget_data['tot_trx'] += $report->tot_trx;

                $tot_fw_value += $report->tot_fw_value;
                $tot_nfw_value += $report->tot_nfw_value;

                //pushing for chart
                array_push($bar_chart['periods'], $report->week_in);
                array_push($bar_chart['last_year'], rand(0, $report->tot_fw) );
                array_push($bar_chart['estimate'], $report->total_est);
                array_push($bar_chart['actuals'], $report->tot_fw);
            }
            $widget_data['tot_value'] = round($widget_data['tot_value']);
            $widget_data['tot_discount'] = round($widget_data['tot_discount']);
            $widget_data['average'] = $widget_data['tot_value'] / $widget_data['tot_qty'];
            $widget_data['average'] = round($widget_data['average']);
            $widget_data['average'] = $widget_data['average'];

            $widget_data['abs'] = $widget_data['tot_qty'] / $widget_data['tot_trx'];
            $widget_data['abs'] = round($widget_data['abs'], 2);

            $widget_data['abv'] = $widget_data['tot_value'] / $widget_data['tot_trx'];

            $widget_data['diversity'] = ($tot_nfw_value * 100)/$widget_data['tot_value'];
            $widget_data['diversity'] = round($widget_data['diversity']);
        }

        if ($place_type != '0' || $period_type != '0' || $product_type != '0') {
            //dd($report_data);
        }

        /*echo '<pre>';
        var_export($date_ar);
        var_export($store_ar);
        var_export($article_ar);
        echo '</pre>';

        dd('......');*/

        //dd($article_ar);

        /*echo $period_type.'<br>';
        echo $from_date.'<br>';
        echo $to_date.'<br>';
        die();*/
       // dd($widget_data);
        return view('index2')->with(compact('widget_data', 'bar_chart'));
    }

    //get stores by place
    public function get_stores_by_place_type($place_type, $places) {

        $today_date = date('Y-m-d');

        $store_ar = array();

        if ($place_type == '0' || count($places) == 0 ) {
            $stores=DB::table('store_employee')
                    ->join('store_msts', 'store_employee.Store_code', '=', 'store_msts.Store_Code')
                    ->select('store_msts.Store_Name','store_msts.Store_Code','store_msts.id')
                    ->where('store_employee.company_code', $this->company_code)
                    ->where('store_employee.Emp_Code',$this->emp_code)
                    ->where('store_msts.delete_cd','=','Y')
                    ->where('store_employee.delete_cd','=','Y')
                    ->orderBy('store_msts.Store_Code')
                    ->get();
            if ($stores) {
                $store_ar = $stores->toArray();
            }
            //return $store_ar;
        } else {

            $stores = DB::table('store_employee')
                ->join('store_msts', 'store_employee.Store_code', '=', 'store_msts.Store_Code')
                ->where('store_employee.company_code', $this->company_code)
                ->where('store_employee.Emp_Code',$this->emp_code)
                ->where('store_msts.delete_cd','=','Y')
                ->where('store_employee.delete_cd','=','Y')
                ->where(function($query) use($place_type, $places, $today_date){
                    if ($place_type == 1 && count($places) > 0) {

                        $districts = DB::table('district_msts')
                            ->whereIn('district_msts.area_code', $places)
                            ->where('district_msts.company_code', $this->company_code)
                            ->distinct('district_msts.District_Code')
                            ->select('district_msts.district_code')
                            ->get()->toArray();

                        $districts_ar = array();
                        foreach ($districts as $key => $district) {
                            array_push($districts_ar, $district->district_code);
                        }

                        //dd($districts_ar);

                        $query->whereIn('store_msts.district_code', $districts_ar);

                    } else if($place_type == 2 && count($places) > 0) {
                        $query->whereIn('store_msts.district_code', $places);
                    } else if($place_type == 3 && count($places) > 0) {
                        $query->whereIn('store_msts.Concept_Code', $places);
                    } else if($place_type == 4 && count($places) > 0) {
                        $query->whereIn('store_msts.Store_Code', $places);
                    }
                    return $query;
                })
                ->select('store_msts.Store_Name','store_msts.Store_Code','store_msts.id')
                ->orderBy('store_msts.Store_Code')
                ->get();

            if ($stores->count() > 0) {
                $store_ar = $stores->toArray();
            }
        }

        $the_store_ar = array();
        if (count($store_ar) > 0) {
           foreach ($store_ar as $key => $store) {
               array_push($the_store_ar, $store->Store_Code);
           }
        }

        return $the_store_ar;
    }

    //get from and to_date
    public function get_from_to_date($period_type, $periods) {

        $today_date = date('Y-m-d');

        $date_ar['StartDate'] = $date_ar['EndDate'] = '';

        if ($period_type == '0') {
            $period = DB::table('calendars')
                ->where('Company_Code', $this->company_code)
                ->where('PeriodType', 'Week')
                ->where('StartDate', '<=', $today_date)
                ->where('EndDate', '>=', $today_date)
                ->select('StartDate', 'EndDate')
                ->first();
            
            if ($period) {
                $date_ar['StartDate'] = $period->StartDate;
                $date_ar['EndDate'] = $period->EndDate;
            }
            return $date_ar;
        }
        $period = DB::table('calendars')
            ->where('Company_Code', $this->company_code)
            ->where('PeriodType', $period_type)
            ->where(function($query) use($period_type, $periods, $today_date){
                    if (count($periods) > 0) {
                        $query->whereIn('id', $periods);
                    } else {
                        $query->where('StartDate', '<=', $today_date)
                            ->where('EndDate', '>=', $today_date);
                    }
                    return $query;
                }
            )
            ->select('id', 'StartDate', 'EndDate')
            ->get();

        if ($period->count() > 0) {
            $date_ar['id'] = $period->first()->id;
            $date_ar['StartDate'] = $period->min('StartDate');
            $date_ar['EndDate'] = $period->max('EndDate');
            $date_ar['EndDate'] = ( $date_ar['EndDate'] > date('Y-m-d') ) ? date('Y-m-d')  : $date_ar['EndDate'];

            //echo $period_type;
            //dd($date_ar);
        }
        return $date_ar;
    }


    //Function get articles by product type
    public function get_articles_by_product_type($product_type, $products) {
        $today_date = date('Y-m-d');

        $article_ar = array();

        if ($product_type == '0' || count($products) == 0 ) {
            $articles=DB::table('article_msts')
                    ->where('company_code', $this->company_code)
                    ->where('delete_cd','=','Y')
                    ->select('Article_mstID')
                    ->get();
            if ($articles) {
                $article_ar = $articles->toArray();
            }
            //return $article_ar;
        } else {
            $articles = DB::table('article_msts')
                ->where('company_code', $this->company_code)
                ->where('delete_cd','=','Y')
                ->where(function($query) use($product_type, $products, $today_date){
                    if ($product_type == 1 && count($products) > 0) {

                        $query->whereIn('Gender_mstID', $products);

                    } else if($product_type == 2 && count($products) > 0) {
                        $query->whereIn('Category_Code', $products);
                    } else if($product_type == 3 && count($products) > 0) {
                        $query->whereIn('Sub_category_mstID', $products);
                    } else if($product_type == 4 && count($products) > 0) {
                        $query->whereIn('Brand_mstID', $products);
                    }
                    return $query;
                })
                ->select('Article_mstID')
                ->get();

            if ($articles->count() > 0) {
               $article_ar = $articles->toArray();
            }
        }

        $the_article_ar = array();
        if (count($article_ar) > 0) {
           foreach ($article_ar as $key => $article) {
               array_push($the_article_ar, $article->Article_mstID);
           }
        }

        return $the_article_ar;
    }



    
    //prosperity_card
    public function prosperity_card(Request $request) {

        $store_id = \Session::get('store_id');
        $store_name=\Session::get('store_name');
        $user=Auth::user()->name;
        $user_id=Auth::user()->id;

        $emp_info = DB::table('users')
            ->select('users.Emp_Code')
            ->where('users.id',$user_id)
            ->get()->toArray();
        foreach ($emp_info as $c) {
            $emp_code = $c->Emp_Code;
        }
        $stores_arr=DB::table('store_employee')
            ->join('store_msts', 'store_employee.Store_code', '=', 'store_msts.Store_Code')
            ->select('store_msts.Store_Name','store_msts.Store_Code','store_msts.id')
            ->where('store_employee.Emp_Code',$emp_code)
            ->where('store_msts.delete_cd','=','Y')
            ->where('store_employee.delete_cd','=','Y')
            ->orderBy('store_msts.Store_Code')
            ->get()->toArray();

        $store = array();
        foreach ($stores_arr as $key => $item) {
            array_push($store, $item->Store_Code);
        }

        //dd($store);

        //Report by store
        $date_from = '2019-03-01';
        $date_to = '2019-05-01';
        Session::put('selected_cashier_of_group_store', $store);
        Session::put('selected_cashier_of_group_date1', $date_from);
        Session::put('selected_cashier_of_group_date2', $date_to);
        $sales_model = new Group_Sales_Report();
        $report_info = $sales_model->report_by_store($store, $date_from, $date_to);

        //dd($report_info);

        $today=date("Y-m-d");
        $tomorrow = date('Y-m-d', strtotime('+1 days'));
        $yesterday=date('Y-m-d', strtotime('-1 days'));
        //dd($yesterday);
        $data = DB::table("sales_chds")
                    ->select(DB::raw("SUM(sales_chds.Quantity) as total_qty"), DB::raw("SUM(sales_chds.Price_1) as tot_price1") )
                ->where('sales_chds.updated_at','>=',$today)
                ->where('sales_chds.updated_at','<=',$tomorrow)
                ->orderBy('total_qty','DSC')
                ->get();
        $data2 = DB::table("sales_chds")
        ->select(DB::raw("SUM(sales_chds.Price_1) as tot_price1"))
        ->where('sales_chds.updated_at','>=',$today)
        ->where('sales_chds.updated_at','<=',$tomorrow)
        ->get()->toArray();
                //  dd($data2);
        $user=Auth::user()->id;
        $company_info = DB::table('users')
            ->join('employee_msts', 'employee_msts.Emp_Code', '=', 'users.Emp_Code')
            ->join('company_msts', 'company_msts.Company_Code', '=', 'employee_msts.Company_Code')
            ->select('employee_msts.Company_Code','company_msts.Company_Name','company_msts.Company_Address')
            ->where('users.id',$user)
            ->where('employee_msts.delete_cd','=','Y')
            ->get()->toArray();
        //dd($company_info);
        $company_code=$company_info[0]->Company_Code;
        $company_name=$company_info[0]->Company_Name;
        $company_address=$company_info[0]->Company_Address;
        if(file_exists( public_path().'/uploads/company/original/'.$company_code.'.jpg' ))
        {
            $comp_img='uploads/company/original/'.$company_code.'.jpg';
        }
        else{
            $comp_img='uploads/company/thumb/default.jpg';
        }
        //dd($comp_img);


        $tsq = DB::table('sales_chds')
            ->select('Quantity')
            ->get()->toArray();
        $newtsq=$tsq[0]->Quantity;  



        // for receive



        $data3 = DB::table("receive_msts")
        ->join('supply_msts', 'supply_msts.Supply_Invoice_No', '=', 'receive_msts.Supply_Invoice_No')
        ->select('receive_msts.Receive_Invoice_No as invoice','supply_msts.Date as Date_Send',
        'receive_msts.Received_Date as Booked_Date','supply_msts.Supply_Sender_Code as From',
        'receive_msts.Receive_Total_QTY as Shoe','receive_msts.Receive_Total_Value as Value')
        ->where('receive_msts.created_at','>=',$today)
        ->where('receive_msts.created_at','<=',$tomorrow)
        ->where('receive_msts.delete_cd','=','Y')
        ->where('receive_msts.Status','=','Received')
        ->get()->toArray();
        // dd($data3);
        if ($data3!=null) {
         $data3==$data3;
        }
        else
        {
        $data3=array();
        }
        //dd($data3);
        // receive ends here




        // for dispatch
        $store_id = \Session::get('store_id');
        $data4 = DB::table("supply_msts")
        ->join('receive_msts', 'supply_msts.Supply_Invoice_No', '!=', 'receive_msts.Supply_Invoice_No')
        ->select('supply_msts.Supply_Invoice_No as invoice',
        'supply_msts.Date as Date_Send',
        'supply_msts.Supply_Sender_Code as From','supply_msts.Total_Qty as Shoe','supply_msts.Total_Value as Value')
        ->where('supply_msts.Supply_Receiver_Code','=',$store_id)
        ->where('supply_msts.created_at','>=',$today)
        ->where('supply_msts.created_at','<=',$tomorrow)
        ->where('supply_msts.delete_cd','=','Y')
        ->where('supply_msts.Approved_Status','=','Dispatched')
        ->get()->toArray();

        if ($data4!=null) {
            $data4==$data4;
        }
        else
        {
           $data4=array();
        }

        // dispatch ends here
        $store_codes=array();
        $store=DB::table('store_employee')
                ->join('store_msts', 'store_employee.Store_code', '=', 'store_msts.Store_Code')
                ->select('store_msts.Store_Name','store_msts.Store_Code','store_msts.id')
                ->where('store_employee.Company_Code',$company_code)
                ->where('store_msts.delete_cd','=','Y')
                ->get()->toArray();
                
        for($i=0;$i<count($store);$i++) {
            $store_codes[$i]=$store[$i]->Store_Code;
        }
        $com_sales_by_value=array();
        $com_sales_by_value = DB::table("sales_chds")
                    ->join('store_msts', 'store_msts.Store_Code', '=', 'sales_chds.Store_Code')
                    ->select(DB::raw("SUM(sales_chds.Price_1)*1 as tot_price1"),'store_msts.Store_Name')
                    ->where('sales_chds.updated_at','>=',$today)
                    ->where('sales_chds.updated_at','<=',$tomorrow)
                    ->whereIn('sales_chds.Store_Code',$store_codes)
                    ->groupBy('sales_chds.Store_Code')
                    ->orderBy('sales_chds.Store_Code')
                    ->get()->toArray();
                    //dd($com_sales_by_value);
        /*return view('home_main')->with(compact('comp_img','data','data2','data3','data4','company_code','company_name','company_address','newtsq','com_sales_by_value'));*/

        return view('master.home_details.admin_bsb_template.prosperity_card')->with(compact('data', 'report_info'));
    }



    //Function get places by type
    public function get_places_by_type(Request $request) {

        $html['json'] = '';

        $type = $request->input('type');
        $company_code = session('the_company_code');

        if ($type == 1) {
            $data = DB::table('area_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('area_code as code', 'area_name as name')
                ->orderBy('Area_Name', 'asc')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->code.'">'.$item->name.'</option>';
                }
            }
        } else if ($type == 2) {
            $data = DB::table('district_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('district_code as code', 'district_name as name')
                ->orderBy('district_name', 'asc')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->code.'">'.$item->name.'</option>';
                }
            }
        } else if ($type == 3) {
            $data = DB::table('concept_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('concept_code as code', 'concept_name as name')
                ->orderBy('concept_name', 'asc')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->code.'">'.$item->name.'</option>';
                }
            }
        } else if ($type == 4) {
            /*$data = DB::table('store_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('store_code as code', 'store_name as name')
                ->get();*/

            $data=DB::table('store_employee')
                ->join('store_msts', 'store_employee.Store_code', '=', 'store_msts.Store_Code')
                ->select('store_msts.Store_Name as name','store_msts.Store_Code as code','store_msts.id')
                ->where('store_employee.company_code', $this->company_code)
                ->where('store_employee.Emp_Code',$this->emp_code)
                ->where('store_msts.delete_cd','=','Y')
                ->where('store_employee.delete_cd','=','Y')
                ->orderBy('store_msts.Store_Code')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->code.'">'.$item->code.' - '.$item->name.'</option>';
                }
            }
        }
        return json_encode($html);
    }


    //Function get periods by type
    public function get_periods_by_type(Request $request) {

        $html['json'] = '';

        $type = $request->input('type');
        $company_code = session('the_company_code');

        if ($type) {
            $query = DB::table('calendars')
                ->where('company_code', $company_code)
                ->where('PeriodType', $type)
                ->where('delete_cd', 'Y')
                ->select('id', 'PeriodId as period_id')
                ->orderBy('Year', 'dsc');
                if ($type == 'Week') {
                    $query->orderBy('PeriodId', 'asc');
                }

            $data = $query->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->id.'">'.$item->period_id.'</option>';
                }
            }
        }
        return json_encode($html);
    }

    //Function get products by type
    public function get_products_by_type(Request $request) {

        $html['json'] = '';

        $type = $request->input('type');
        $company_code = session('the_company_code');

        if ($type == 1) {
            $data = DB::table('gender_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('Gender_mstID', 'GenderNAME')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->Gender_mstID.'">'.$item->GenderNAME.'</option>';
                }
            }
        } elseif ($type == 2) {
            $data = DB::table('category_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('Category_Code', 'Category_Name')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->Category_Code.'">'.$item->Category_Name.'</option>';
                }
            }
        } elseif ($type == 3) {
            $data = DB::table('sub_category_msts')
                ->leftJoin('category_msts', 'category_msts.Category_Code', '=', 'sub_category_msts.Category_Code')
                ->where('sub_category_msts.company_code', $company_code)
                ->where('sub_category_msts.delete_cd', 'Y')
                ->select(DB::raw('category_msts.Category_Name'), 'Sub_category_mstID', 'Sub_category_Name')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->Sub_category_mstID.'">'.$item->Category_Name.' - '.$item->Sub_category_Name.'</option>';
                }
            }
        } elseif ($type == 4) {
            $data = DB::table('brand_msts')
                ->where('company_code', $company_code)
                ->where('delete_cd', 'Y')
                ->select('Brand_mstID', 'Brand_Name')
                ->get();

            if ($data) {
                $data = $data->toArray();
                foreach ($data as $key => $item) {
                    $html['json'] .= '<option value="'.$item->Brand_mstID.'">'.$item->Brand_Name.'</option>';
                }
            }
        }
        return json_encode($html);
    }

}
