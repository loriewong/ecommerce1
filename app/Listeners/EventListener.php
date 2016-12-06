<?php

namespace App\Listeners;

use App\Events\OrderProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderProcessed $data)
    {
      $eventdata = $data->order;
      $request = $eventdata->request;
      $email = $request->email;

      Mail::send('pages.email',
        ['title' => 'Order Confirmation Email',
        'order' => $request,
        'subtotal' => $eventdata->ordertotal,
        'orderquantity' => $eventdata->orderquantitytotal,
        'shipquantity' => $eventdata->shippingquantitytotal,
        'shippinglist' => $eventdata->shippinglist], function ($m) use ($email){
          $m->from('thebestshop@ecommerce.com', 'Ecommerce Order Confirmation');
          $m->to($email)
            ->subject('Ecommerce Order Confirmation');
        });
    }
}