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

namespace YooKassa\Model\ConfirmationAttributes;

use YooKassa\Model\ConfirmationType;

class ConfirmationAttributesQr extends AbstractConfirmationAttributes
{
    /**
     * Адрес страницы, на которую пользователь вернется после подтверждения или отмены платежа в приложении банка.
     *
     * Например, если хотите вернуть пользователя на сайт, вы можете передать URL, если в мобильное приложение — диплинк.
     * URI должен соответствовать стандарту [RFC-3986](https://www.ietf.org/rfc/rfc3986.txt).
     * Не более 1024 символов.
     *
     * Доступно только для платежей через [СБП](https://yookassa.ru/developers/payment-acceptance/integration-scenarios/manual-integration/other/sbp).
     *
     * @var string|null
     */
    private $_returnUrl;

    public function __construct()
    {
        $this->setType(ConfirmationType::QR);
    }

    public function getReturnUrl(): ?string
    {
        return $this->_returnUrl;
    }

    public function setReturnUrl(?string $returnUrl = null): self
    {
        $this->_returnUrl = $returnUrl;

        return $this;
    }
}
