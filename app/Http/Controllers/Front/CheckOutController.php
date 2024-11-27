<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Utilities\VNPay;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        // Lấy nội dung giỏ hàng
        $carts = Cart::content();

        // Tổng tiền giỏ hàng
        $total = Cart::total();

        // Tổng tiền chưa tính thuế hoặc giảm giá
        $subtotal = Cart::subtotal();

        // Truyền các biến vào view
        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //1.Them don hang
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        //2. Them chi tiet don hang
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty'=> $cart->qty,
                'amount'=> $cart->price,
                'total'=> $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        if ($request->payment_type == 'pay_later') {
            
            //gui email
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);// goi ham goi email
            
            //3. Xoa gio hang
            Cart::destroy();

            //4.Tra ve ket qua thong bao
            return redirect('checkout/result')
                ->with('notification', 'Thành công! Bạn sẽ thanh toán khi nhận hàng. Hãy kiểm tra email của bạn.');
        }

        if ($request->payment_type == 'online_payment') {
            //1. Lay URL Thanh toan VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, // ID cua don hang
                'vnp_OrderInfo' => 'Mô tả đơn hàng ở đây...', //Mo ta don hang
                'vnp_Amount' => Cart::total(0, '', '') * 100 , //nhan voi ti gia de chuyen sang tieng viet
            ]);

            //Chuyen huong toi URL lay duoc
            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request)
    {
        //Lay data tu URL (do VNPay goi ve thong qua bien $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // ma phan hoi ket qua thanh toan. 00 = thanh cong
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
        $vnp_Amount = $request->get('vnp_Amount'); // so tien thanh toan

        // Kiem tra data, xem ket qua giao dich goi ve co hop le khong
        if ($vnp_ResponseCode != null) {
            //neu thanh cong
            if ($vnp_ResponseCode == 00) {
                //Cap nhat trang thai
                $this->orderService->update(['status' => Constant::order_status_Paid], $vnp_TxnRef);
                //gui email
            $order = $this->orderService->find($vnp_TxnRef);//bien vnp_Txn la order_ID
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);// goi ham goi email




                //xoa gio hang
                Cart::destroy();

                //Thong bao ket qua
                return redirect('checkout/result')
                    ->with('notification', 'Thành công! Đã thanh toán trực tuyến. Hãy kiểm tra email của bạn.');
            } else { // neu khong thanh cong
                //xoa don hang da them vao databse
                $this->orderService->delete($vnp_TxnRef);

                //Thong bao loi
                return redirect('checkout/result')
                    ->with('notification', 'LỖI: Thanh toán không thành công. Vui lòng thử lại!');
            }
        }
    }

    public function result()
    {
    // Lấy thông báo từ session, nếu không có sẽ mặc định là "Không có thông báo."
    $notification = session('notification', 'Không có thông báo.');

    // Trả về view kết quả, truyền thông báo vào view
    return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $total, $subtotal) 
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email',
            compact('order', 'total', 'subtotal'),
            function($message) use ($email_to) {
                $message->from('khanhdh2k5@gmail.com', 'MySu Fashion Trends');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');

            });
    }



}