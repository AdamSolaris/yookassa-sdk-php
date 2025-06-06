<?php

/*
 * The MIT License
 *
 * Copyright (c) 2025 "YooMoney", NBСO LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YooKassa\Model\Notification;

use YooKassa\Model\Notification\AbstractNotification;
use YooKassa\Model\NotificationEventType;

/**
 * Фабрика для получения конкретного объекта уведомления.
 *
 * @example 03-notification.php 3 Пример скрипта обработки уведомления
 *
 * @package YooKassa
 */
class NotificationFactory
{
    private $typeClassMap = array(
        NotificationEventType::PAYMENT_CANCELED            => 'NotificationCanceled',
        NotificationEventType::REFUND_SUCCEEDED            => 'NotificationRefundSucceeded',
        NotificationEventType::PAYMENT_SUCCEEDED           => 'NotificationSucceeded',
        NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE => 'NotificationWaitingForCapture',

        NotificationEventType::DEAL_CLOSED                 => 'NotificationDealClosed',
        NotificationEventType::PAYOUT_CANCELED             => 'NotificationPayoutCanceled',
        NotificationEventType::PAYOUT_SUCCEEDED            => 'NotificationPayoutSucceeded',
    );

    /**
     * @param array $data
     * @return AbstractNotification
     */
    public function factory(array $data)
    {
        if (!array_key_exists('event', $data)) {
            throw new \InvalidArgumentException(
                'Parameter event not specified in NotificationFactory.factory()'
            );
        }
        if (!is_string($data['event'])) {
            throw new \InvalidArgumentException('Invalid notification type value in notification factory');
        }
        if (!array_key_exists($data['event'], $this->typeClassMap)) {
            throw new \InvalidArgumentException('Invalid notification data type "' . $data['event'] . '"');
        }
        $className = __NAMESPACE__ . '\\' . $this->typeClassMap[$data['event']];

        return new $className($data);
    }
}
