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

namespace YooKassa\Request\PersonalData;

/**
 * Класс сериалайзера объекта запроса к API на проведение выплаты
 *
 * @package YooKassa
 */
class CreatePersonalDataRequestSerializer
{
    /**
     * Формирует ассоциативный массив данных из объекта запроса
     *
     * @param CreatePersonalDataRequestInterface $request Объект запроса
     * @return array Массив данных для дальнейшего кодирования в JSON
     */
    public function serialize(CreatePersonalDataRequestInterface $request)
    {
        $result = array();

        if ($request->hasType()) {
            $result['type'] = $request->getType();
        }
        if ($request->hasLastName()) {
            $result['last_name'] = $request->getLastName();
        }
        if ($request->hasFirstName()) {
            $result['first_name'] = $request->getFirstName();
        }
        if ($request->hasMiddleName()) {
            $result['first_name'] = $request->getMiddleName();
        }
        if ($request->hasMetadata()) {
            $result['metadata'] = $request->getMetadata()->toArray();
        }

        return $result;
    }
}
