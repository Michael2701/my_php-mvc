"use strict"

const $root = $('#root');
const $customers_btn = $('#customers_btn');
const $departments_btn = $('#departments_btn');
const customers = new Customers;

$customers_btn.on('click', () => {
    customers.loadCustomers()
});





