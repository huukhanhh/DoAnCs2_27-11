<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)  
    {
        $this->productService = $productService;
    }

    // Hiển thị giỏ hàng
    public function index() {
        // Lấy thông tin giỏ hàng
        $carts = Cart::content();  // Lấy nội dung giỏ hàng
        $total = Cart::total();    // Tổng giá trị giỏ hàng
        $subtotal = Cart::subtotal();  // Tổng giá trị sản phẩm trong giỏ hàng

        return view('front.shop.cart', compact('carts', 'total', 'subtotal'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
     {
        if ($request->ajax()) {
            $product = $this->productService->find($request->productId);

        // Thêm sản phẩm vào giỏ hàng
        $response['cart'] = Cart::add([
            'id' => $product->id,  // ID duy nhất của sản phẩm 
            'name' => $product->name,  // Tên sản phẩm
            'qty' => 1,  // Số lượng mặc định là 1
            'price' => $product->discount ?? $product->price,  // Giá sản phẩm
            'weight' => $product->weight ?? 0,  // Trọng lượng sản phẩm (nếu có)
            'options' => [
                'images' => $product->productImages ?? []  // Các thuộc tính bổ sung (hình ảnh)
            ]
        ]);

        $response['count'] = Cart::count();
        $response['total'] = Cart::total();

        return $response;
        }

        return back();  // Trở lại trang trước đó
    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }

    public function destroy()
    {
        Cart::destroy();
    }

    public function update(Request $request) 
    {
        if($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }
}