<?php

namespace App\Http\Controllers\Home;

use App\Car;
use App\Http\Controllers\Controller;
use App\Services\Home\CarService;
use App\Services\Home\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order, $request, $car;

    public function __construct(OrderService $order, Request $request, CarService $car)
    {
        $this->order = $order;
        $this->request = $request;
        $this->car = $car;
    }

    public function view($order_id)
    {
        try{
            $order = $this->order->first($order_id);
        } catch (\Exception $exception) {
            return response($exception->getMessage());
        }

        return view('home.order.view', [
            'order' => $order,
        ]);
    }

    public function addView()
    {
        $cars = $this->car->get();
        
        $total_price = $this->car->total_price($cars);

        return view('home.order.add', [
            'cars' => $cars,
            'total_price' => $total_price
        ]);
    }

    public function addPost()
    {
        try{
            $this->order->add($this->request->all());
        } catch (\Exception $exception) {
            return response($exception->getMessage());
        }

        return redirect()->route('home.person');
    }

    public function changeStatus()
    {

    }

    public function destory()
    {

    }
}