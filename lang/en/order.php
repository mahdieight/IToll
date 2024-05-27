<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Order Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during order for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'enums' => [],
    'messages' => [
        'order_was_created_successfully' => 'The order was created successfully',
        'order_was_successfully_cancelled' => 'The order was successfully cancelled',
        'list_of_orders_has_been_received_successfully' => 'List of orders has been received successfully',
        'order_was_successfully_assigned' => 'Your order has been successfully assigned'
    ],
    'validations' => [
    ],
    'errors' => [
        'order_is_duplicated' => 'The order you are about to register is a duplicate',
        'is_not_possible_cancel_order' => 'It is not possible to cancel the order',
        'not_allowed_operate_on_the_orders_others' => 'You are not allowed to operate on the orders of others'
    ],

];