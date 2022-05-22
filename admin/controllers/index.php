<?php

$dashboard = new Dashboard();

$totalUser = $dashboard->entity_sum('agents');
$total = $dashboard->entity_sum('tickets');


// CUSTOMERS
$customer = new Customer();


$totalCustomers = $customer->total_customers()['total'];
