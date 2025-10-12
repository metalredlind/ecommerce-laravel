<?php

return [
    'order_status_admin' => [
        'pending' => [
            'status' => 'Pending',
            'details' => 'Your order is currently pending'
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'Processed and Ready to be Shipped',
            'details' => 'Your package has been processed and will be with our delivery partner soon'
        ],
        'dropped_off' => [
            'status' => 'Dropped off',
            'details' => 'Your package has been dropped off by seller'
        ],
        'shipped' => [
            'status' => 'Shipped',
            'details' => 'Your package has been arrived at out logistic facilities'
        ],
        'out_for_delivery' => [
            'status' => 'Out for delivery',
            'details' => 'Our delivery partner has been deliver your package'
        ],
        'delivered' => [
            'status' => 'Delivered',
            'details' => 'Delivered'
        ],
        'canceled' => [
            'status' => 'Canceled',
            'details' => 'Canceled'
        ]
    ],


    'order_status_vendor' => [
        'pending' => [
            'status' => 'pending',
            'details' => 'Your order is currently pending'
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'Processed and Ready to be Shipped',
            'details' => 'Your package has been processed and will be with our delivery partner soon'
        ]
    ]
];
