<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Producttype;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Session;
use Hash;
use Auth;
use App\News;
use App\Comments;

class PageController extends Controller
{
   public function getIndex(){
    $slide = slide::all();
   $new_products = Product::where('new',1)->paginate(4);
   $sale_products = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_products','sale_products'));
    }


    public function getLoaiSp($types){
      $pd_types = Product::where('id_type',$types)->get();
      $top_pd = Product::where('id_type','<>',$types)->paginate(3);
      $list_Type = ProductType::all();
      $namepd = ProductType::where('id',$types)->first(); // 1 san pham 1 id 
      return view('page.loai_sanpham',compact('pd_types','top_pd','list_Type','namepd'));
    }


    public function getChitiet(Request $request, $id){
      $productDetail = Product::where('id',$request->id)->first();
      $comment = Comments::where('idProduct', $id)->leftjoin('users', 'comment.idUser', '=' , 'users.id')->get();

      // $user = User::where('id',Auth::user()->id)->get();
      // foreach($user as $key => $value){
      //   $name= $value['full_name'];
      // }
      $similarProduct = Product::where('id_type',$productDetail->id_type)->paginate(3);
      return view('page.chitiet_sanpham',compact('productDetail','similarProduct','comment'));
    }


    public function getLienhe(){
      return view('page.lienhe');
    }
    public function getGioiThieu(){
      return view('page.gioithieu');
    }
    public function getLsp(){
      return view('page.loai_sanpham');
    }


    public function getAddtoCart( Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDeleteCart($id){
        $oldCart = Session::has('cart')? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
          Session::put('cart',$cart);
        }else{
          Session::forget('cart');
        }

        return redirect()->back();
    }
     public function getDeleteCartAll($id){
        $oldCart = Session::has('cart')? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
          Session::put('cart',$cart);
        }else{
          Session::forget('cart');
        }

