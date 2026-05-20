<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Mail\ContactMail;
use App\Mail\VehicleBooking;
use App\Model\Booking;
use App\Model\Contact;
use App\Model\Inquiry;
use App\Model\Proposal;
use App\Model\TripBooking;
use App\Models\Settings\CountryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners\BannerModel;
use App\Models\MultipleBanners\MultipleBannerModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostImageModel;
use App\Models\Posts\PostDocModel;
use App\Models\Settings\SettingModel;
use App\Models\Galleries\ImageGalleryModel;
use App\Models\Galleries\ImageGalleryCategoryModel;
use App\Models\Galleries\VideoGalleryModel;
use Mail;
use App\Mail\SendMail;
use App\Mail\SendMailContact;
use App\Mail\SendResume;
use App\Mail\CareerApply;
use App\Models\Posts\PostTypeModel;
use App\Models\Portfolios\PortfolioCategoryModel;
use App\Models\Portfolios\PortfolioModel;
use App\Models\Portfolios\AssociatedPortfolioModel;
use Illuminate\Support\Str;

class FrontpageController extends Controller
{

  public function index(Request $request)
  {
    $popup = MultipleBannerModel::where(['banner_id' => '1', 'status' => 1])->get();
    $banners = MultipleBannerModel::where(['banner_id' => 3, 'status' => 1])->get();
    $all = PostTypeModel::orderBy('ordering', 'asc')->get();
    $service = PostTypeModel::where('id', 16)->first();
    $career = PostModel::where('id', 110)->first();
    $industry = PostModel::where('post_type', 15)->where(['show_in_home' => '1', 'status' => '1'])->take(3)->get();
    $footer = PostModel::where('post_category', 2)->get();
    $podcast = PostModel::where('id', 126)->first();
    $pod_child = PostModel::where('post_parent', 126)->get();
    $network = PostModel::where('post_parent', 152)->get();
    $resource = PostTypeModel::where('id', 19)->first();
    $res_child = PostModel::where('post_type', 19)->where(['status' => '1'])->take(4)->get();
    $news = PostModel::where(['post_type' => '22', 'status' => '1'])->wherenotIn('id', [126])->where('post_parent', 0)->get();
    $news_list = PostModel::where(['post_type' => '22', 'status' => '1'])->wherenotIn('id', [126])->wherenotIn('post_parent', [126])->wherenotIn('post_parent', [0])->orderBy('updated_at', 'desc')->get();

    if ($request->ajax()) {
      if ($request->has('value')) {
        $result = PostModel::where('post_parent', $request->value)->get();
      }

      return view('themes.default.news_filter', compact('result'));
    }
    return view('themes.default.frontpage', compact('news', 'res_child', 'resource', 'network', 'pod_child', 'podcast', 'banners', 'popup', 'resource', 'service', 'career', 'industry', 'news_list'));
  }

  public function posttype($uri)
  {
    if (!check_posttype_uri($uri)) {
      abort(404);
    }
    $data = PostTypeModel::where('uri', $uri)->first();
    $tmpl['template'] = 'page';
    if ($tmpl['template']) {
      $data['template'] = $data['template'];
    }
    if ($data) {
      $posts = PostModel::where('post_type', $data->id)->orderBy('post_order', 'desc')->paginate(15);
    }
    $country = CountryModel::all();

    $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();
    return view('themes.default.' . $data['template'] . '', compact('data', 'documents', 'posts', 'country'));
  }

