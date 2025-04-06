<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\lawn;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LDAP\Result;
use Session;

class backendController extends Controller

{
    public function home()
    {
        $feedbacks = Feedback::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        return view('index', compact('feedbacks', 'agents'));
    }
    public function agent()
    {
        // $feedbacks = Feedback::all();
        $agents = Agent::where('status', 1)->get();
        return view('agent', compact('agents'));
    }
    public function about()
    {
        $feedbacks = Feedback::where('status', 1)->get();
        return view('about', compact('feedbacks'));
    }
    public function lawn()
    {
        $lawns = lawn::where('status', 1)->get();
        return view('lawns', compact('lawns'));
    }
    public function register(Request $request)
    {

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        $user = new Customer();
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->contact   = $request['mobile'];
        $user->status = 1;
        $user->password = Hash::make($request['password']);

        $user->save();

        if (Auth::guard('customer')->attempt($credentials)) {

            return redirect()->route('mybooking');
        } else {
            return back();
        }
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];

        // $user = new User();
        // $user->name     = "admin";
        // $user->email    = $request['username'];
        // $user->password = Hash::make($request['password']);

        // $user->save();

        if (Auth::guard('customer')->attempt($credentials)) {
            // Auth::guard('customer')->check();
            return redirect()->route('mybooking');
        } else {
            return back()->with('msg', 'login_failed');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();

        // Auth::gaurd('customer')->logout();
        return redirect('/login');
    }
    public function lawns_search(Request $request)
    {
        $lawns = lawn::orWhere('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('specification', 'LIKE', '%' . $request->search . '%')
        ->orWhere('locality', 'LIKE', '%' . $request->search . '%')
            ->orWhere('desription', 'LIKE', '%' . $request->search . '%')
            ->where('status', 1)->get();
        return view('lawns', compact('lawns'));
    }
    public function mybooking()
    {
        $mybookings = Booking::Select('lawns.*', 'bookings.name as booking_name', 'bookings.email as booking_email', 'bookings.mobile as booking_contact', 'bookings.created_at as booking_at', 'bookings.booking_date as booking_date')->leftJoin('lawns', 'bookings.lawn_id', '=', 'lawns.id')->where('userid', Auth::guard('customer')->user()->id)->orderBy('bookings.id', 'DESC')->get();
        // return $mybookings;
        return view('mybooking', compact('mybookings'));
    }
    public function check_availibility(Request $request)
    {
        // return $request;
        if (Booking::where('lawn_id', $request->lawn_id)->where('booking_date', $request->booking_date)->count() > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function booknow(Request $request)
    {
        // return $request;/
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->mobile = $request->mobile;
        $booking->lawn_id = $request->lawn_id;
        $booking->userid = Auth::guard('customer')->user()->id;
        $booking->event  =  $request->event;
        $booking->booking_date = $request->booking_date;
        $booking->booking_notes = $request->notes;
        $booking->payment_status = true;
        $booking->status = 1;
        $booking->save();
        return redirect()->route('mybooking');
    }
    public function aboutlawn($id)
    {

        $lawn = lawn::where('id', $id)->first();
        return view('/about_lawm', compact('lawn'));
    }


    public function lawn_vendor_booking(Request $request)
    {
        // return $request;
        $booking  = new Booking();
        $booking->lawn_id = Session::get('activeLawn');
        $booking->booking_date = $request->dateofbooking;
        $booking->event = $request->eventtype;
        $booking->userid = 0;
        $booking->name = $request->nameofcustomer;
        $booking->mobile = $request->mobileofcustomer;
        $booking->email = $request->emailofcustomer;
        $booking->booking_notes = $request->bookingnote;
        $booking->payment_status = 1;
        $booking->status = 1;
        $booking->save();
        return back()->with('msg', 'New Booking add Successfully.');
    }
    public function vendor_login(Request $request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];

        // $user = new User();
        // $user->name     = "admin";
        // $user->email    = $request['username'];
        // $user->password = Hash::make($request['password']);

        // $user->save();

        if (Auth::guard('vendor')->attempt($credentials)) {
            Auth::guard('vendor')->check();
            return redirect()->route('vendordashboard');
        } else {
            return  back();
        }
    }
    public function vendor_logout()
    {
        Auth::guard('vendor')->logout();

        return redirect('/vendor/login');
    }
    public function vendor_profile()
    {

        return view('vendor.profile');
    }
    public function vendor_update_profile(Request $request)
    {
        $vendor = Vendor::where('id', Auth::guard('vendor')->user()->id)->first();
        if (isset($request->profile)) {
            // unlink('/images/agent/' . $agent->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/vendor', $profileName);
            $vendor->profile = $profileName;
        }
        $vendor->update();
        return back()->with('status', 'Profile updated Successfully');
    }
    public function vendor_update(Request $request)
    {
        $vendor = Vendor::where('id', Auth::guard('vendor')->user()->id)->first();


        $vendor->name = $request->name;
        $vendor->contact = $request->phone;
        $vendor->address = $request->address;
        $vendor->update();

        return back()->with('status', 'Profile updated Successfully');
    }
    public function vendor_change_password()
    {
        return view('vendor.security');
    }
    public function vendor_change_password_post(Request $request)
    {



        #Match The Old Password
        if (!Hash::check($request->cpassword, Auth::guard('vendor')->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Vendor::whereId(Auth::guard('vendor')->user()->id)->update([
            'password' => Hash::make($request->npassword)
        ]);
        return back()->with("status", "Password changed successfully!");
    }
    public function vendor_notification()
    {
        return view('vendor.notification');
    }
    public function vendor_all_booking()
    {
        $bookings = Booking::select('bookings.*', 'lawns.name as lawn_name', 'lawns.locality as locality', 'lawns.contact as lawn_contact')->leftJoin('lawns', 'bookings.lawn_id', '=', 'lawns.id')->leftJoin('vendors', 'lawns.vendor_id', '=', 'vendors.id')->where('vendors.id', Auth::guard('vendor')->user()->id)->get();

        return view('vendor.booking', compact('bookings'));
    }
    public function vendor_lawn_list()
    {
        $lawns = Lawn::where('vendor_id', Auth::guard('vendor')->user()->id)->get();
        return view('vendor.lawns',compact('lawns'));
    }
    public function vendor_lawn($lawn_id)
    {
        $lawn  = Lawn::where('id',$lawn_id)->where('vendor_id', Auth::guard('vendor')->user()->id)->first();
       
        return view('vendor.lawn',compact( 'lawn'));

    }
    public function vendor_lawn_update(Request $request)
    {
        // return $request;
        $lawn =  Lawn::find($request->lawn_id);
        $lawn->name = $request->name;
        $lawn->contact = $request->contact;
        $lawn->email  = $request->email;
        $lawn->locality= $request->locality;
        $lawn->price = $request->price;
        $lawn->address= $request->address;
        $lawn->desription = $request->description;
        $lawn->specification = $request->specification;
        if(isset($request->status)) {
            if ($request->status == "on") {
                $lawn->status = 1;
            } else {
                $lawn->status = 0;
            }
        } else {
            $lawn->status = 0;
        }
        if($lawn->update()){
            return redirect()->back()->with('msg','Lawn Updated Successfully');
        }else{
            return redirect()->back()->with('msg','Lawn Updation Failed');

        }
    }
    public function vendor_lawn_add_image(Request $request)
    {
        
        $lawn =Lawn::find($request->lawn_id);
        $w = '';

                if($request->hasFile('image')&& $request->file('image')->isValid()){

                    $image  = $request->file('image');
                    
                    $w = uniqid(rand(1000, 9999) . time() ) . '.' . $image->getClientOriginalExtension();
                

                   
                try{
                    move_uploaded_file($image->getPathName(),'images/lawn/'.$w);
                }
                catch(ErrorException){
                    return  response()->json(['status'=> ErrorException]);
                }
                if($w!=''){
                    $images =explode(',',$lawn->images);
                array_push($images,"images/lawn/".$w);

                    $lawn->images =implode(',',$images);
                }
                }

    

        if($lawn->update()){
            return  response()->json(['status'=>'Success','path'=>"images/lawn/".$w]);
        }else{
            return  response()->json(['status'=>'Failed']);
        }
    }
    public function vendor_get_booking($month,$year)
    {
        $current_month = $month==null?date('m'):$month;
        $current_year = $year==null?date('Y'):$year;
        
        $html ='';
        $booking = Booking::where('lawn_id',Session::get('activeLawn'))->whereMonth('booking_date',$current_month+1)->whereYear('booking_date',$current_year)->orderBy('booking_date','asc')->get()->toArray();
       
        return  response()->json(['booking'=>$booking]);
        // foreach($booking as $book){
        //     $ids = substr($book->booking_date,'8');
        //     $id = ((int)$ids +1)-1;
        //     $html .="var s$id = document.getElementById('$id');"; 
        //     $html.="s$id.setAttribute('onclick','load($book->id)');";
        //     $html.="s$id.setAttribute('data-bs-target','#detailsforbooking');";
        //     $html.="s$id.style.backgroundColor='#2da6cb';";
        //     $html.="s$id.style.color='white';";
        //     $html.="s$id.classList.add('booked');";
        // }
        
    }
    public function vendor_get_lawn()
    {
        $lawn = lawn::where('vendor_id',Auth::guard('vendor')->user()->id)->get();
        $html = '';
        foreach($lawn as $l){
            if(!Session::has('activeLawn')){
                Session::put('activeLawn',$l->id);
                        }
                        $html .= "<option ";
                        $html.=Session::get('activeLawn') ==$l->id?"SELECTED":"";
                        $html .=" value='$l->id'>$l->name</option>";
        }
        return response()->json(['html'=>$html]);
    }
    public function vendor_get_bookingdetail($bookingid)
    {
        $current_month = date('m');
        $html ='';
        $booking = Booking::where('lawn_id',Session::get('activeLawn'))->where('id',$bookingid)->first();
      if($booking->userid==0){
        $html .="  <h3>Booked By:<span>Self</span></h3>";
      }else{
        $html .="  <h3>Booked By:<span>Floralgarland</span></h3>";
      }
       $html .="  
        <h3>Customer Name:<span>$booking->name</span></h3> 
        <h3>Contact Number:<span>$booking->mobile</span></h3>
        <h3>Contact Email: <span> $booking->email</span></h3>
        <h3>Event Type: <span> $booking->event</span></h3>
        <h3>Remark: <span> $booking->booking_notes</span></h3>";



           
        
        return response()->json(['html'=>$html]);
    }
    public function vendor_lawn_del_image(Request $request)
    {
        $lawn =Lawn::find($request->lawn_id);
        $image =explode(',',$lawn->images);
        unset($image[array_search($request->image,$image)]);
        $image = array_values($image);
        $lawn->images =implode(',',$image);
        if($lawn->update()){
            return  response()->json(['status'=>'Success']);
        }else{
            return  response()->json(['status'=>'Failed']);
        }
        
    }

    public function admin_login(Request $request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];
        // $user = User::where('email','a@a.com')->first();
        // $user =new User;
        // $user->name = 'a';
        // $user->email = 'a@a.com';
        // $user->password = Hash::make($credentials['password']);

        // $user->save();
        // return $user;
        if (Auth::attempt($credentials)) {
            return redirect()->route('admindashboard');
        } else {
            return back()->with('msg', "Username or Password are wrong");
        }
    }

    public function admin_Logout()
    {

        Auth::logout();
        return redirect('/admin/login');
    }
    public function send_sms($request)
    {
        $request['to'];
        $request['subject'];
        $request['massege'];
    }
    public function senquery(Request $request)
    {
        // return $request;
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        $contact->subject =  $request->subject;
        $contact->massage = $request->massage;
        $contact->status = 1;
        $contact->save();

        return back()->with('msg', 'Contact form added successfully');
    }
    public function get_enquery()
    {
        return view('contact');
    }
    public function enquery()
    {
        $enqueries =  Contact::all();
        return view('admin.enquery', compact('enqueries'));
    }
    public function customer()
    {
        $customers = Customer::all();
        return view('admin.customer', compact('customers'));
    }
    function booking()
    {
        $bookings = Booking::select('bookings.*', 'lawns.name as lawn_name', 'lawns.locality as locality', 'lawns.contact as lawn_contact')->leftJoin('lawns', 'bookings.lawn_id', '=', 'lawns.id')->get();
        return view('admin.booking', compact('bookings'));
    }
    public function enquery_destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/admin/enquery')->with('Enquery Deleted Successfully');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function billing()
    {
        return view('admin.billing');
    }
    public function notification()
    {
        return view('admin.notification');
    }
    public function security()
    {
        return view('admin.security');
    }
    public function admin_change_password_post(Request $request)
    {




        #Match The Old Password
        if (!Hash::check($request->cpassword, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->npassword)
        ]);
        return redirect('/admin/logout')->with("status", "Password changed successfully!");
    }

    public function admin_update_profile(Request $request)
    {
        $admin = User::where('id', Auth::user()->id)->first();
        if (isset($request->profile)) {
            // unlink('/images/agent/' . $agent->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/user', $profileName);
            $admin->profile = $profileName;
        }
        $admin->update();
        return back()->with('status', 'Profile updated Successfully');
    }
    public function admin_update(Request $request)
    {
        // return $request;
        $admin = User::where('id', Auth::user()->id)->first();

        $admin->name = $request->name;
        $admin->mobile = $request->mobile;
        $admin->position = $request->position;
        $admin->location = $request->address;
        $admin->birthday = $request->birthday;
        $admin->update();

        return back()->with('status', 'Profile updated Successfully');
    }
    // agent
    public function agent_login(Request $request)
    {

        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];

        // $user = new User();
        // $user->name     = "admin";
        // $user->email    = $request['username'];
        // $user->password = Hash::make($request['password']);

        // $user->save();

        if (Auth::guard('agent')->attempt($credentials)) {
            return redirect('/agent/customer');
        } else {
            return back()->with('msg', 'username or password are wrong');
        }
    }
    public function agent_Logout()
    {

        Auth::guard('agent')->logout();
        return redirect('/agent/login');
    }
    public function agent_profile()
    {

        return view('agent.profile');
    }
    public function agent_update_profile(Request $request)
    {
        $agent = agent::where('id', Auth::guard('agent')->user()->id)->first();
        if (isset($request->profile)) {
            // unlink('/images/agent/' . $agent->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/agent', $profileName);
            $agent->profile = $profileName;
        }
        $agent->update();
        return back()->with('status', 'Profile updated Successfully');
    }
    public function agent_update(Request $request)
    {
        $agent = agent::where('id', Auth::guard('agent')->user()->id)->first();
      

        $agent->name = $request->name;
        $agent->contact = $request->mobile;
        $agent->address = $request->address;
        $agent->designation = $request->position;
        $agent->update();

        return back()->with('status', 'Profile updated Successfully');
    }
    public function agent_change_password()
    {
        return view('agent.security');
    }
    public function agent_change_password_post(Request $request)
    {
      


        #Match The Old Password
        if (!Hash::check($request->cpassword, Auth::guard('agent')->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        agent::whereId(Auth::guard('agent')->user()->id)->update([
            'password' => Hash::make($request->npassword)
        ]);
        return back()->with("status", "Password changed successfully!");
    }
    public function agent_notification()
    {
        return view('agent.notification');
    }
    public function agent_all_booking()
    {
        $bookings = Booking::select('bookings.*', 'lawns.name as lawn_name', 'lawns.locality as locality', 'lawns.contact as lawn_contact')->leftJoin('lawns', 'bookings.lawn_id', '=', 'lawns.id')->leftJoin('customers', 'customers.id', '=', 'bookings.userid')->where('customers.introducer', Auth::guard('agent')->user()->id)->get();

        return view('agent.booking', compact('bookings'));
    }
    function agent_customer()
    {
        $customers = Customer::where('introducer', Auth::guard("agent")->user()->id)->get();
        return view('agent.customer', compact('customers'));
    }
    function add_customer()
    {
        return view('agent.addcustomer');
    }
    function add_post_customer(Request $request)
    {
        // return $request;
        $user = new Customer();
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->contact   = $request['phone'];
        $user->introducer   =  Auth::guard('agent')->user()->id;
        $user->status = 1;
        $user->password = Hash::make($request['password']);

        $user->save();
        $customers = Customer::where('introducer', Auth::guard("agent")->user()->id)->get();
        return view('agent.customer', compact('customers'));
    }
}