        return redirect()->back();
    }
    public function getCheckout(){
              if(Session('cart')){
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    return view('page.dathang',['product_cart'=> $cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        else{
          return view('page.dathang');
        }
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
       
          $customer = new Customer;
          $customer->name=$req->name;
          $customer->gender=$req->gender; // biến -> tên cột = request-> name form
          $customer->email=$req->email;
          $customer->address=$req->address;
          $customer->phone_number=$req->phone;
        
          $customer->save();

          $bill = new Bill;
          $bill->id_customer = $customer->id;
          $bill->date_order =  date('Y-m-d');
          $bill->total = $cart->totalPrice;
          $bill->payment = $req->payment_method;
         
          $bill->save();

          foreach ($cart->items as $key => $value){
          $bill_detail = new BillDetail;
          $bill_detail->id_bill = $bill->id;
          $bill_detail->id_product = $key;
          $bill_detail->id_User = Auth::user()->id;
          $bill_detail->quantity =$value['qty'];
          $bill_detail->unit_price = $value['price']/$value['qty'];
          $bill_detail->orderStatus = "đang xử lý";
          $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getLogin(){
      return view('page.dangnhap');
    }
    public function getSignup(){
      return view('page.dangki');
    }
    public function postSignin(Request $req){
        $this->validate($req,
          [
           'email'=>'required|email|unique:users,email',
           'password'=>'required|min:6|max:20',
           'fullname'=>'required',
           're_password' =>'required|same:password'],


          [
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            're_password.same'=>'mật khẩu nhập lại không đúng',
            'email.email'=> 'vui lòng nhập email đúng định dạng',
            'email.unique'=>'Email đã được sử dụng',
            'password.min'=> 'mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'mật khẩu không được quá 20 kí tự']
        );
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Bạn đã đăng kí thành công ');
    }
    public function postLogin(Request $req){
      $this->validate($req,
          [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'

          ],

          [
              'email.required'=>'Vui lòng nhập email',
              'email.email'=>'Định dạng email không đúng',
              'password.required'=>'Vui lòng nhập mật khẩu',
              'password.min' =>'Mật khẩu phải trên 6 ký tự',
              'password.max'=>'Mật khẩu không quá 20 ký tự'
          ]

      );   
               $check = array('email'=>$req->email,'password'=>$req->password);
              if(Auth::attempt($check)){
                return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
              }
              else {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
              }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
   }

   public function getSearch(Request $req){
      $product = Product::where('name','like','%'.$req->search.'%')                         
                          ->get();

        return view('page.search',compact('product'));
   }
   public function getAdmin(){

        $billDetail = BillDetail::all();
        return view('page.admin',compact('billDetail'));
   }

   public function getDeleteData($id){
       BillDetail::find($id)->delete();
         return redirect()->route('admin');
   }
   public function getNews(){

      $news = News::all();
      return view('page.tintuc',compact('news'));   
   }
   public function getManagerProduct(){
        $ManagerProduct = product::all();
    return view('page.adminsanpham',compact('ManagerProduct'));
   
   }

   public function postAddProduct( Request $req){
      $product = new Product();
      $product->name=$req->name;
      $product->id_type=$req->type;
      $product->description=$req->description;
      $product->unit_price= $req->unit_price;
      $product->promotion_price= $req->promotion_price;
      if ($req->hasFile('image')) {
      //     $destination_path = 'public/source/image/product';
      //     $image = $req->file('image');
      //     $image_name = $image->getClientOriginalName();
      //     $path = $req->file('image')->storeAS($destination_path,$image_name);
      //     $input['image'] = $image_name;
            $image = $req->file('image');
            $name = $image->getClientOriginalName();
            $image->move('public/source/image/product',$name);
        }
     $product->image=$name;
    $product->unit= $req->unit;
     //dd($req->all());
     $product->save();

      return view('page.themsanpham');
   }
   public function getAddProduct(){
        return view('page.themsanpham');

   }
  public function getEditProduct($id){
    $products = Product::where('id',$id)->first();
       return view('page.suasanpham',compact('products'));
  }


  public function postEditProduct(Request $req, $id){
      $product = Product::find($id)->first();   //tim id cua san pham can sua
      $product->name=$req->name;      // upadate ten
      $product->id_type=$req->type;   //update blabla
      $product->description=$req->description;  //update balabla
      $product->unit_price= $req->unit_price;   //update balabla  
      $product->promotion_price= $req->promotion_price;   //update balabla
      if ($req->hasFile('image')) {         //check xem hinh anh co chua
            $image = $req->file('image');     // lay immage 
            $name = $image->getClientOriginalName();  // ham get anh  
            $image->move('public/source/image/product',$name);    // duong dan luu anh do tep laravel
        }
       $product->image=$name;  //update ten anh vao csdl
       $product->unit= $req->unit;    //update balabla
     
     $product->save();  //luu san pham update
       return redirect()->route('quanlisanpham');
  }
  public function getDeleteProduct($id){
     Product::find($id)->delete();
         return redirect()->route('quanlisanpham');
  }
  public function postCommentProduct($id, Request $req){

      $idProductDetail= $id;
      $product = Product::find($id);
      $comment = new Comments;
      $comment->idProduct = $idProductDetail;
      $comment->idUser = Auth::user()->id;
      $comment->comment = $req->comment;
      $comment->save();
      return back();  
  }


  public function getEditOrder($id){
      $billOrder = BillDetail::where('id',$id)->first();
       return view('page.Orderedit',compact('billOrder'));
  }
 
  public function postUpdateOrder(Request $request , $id){
      $update = BillDetail::where('id',$id)->first();
      $update->orderStatus = $request->status;
      $update->save();
      return redirect()->route('admin');
  }
public function getCart($id){
    $user = $id;
    $data = BillDetail::where('id_User', $user)->get();
    foreach ($data as $key => $value) {
     $value->quantity;
     $product = Product::where('id',$value->id_product)->get(); 
      foreach($product as $products){
        $vari= $products->name.',';
      }
   
    }   
 return view('page.quanligiohang',compact('data'));     
}


public function getrequestdelete($idbill){
    $editbill = BillDetail::find($idbill)->first();
      $editbill->orderStatus = "yêu cầu hủy đơn hàng";
      $editbill->save();
      return back();

}





}