  public function pagedetail($uri)
  {
    if (!check_uri($uri)) {
      abort(404);
    }
    $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
    $tmpl['template'] = 'single';
    if ($tmpl['template']) {
      $data['template'] = $data['template'];
    }

    if ($data->id) {
      $data->visiter = $data->visiter + 1;
      $data->save();
    }
    $pos_type = PostTypeModel::where('id', $data->post_type)->first();
    $data_child = PostModel::where('post_parent', $data['id'])->orderBy('post_order', 'desc')->paginate(12);
    $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->orderBy('ordering', 'asc')->get();
    $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();

    return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'associated_posts', 'documents', 'pos_type'));
  }

  public function pagedetail_child($parenturi, $uri)
  {
    $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();

    $tmpl['template'] = 'single';
    if ($tmpl['template']) {
      $data['template'] = $data['template'];
    }

    if ($data->id) {
      $data->visiter = $data->visiter + 1;
      $data->save();
    }

    $data_child = PostModel::where('id', $data['post_parent'])->first();
    if ($data_child) {

      $data['template'] = $data_child['template_child'];
    }
    $associated_posts = array();
    if ($data) {
      $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
    }
    $post_id = $data->id;
    $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();
    $related = PostModel::where('post_type', 27)->where('post_parent', '=', $data_child->id)->get();
    $pos_type = PostTypeModel::where('id', $data->post_type)->first();
    return view('themes.default.' . $data['template'] . '', compact('related', 'data', 'data_child', 'associated_posts', 'documents', 'pos_type'));
  }

  public function portfolio($uri)
  {
    $data = PortfolioModel::where('uri', $uri)->first();
    $associated_post = AssociatedPortfolioModel::where('portfolio_id', $data['id'])->get();
    $trades = PortfolioModel::inRandomOrder()->limit(2)->get();
    if ($data) {
      return view('themes.default.trade', compact('data', 'associated_post', 'trades'));
    }
    return false;
  }

  public function servicetype($category_uri)
  {
    $category = PostCategoryModel::where('uri', $category_uri)->first();
    if ($category) {
      $data = PostModel::where('post_category', $category->id)->orderBy('post_order', 'desc')->get();
      return view('themes.default.service-list', compact('data', 'category'));
    }
    return false;
  }

  public function apply($parenturi, $uri)
  {
    $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
    if ($data) {
      return view('themes.default.apply', compact('data'));
    }
  }

  public function navigation($uri)
  {
    $getId = PostModel::where(['uri' => $uri])->first();
    $childCount = PostModel::where(['post_parent' => $getId->id])->count();
    if ($childCount > 0) {
      $parent_post = PostModel::where('uri', $uri)->first();
      $post = PostModel::where(['post_parent' => intval($getId->id)])->orderBy('post_order', 'asc')->paginate(15);
      $template = $parent_post->template;
    } else {
      $parent_post = PostModel::where('uri', $uri)->first();
      $post = PostModel::where('uri', $uri)->first();
      $template = $post->template;
      $news_updates = PostModel::where(['post_type' => 9])->orderBy('post_order', 'asc')->paginate(15);
    }
    $bod = PostModel::where(['post_type' => 12])->get();
    return view('themes.default.' . $template . '', compact('post', 'bod', 'parent_post', 'news_updates'));
  }

  public function category_navigation($uri)
  {
    $post_category = PostCategoryModel::where('uri', trim($uri))->first();
    if ($post_category->id == 2) {
      $data =  PostModel::where(['post_category' => $post_category->id])->orderBy('post_order', 'asc')->paginate(15);
      return view('themes.default.completed', compact('data', 'post_category'));
    } else {
      $data =  PostModel::where(['post_category' => $post_category->id])->orderBy('post_order', 'asc')->paginate(15);
      return view('themes.default.ongoing', compact('data', 'post_category'));
    }
  }

  /***********************************
   ******** Root Navigation ***********
   ************************************/

  public function photo_gallery($cat_id)
  {
    $data = ImageGalleryModel::where(['category_id' => $cat_id])->get();
    $cat = ImageGalleryCategoryModel::where(['id' => $cat_id])->first();
    return view('themes.default.photo_gallery_thumbnail', compact('data', 'cat'));
  }

  public function sendmail()
  {
    $data = SettingModel::where('id', 1)->first();
    Mail::to($data->email_primary)->send(new SendMail());
    return redirect()->back()->with('message', 'Contact message successfully sent.');
  }

  public function sendmail_contact(Request $request)
  {
    $return = $this->getCaptcha($request['g_recaptcha_response']);
    $data = SettingModel::where('id', 1)->first();
    $data->num_of_inquiries = $data->num_of_inquiries + 1;
    $data->save();
    if ($return->success == true && $return->score > 0.5) {
      Mail::to($data->email_primary)->send(new SendMailContact());
      return redirect()->back()->with('message', 'Contact message successfully sent.');
    } else {
      return redirect()->back()->with('message', 'Please, try again!');
    }
  }

  private function getCaptcha($Secretkey)
  {
    $secret = env('SECRET_KEY');
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$Secretkey}");
    $return = json_decode($response);
    return $return;
  }

  public function career_navigation(Request $request)
  {
    $data['career_title'] = $request->input('post_title');
    return view('themes.default.apply', $data);
  }

  public function career_apply()
  {
    $data['career_title'] = request()->segment(3);
    return view('themes.default.apply', $data);
  }

  public function career_apply_action()
  {
    $data = SettingModel::where('id', 1)->first();
    Mail::to($data->email_primary)->send(new CareerApply());
    return redirect()->back()->with('message', 'Successfully Applied.');
  }

  public function postby_category($id)
  {
    $post_category = PostCategoryModel::where(['id' => $id])->first();
    $data = PostModel::where(['post_category' => $id])->paginate(20);
    if ($data) {
      return view('themes.default.postbycategory', compact('data', 'post_category'));
    }
    return false;
  }

  public function postby_parent($id)
  {
    $childCount = PostModel::where(['post_parent' => $id])->count();
    if ($childCount > 0) {
      $parent_post = PostModel::where('post_parent', $id)->first();
      $post = PostModel::where(['post_parent' => intval($id)])->orderBy('post_order', 'asc')->paginate(15);
      return view('themes.default.template-project-list', compact('post', 'parent_post'));
    }
    return false;
  }

  public function serviceorder($uri)
  {
    $data = PostModel::where('page_key', $uri)->first();
    if ($data) {
      $services = PostModel::where('post_category', $data->post_category)->get();
      $category = PostCategoryModel::where('id', $data->post_category)->first();
      return view('themes.default.order-form', compact('data', 'services', 'category'));
    }
    return false;
  }

  public function sendorder(Request $request)
  {
    $return = $this->getCaptcha($request['g-recaptcha-response']);
    $data = SettingModel::where('id', 1)->first();
    if ($return->success == true && $return->score > 0.5) {
      Mail::to($data->email_primary)->send(new SendMail());
      return redirect()->back()->with('message', 'Order sent successfully.');
    } else {
      return redirect()->back()->with('message', 'Please, try again!');
    }
  }

  public function careerapply($uri)
  {
    $data = PostModel::where('page_key', $uri)->first();
    if ($data) {
      $services = PostModel::where('post_category', $data->post_category)->get();
      $category = PostCategoryModel::where('id', $data->post_category)->first();
      return view('themes.default.career-form', compact('data', 'services', 'category'));
    }
    return false;
  }

  public function sendresume(Request $request)
  {
    $return = $this->getCaptcha($request['g-recaptcha-response']);
    $data = SettingModel::where('id', 1)->first();
    if ($return->success == true && $return->score > 0.5) {
      Mail::to($data->email_primary)->send(new SendResume());
      return redirect()->back()->with('message', 'Resume sent successfully.');
    } else {
      return redirect()->back()->with('message', 'Please, try again!');
    }
  }


  public function post_inquiry(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'location' => 'required',
        'date' => 'required',
        'contact' => 'required'
      ]);
      $data = $request->all();
      $result = Inquiry::create($data);
      if ($result) {
        //              return new \App\Mail\Inquiry($request->email);
        //              Mail::send(new \App\Mail\Inquiry($request->email));
        return redirect()->back()->with('message', 'Inquiry message sent successfully.');
      }
    }
  }

  public function random_tripbooking(Request $request)
  {
    if ($request->isMethod('post')) {
      //          $request->validate([
      //              'first_name'=>'required',
      //              'last_name'=>'required',
      //              'email'=>'required',
      //              'phone'=>'required',
      //          ]);
      $data['first_name'] = $request->firstname;
      $data['last_name'] = $request->lastname;
      $data['email'] = $request->email;
      $data['phone'] = $request->phone;
      $data['message'] = $request->message;
      $data['type'] = $request->uri;
      $create = TripBooking::create($data);
      if ($create) {
        //              return new \App\Mail\TripBooking($request->email);
        //              Mail::send(new \App\Mail\TripBooking($request->email));
        return back()->with('message', 'Trip Booking Completed');
      }
    }
  }


  public function vehicle_booking(Request $request)
  {
    if ($request->isMethod('post')) {
      $data['first_name'] = $request->firstname;
      $data['last_name'] = $request->lastname;
      $data['email'] = $request->email;
      $data['phone'] = $request->phone;
      $data['message'] = $request->message;
      $data['type'] = $request->uri;
      $create = Booking::create($data);
      if ($create) {
        //             return new VehicleBooking($request->email);
        //             Mail::send(new VehicleBooking($request->email));
        return back()->with('message', 'Vehicle Booking Completed');
      }
    }
  }

  public function contact_form(Request $request)
  {
    if ($request->isMethod('post')) {
      $data['first_name'] = $request->firstname;
      $data['last_name'] = $request->lastname;
      $data['email'] = $request->email;
      $data['contact'] = $request->contact;
      $data['address'] = $request->address;
      $data['town'] = $request->town;
      $data['position'] = $request->job_title;
      $data['company'] = $request->company;
      $data['post_code'] = $request->post_code;
      $data['country'] = $request->country;
      $data['comments'] = $request->comments;
      $create = Contact::create($data);
      if ($create) {
        //              return new ContactMail($request->email);
        //             Mail::send(new ContactMail($request->email));
        return back()->with('message', 'Contact form submitted successfully');
      }
    }
  }

  public function proposal_request(Request $request)
  {
    if ($request->isMethod('get')) {
      $data = $request->uri;
      $industry = PostModel::where('status', 1)->where('post_type', 15)->get();
      $country = CountryModel::all();
      return view('themes.default.proposal', compact('data', 'industry', 'country'));
    }
    if ($request->isMethod('post')) {
      if ($request->isMethod('post')) {
        $request->validate([
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'contact' => 'required',
        ]);
        $data['first_name'] = $request->firstname;
        $data['last_name'] = $request->lastname;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['position'] = $request->position;
        $data['company'] = $request->company;
        $data['country'] = $request->country;
        $data['post_code'] = $request->postcode;
        $data['industry'] = $request->industry;
        $data['revenue'] = $request->revenue;
        $data['options'] = $request->option;
        $data['comments'] = $request->comment;
        if ($request->hasFile('rfp')) {
          $image = $request->file('rfp');
          $name = time() . '.' . $image->getClientOriginalExtension();
          $destinationPath = public_path('images/rfp/');
          $image->move($destinationPath, $name);
          $data['rfp'] = $name;
        }

        $result = Proposal::create($data);
        if ($result) {
          //              return new \App\Mail\Inquiry($request->email);
          //              Mail::send(new \App\Mail\Inquiry($request->email));
          return redirect()->back()->with('message', 'Proposal sent successfully.');
        }
      }
    }
  }
}
