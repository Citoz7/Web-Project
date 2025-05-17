<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($request->product_id);

        // Hitung total harga berdasarkan jumlah
        $totalOrder = $request->quantity;

        // Simpan order ke database
        Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product' => $product->name,
            'total_order' => $totalOrder,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    public function purchasement()
    {
        // Ambil semua pesanan berdasarkan user yang sedang login
        $orders = Order::where('user_id', auth()->id())->with('product')->get();

        // Kirim data pesanan ke view
        return view('orders.purchasement', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Pastikan hanya pemilik order yang bisa menghapus
        if ($order->user_id !== auth()->id()) {
            return redirect()->route('orders.purchasement')->with('error', 'Unauthorized action.');
        }

        $order->delete();

        return redirect()->route('orders.purchasement')->with('success', 'Order deleted successfully.');
    }
}
