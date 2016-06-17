<?php

namespace Sheepla\Enums;

/**
 * Class ShipmentStatus
 * @todo more flexible form of enumeration
 */
class ShipmentStatus
{
    const WAIT_FOR_COMMON_REPORT = 4;
    const IN_PREPARATION = 5; // @todo change it to the true value!
    const DELIVERED = 6;
    const REJECTED = 7;
    const TO_SHIPMENT = 8;

    private static $statusNames = [
        self::WAIT_FOR_COMMON_REPORT => 'Oczekuje na raport zbiorczy',
        self::IN_PREPARATION => 'W przygotowaniu',
        self::DELIVERED => 'Doręczona',
        self::REJECTED => 'Odrzucenie zgłoszenia',
        self::TO_SHIPMENT => 'Do wysyłki'
    ];

    public static function getStatusNames()
    {
        return self::$statusNames;
    }
}
