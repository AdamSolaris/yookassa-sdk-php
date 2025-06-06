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

namespace YooKassa\Request\Deals;

use YooKassa\Common\AbstractObject;
use YooKassa\Common\AbstractRequest;

/**
 * Класс сериализатора объектов запросов к API для получения списка платежей
 *
 * @package YooKassa
 */
class DealsRequestSerializer
{
    /**
     * @var array Карта маппинга свойств объекта запроса на поля отправляемого запроса
     */
    private static $propertyMap = array(
        'createdAtGte'   => 'created_at.gte',
        'createdAtGt'    => 'created_at.gt',
        'createdAtLte'   => 'created_at.lte',
        'createdAtLt'    => 'created_at.lt',
        'expiresAtGte'   => 'expires_at.gte',
        'expiresAtGt'    => 'expires_at.gt',
        'expiresAtLte'   => 'expires_at.lte',
        'expiresAtLt'    => 'expires_at.lt',
        'status'         => 'status',
        'fullTextSearch' => 'full_text_search',
        'limit'          => 'limit',
        'cursor'         => 'cursor',
    );

    /**
     * Сериализует объект запроса к API для дальнейшей его отправки
     * @param DealsRequest|DealsRequestInterface|AbstractRequest $request Сериализуемый объект
     * @return array Массив с информацией, отправляемый в дальнейшем в API
     */
    public function serialize(DealsRequestInterface $request)
    {
        $result = array();
        foreach (self::$propertyMap as $property => $name) {
            $value = $request->{$property};
            if (!empty($value)) {
                if ($value instanceof \DateTime) {
                    if ($value->getTimestamp() > 1) {
                        $result[$name] = $value->format(YOOKASSA_DATE);
                    }
                } else {
                    $result[$name] = $value;
                }
            }
        }
        return $result;
    }
}
