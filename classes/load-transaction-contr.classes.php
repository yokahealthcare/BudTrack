<?php

class LoadTransactionContr extends Transaction
{

    public function __construct()
    {

    }

    public function get_transaction()
    {
        # get all transactions from database
        $this->load_transaction();
    }
}