<?php
/**
 * GiaPhuGroup Co., Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GiaPhuGroup.com license that is
 * available through the world-wide-web at this URL:
 * https://www.giaphugroup.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    PHPCuong
 * @package     PHPCuong_CustomLogFile
 * @copyright   Copyright (c) 2019-2020 GiaPhuGroup Co., Ltd. All rights reserved. (http://www.giaphugroup.com/)
 * @license     https://www.giaphugroup.com/LICENSE.txt
 */

namespace PHPCuong\CustomLogFile\Observer;

class CustomerLoginSuccess implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \PHPCuong\CustomLogFile\Logger\Customer
     */
    protected $loggerCustomer;

    /**
     * @param \PHPCuong\CustomLogFile\Logger\Customer $loggerCustomer
     */
    public function __construct(
        \PHPCuong\CustomLogFile\Logger\Customer $loggerCustomer
    ) {
        $this->loggerCustomer = $loggerCustomer;
    }

    /**
     * Handler for 'customer_login' event.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->loggerCustomer->info('Customer ID: '.$customer->getId().' has been logged in successfully!');
    }
}
