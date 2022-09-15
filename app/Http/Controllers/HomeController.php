<?php

namespace App\Http\Controllers;

use App\Models\DriverReporting;
use App\Models\Repair;
use App\Models\Sparepart;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('redirect');
        }
        else{
            return view('auth.login');
        }
        
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;

        if($usertype=='admin'){
            $data = Repair::all();
            $repairs = Repair::where('status','Pending')->count();
            $count = Vehicle::count();
            $graphrepair = Repair::select('id','created_at')->get()->groupBy(function ($graphrepair){
                return Carbon::parse($graphrepair->created_at)->format('M');
            });
            $months =[];
            $monthcount =[];

            foreach($graphrepair as $month => $values){
                $months[] =$month;
                $monthcount[]= count($values);
            }

            $sparegraph = Sparepart::select('id','created_at')->get()->groupBy(function($sparegraph){
                return Carbon::parse($sparegraph->created_at)->format('M');
            });
            $sparemonth =[];
            $monthsparecount=[];

            foreach($sparegraph as $themonth => $itsvalues){
                $sparemonth[]=$themonth;
                $monthsparecount[]=count($itsvalues);
            }
            return view('admin.home',compact('count','repairs','data'),['graphrepair'=>$graphrepair,'months'=>$months,'monthcount'=>$monthcount,'sparegraph'=>$sparegraph,'sparemonth'=>$sparemonth,'monthsparecount'=>$monthsparecount]);
        }
        else if($usertype=='superadmin'){
            $data = Repair::all();
            $repairs = Repair::where('status','Pending')->count();
            $count = Vehicle::count();

            $graphrepair = Repair::select('id','created_at')->get()->groupBy(function ($graphrepair){
                return Carbon::parse($graphrepair->created_at)->format('M');
            });
            $months =[];
            $monthcount =[];

            foreach($graphrepair as $month => $values){
                $months[] =$month;
                $monthcount[]= count($values);
            }

            $sparegraph = Sparepart::select('id','created_at')->get()->groupBy(function($sparegraph){
                return Carbon::parse($sparegraph->created_at)->format('M');
            });
            $sparemonth =[];
            $monthsparecount=[];

            foreach($sparegraph as $themonth => $itsvalues){
                $sparemonth[]=$themonth;
                $monthsparecount[]=count($itsvalues);
            }
            return view('admin.home',compact('count','repairs','data'),['graphrepair'=>$graphrepair,'months'=>$months,'monthcount'=>$monthcount,'sparegraph'=>$sparegraph,'sparemonth'=>$sparemonth,'monthsparecount'=>$monthsparecount]);
        }
        else{
            $data = DriverReporting::all();
            return view('driver.home',compact('data'));
        }
    }

    public function reportrepairs(){
        $vehicle = Vehicle::all()->where('status','active');
        return view('driver.reportrepairs',compact('vehicle'));
    }

    public function report_data(Request $request){
        $data = new DriverReporting();
        $data->name = $request->name;
        $data->vehicle = $request->vehicle;

        $image = $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('driverreportings',$imagename);

        $data->image=$imagename;

        $data->date = $request->date;
        $data->description = $request->description;
        $data->phone = Auth::user()->phone;
        $data->driver =Auth::user()->name;
        $data->status = 'Pending';

        $data->save();

        return redirect()->back()->with('message','Repair Issue Submitted Successfully');

    }

    public function reported(){
        $phone = Auth::user()->phone;
        $data = DriverReporting::all()->where('phone',$phone);
        return view('driver.reported',compact('data'));
    }
    public function cancelreporting($id){
        $reporting = DriverReporting::find($id);
        $reporting->delete();
        return redirect()->back();
    }

}
