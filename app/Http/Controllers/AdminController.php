<?php

namespace App\Http\Controllers;

use App\Exports\ApprovedExport;
use App\Exports\PendingExport;
use App\Exports\RejectedExport;
use App\Exports\RepairExport;
use App\Models\Driver;
use App\Models\DriverReporting;
use App\Models\Garage;
use App\Models\Mechanic;
use App\Models\Repair;
use App\Models\service;
use App\Models\Sparepart;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Vehicle;
//use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function drivers(){
        $data = Driver::all();
        return view('admin.drivers',compact('data'));
    }

    public function newdriver(){
        return view('admin.newdriver');
    }

    public function users(){
        $users = User::all()->except(Auth::id());
        return view('admin.users',compact('users'));
    }

    public function newuser(){
        return view('admin.newuser');
    }

    public function createuser(Request $request){
        $request->validate([
            'username' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = new User();
        $data->name = $request->username;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->usertype = $request->usertype;
        $data->password = Hash::make($request['password']);

        $data->save();

        return redirect()->back()->with('message','User Created Successfully');

    }

    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function driver_data(Request $request){
        $data = new Driver();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->gender=$request->gender;
        $data->DOB=$request->date;
        $data->email=$request->email;
        $data->lnumber=$request->lnumber;

        $image = $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('driverimage',$imagename);

        $data->image=$imagename;

        
        $data->address=$request->address;
        $data->county=$request->county;
        $data->city=$request->city;
        $data->country=$request->country;

        $data->save();

        return redirect()->back()->with('message', 'Driver Added Successfully');
    }
    public function deletedriver($id){
        $driver = Driver::find($id);
        $driver->delete();
        return redirect()->back();
    }
    public function editdriver($id){
        $data = Driver::find($id);
        return view('admin.editdriver',compact('data'));
    }
    public function updatedriver(Request $request, $id){
        $data = Driver::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->gender=$request->gender;
        $data->DOB=$request->date;
        $data->email=$request->email;
        $data->lnumber=$request->lnumber;

        $image = $request->image;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('driverimage',$imagename);
    
            $data->image=$imagename;
        }

        $data->address=$request->address;
        $data->county=$request->county;
        $data->city=$request->city;
        $data->country=$request->country;

        $data->save();

        return redirect()->back()->with('message', 'Driver Updated Successfully');
    }
    public function vehicles(){
        $data= Vehicle::all();
        return view('admin.vehicles',compact('data'));
    }
    public function newvehicle(){
        return view('admin.newvehicle');
    }
    public function vehicle_data(Request $request){
        $data = new Vehicle();
        $data->registration_No = $request->registration;
        $data->model_No = $request->model;
        $data->type = $request->type;
        $data->status = $request->membershipRadios;
        $data->save();

        return redirect()->back()->with('message','Vehicle Added Successfully');

    }
    public function deletevehicle($id){
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->back();
    }
    public function editvehicle($id){
        $data = Vehicle::find($id);
        return view('admin.editvehicle', compact('data'));
    }
    public function updatevehicle(Request $request, $id){
        $data= Vehicle::find($id);
        $data->registration_No = $request->registration;
        $data->model_No = $request->model;
        $data->type = $request->type;
        $data->status = $request->membershipRadios;
        $data->save();

        return redirect()->back()->with('message','Vehicle Updated Successfully');
    }
    public function spare_suppliers(){
        $data= Supplier::all();
        return view('admin.spare_suppliers',compact('data'));
    }
    public function newsupplier(){
        return view('admin.newsupplier');
    }
    public function supplier_data(Request $request){
        $data= new Supplier();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->country = $request->country;

        $data->save();
        return redirect()->back()->with('message','New Supplier Added Successfully');
    }
    public function delete_supplier($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back();
    }
    public function editsupplier($id){
        $data = Supplier::find($id);
        return view('admin.editsupplier',compact('data'));
    }
    public function garages(){
        $data = Garage::all();
        return view('admin.garages', compact('data'));
    }
    public function newgarage(){
        return view('admin.newgarage');
    }
    public function garage_data(Request $request){
        $data= new Garage();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->location=$request->location;
        $data->save();
        return redirect()->back()->with('message','New Garage details Added Successfully');
    }
    public function deletegarage($id){
        $garage = Garage::find($id);
        $garage->delete();
        return redirect()->back();
    }
    public function editgarage($id){
        $data= Garage::find($id);
        return view('admin.editgarage',compact('data'));
    }
    public function updategarage(Request $request,$id){
        $data = Garage::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->location=$request->location;
        $data->save();
        
        return redirect()->back()->with('message', 'Garage Details Updated Successfully');
    }
    public function mechanics(){
        $data = Mechanic::all();
        return view('admin.mechanics',compact('data'));
    }
    public function newmechanic(){
        $garage = Garage::all();
        return view('admin.newmechanic',compact('garage'));
    }
    public function mechanic_data(Request $request){
        $data = new Mechanic();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->garage=$request->garage;

        $data->save();
        return redirect()->back()->with('message','Mechanic Saved Successfully');
    }
    public function deletemechanic($id){
        $mechanic = Mechanic::find($id);
        $mechanic->delete();
        return redirect()->back();
    }
    public function spare_parts(){
        $data = Sparepart::all();
        return view('admin.spare_parts',compact('data'));
    }
    public function searchspare(Request $request){
        $search = $request->search;
        $data = Sparepart::where('vehicle','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->get();
        return view('admin.spare_parts',compact('data'));
    }
    public function newsparepart(){
        $supplier = Supplier::all();
        $vehicle = Vehicle::all()->where('status','active');
        return view('admin.newsparepart',compact('supplier','vehicle'));
    }
    public function spare_data(Request $request){
        $data = new Sparepart();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->DOP = $request->dop;
        $data->DOI = $request->doi;
        $data->auto_part = $request->membershipRadios;
        $data->serial = $request->snumber;
        $data->supplier = $request->supplier;
        $data->vehicle = $request->vehicle;
        $data->service_life = $request->service;

        $image = $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('sparepartsimage',$imagename);

        $data->image=$imagename;

        $data->description = $request->description;

        $data->save();
        return redirect()->back()->with('message','Spare part saved successfully');


    }

    public function delete_sparepart($id){
        $sparepart = Sparepart::find($id);
        $sparepart->delete();

        return redirect()->back();
    }

    public function deleterepair($id){
        $repair = Repair::find($id);
        $repair->delete();

        return redirect()->back();
    }

    public function repairs(){
        $data = Repair::all()->where('status','Pending');
        return view('admin.repairs',compact('data'));
    }
    public function services(){
        $data = service::all()->where('status','Pending');
        return view('admin.services',compact('data'));
    }

    public function servicedata(Request $request){
        $data = new service();
        $data->name =$request->name;
        $data->vehicle =$request->vehicle;
        $data->pdos =$request->pdos;
        $data->dos =$request->dos;
        $data['servicepart'] =$request->input('servicepart');
        $data->servicetype =$request->membershipRadios;
        $data->garage =$request->garage;
        $data->mechanic =$request->mechanic;
        $data->cmileage =$request->cmileage;
        $data->nmileage =$request->nmileage;
        $data->amount =$request->amount;
        $data->report =$request->report;
        $data->status ='Pending';

        $data->save();
        return redirect()->back()->with('message','Vehicle Service details saved successfully');
    }
    public function newservice(){
        $garage = Garage::all();
        $vehicle = Vehicle::all()->where('status','active');
        $mechanic = Mechanic::all();
        return view('admin.newservice',compact('vehicle','garage','mechanic'));
    }

    public function deleteservice($id){
        $service = service::find($id);
        $service->delete();
        return redirect()->back();
    }

    public function updateservice($id){
        $garage = Garage::all();
        $mechanic =Mechanic::all();
        $vehicle = Vehicle::all()->where('status','active');
        $service = service::find($id);
        return view('admin.editservice',compact('service','mechanic','vehicle','garage'));
    }


    public function searchpending(Request $request){
        $search = $request->search;
        $data = Repair::where('status','Pending')->where('vehicle','like','%'.$search.'%')->get();
        return view('admin.repairs',compact('data'));
    }

    public function searchcomservice(Request $request){
        $search=$request->search;
        $data= service::where('status','Completed')->where('vehicle','like','%'.$search.'%')->get();
        return view('admin.completedservices',compact('data'));
    }
    public function searchpenservice(Request $request){
        $search=$request->search;
        $data= service::where('status','Pending')->where('vehicle','like','%'.$search.'%')->get();
        return view('admin.services',compact('data'));
    }
    public function download($image){
        return response()->download(public_path('sparepartsimage/'.$image));
    }
    public function downloadrepair($image){
        return response()->download(public_path('repairsimage/'.$image));
    }
    public function downloadfile($file){
        return response()->download(public_path('repairsfile/'.$file));
    }
    public function newrepairs(){
        $garage = Garage::all();
        $vehicle = Vehicle::all()->where('status','active');
        $mechanic = Mechanic::all();
        return view('admin.newrepairs',compact('garage','vehicle','mechanic'));
    }
    public function repair_data(Request $request){
        $data = new Repair();
        $data->name = $request->name;
        $data->vehicle = $request->vehicle;
        $data->previous_DOR = $request->pdor;
        $data->expected_DOR = $request->edor;
        $data->DOR = $request->dor;
        $data->amount = $request->amount;
        $data->type = $request->membershipRadios;

        $image = $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('repairsimage',$imagename);

        $data->image=$imagename;


        $file = $request->file;
        $filename= time().'.'.$file->getClientOriginalExtension();
        $request->file->move('repairsfile',$filename);

        $data->file=$filename;

        $data->garage = $request->garage;
        $data->mechanic = $request->mechanic;
        $data->mechanic_report = $request->report;
        $data->status = 'Pending';

        $data->save();

        return redirect()->back()->with('message','Repair Record Added Successfully');

    }
    public function approvedrepairs(){
        $data = Repair::all()->where('status','Approved');
        return view('admin.approvedrepairs',compact('data'));
    }
    public function searchapprove(Request $request){
        $search = $request->search;
        $data = Repair::where('status','Approved')->where('vehicle','like','%'.$search.'%')->get();
        return view('admin.approvedrepairs',compact('data'));
    }
    public function completedrepairs(){
        $data = Repair::all()->where('status','Completed');
        return view('admin.completedrepairs',compact('data'));
    }
    public function searchcomplete(Request $request){
        $search = $request->search;
        $data = Repair::where('status','Completed')->where('vehicle','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->get();
        return view('admin.completedrepairs',compact('data'));
    }
    public function completedpdf(){
        $data = Repair::all()->where('status','Completed');
        $pdf = PDF::loadView('admin.completedexport', compact('data'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('completedrepairs.pdf');
    }
    public function rejectedrepairs(){
        $data = Repair::all()->where('status','Rejected');
        return view('admin.rejectedrepairs',compact('data'));
    }
    public function searchrejected(Request $request){
        $search = $request->search;
        $data = Repair::where('status','Rejected')->where('vehicle','like','%'.$search.'%')->get();
        return view('admin.rejectedrepairs',compact('data'));
    }
    public function approve($id){
        $repair = Repair::find($id);
        $repair->status= 'Approved';
        $repair->save();

        return redirect()->back();
    }

    public function completestatus($id){
        $service = service::find($id);
        $service->status='Completed';
        $service->save();
        return redirect()->back();
    }
    public function completedservices(){
        $data = service::all()->where('status','Completed');
        return view('admin.completedservices',compact('data'));
    }
    public function complete($id){
        $repair = Repair::find($id);
        $repair->status = 'Completed';
        $repair->save();

        return redirect()->back();
    }

    public function rejecting($id){
        $repair =Repair::find($id);
        return view('admin.rejecting',compact('repair'));
    }

    public function reject_data( Request $request, $id){
        $repair =Repair::find($id);
        $repair->name=  $request->name;
        $repair->vehicle=  $request->vehicle;
        $repair->reject_reason=  $request->reason;
        $repair->status = 'Rejected';
        $repair->save();

        return redirect('rejectedrepairs');
    }
    public function export(){
        $data = Repair::all()->where('status','Completed');
        return Excel::download(new RepairExport($data), 'CompletedRepairs.xlsx');
    }
    public function exportpending(){
        $data = Repair::all()->where('status','Pending');
        return Excel::download(new PendingExport($data),'pendingrepairs.xlsx');
    }
    public function exportapproved(){
        $data = Repair::all()->where('status','Approved');
        return Excel::download(new ApprovedExport($data),'Approvedrepairs.xlsx');
    }
    public function exportrejected(){
        $data = Repair::all()->where('status','Rejected');
        return Excel::download(new RejectedExport($data),'Approvedrepairs.xlsx');
    }

    public function driver_reportings(){
        $data = DriverReporting::all();
        return view('admin.driver_reportings',compact('data'));
    }

    public function received($id){
        $reporting = DriverReporting::find($id);
        $reporting->status = 'Received';

        $reporting->save();
        return redirect()->back();

    }

    public function downloadreporting($image){
        return response()->download(public_path('driverreportings/'.$image));
    }
    public function editrepair($id){
        $garage = Garage::all();
        $mechanic =Mechanic::all();
        $vehicle = Vehicle::all()->where('status','active');
        $data = Repair::find($id);
        return view('admin.editpendingrepair', compact('data','vehicle','garage','mechanic'));
    }
    public function editrepair_data(Request $request,$id){
        $data = Repair::find($id);
        $data->name = $request->name;
        $data->vehicle = $request->vehicle;
        $data->previous_DOR = $request->pdor;
        $data->expected_DOR = $request->edor;
        $data->DOR = $request->dor;
        $data->amount = $request->amount;
        $data->type = $request->membershipRadios;
        if($image = $request->image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('repairsimage',$imagename);
    
            $data->image=$imagename;
        }
        if($file = $request->file){
            $filename= time().'.'.$file->getClientOriginalExtension();
            $request->file->move('repairsfile',$filename);
    
            $data->file=$filename;
        }
        $data->garage = $request->garage;
        $data->mechanic = $request->mechanic;
        $data->mechanic_report = $request->report;
        $data->status = 'Pending';
        $data->save();
        return redirect()->back()->with('message','Repair Record Updated Successfully');
    }
}
