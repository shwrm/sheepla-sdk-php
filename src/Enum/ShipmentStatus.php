<?php

namespace Sheepla\Enum;

/**
 * Class ShipmentStatus
 */
class ShipmentStatus
{
    const IN_PREPARATION = 1;
    const DOCUMENT_CREATION = 2;
    const REJECTED = 3;
    const WAIT_FOR_COMMON_REPORT = 4;
    const TO_SHIPMENT = 7;
    const IN_PROCESS = 8;
    const RETURNED_TO_SENDER = 9;
    const DELIVERED = 10;
    const CANCELLED = 11;
    const COMPLAINT_RECEIVED = 12;
    const CANCELLED_BY_USER = 16;

    private static $statusNames = [
        self::IN_PREPARATION            => 'W przygotowaniu',
        self::DOCUMENT_CREATION         => 'Tworzenie dokumentów',
        self::REJECTED                  => 'Odrzucenie zgłoszenia',
        self::WAIT_FOR_COMMON_REPORT    => 'Oczekuje na raport zbiorczy',
        self::TO_SHIPMENT               => 'Do wysyłki',
        self::IN_PROCESS                => 'Do realizacji',
        self::RETURNED_TO_SENDER        => 'Zwracana do nadawcy',
        self::DELIVERED                 => 'Doręczona',
        self::CANCELLED                 => 'Anulowana',
        self::COMPLAINT_RECEIVED        => 'Przyjęto zgłoszenie reklamacyjne',
        self::CANCELLED_BY_USER         => 'Anulowana przez Użytkownika'
    ];

    public static function getStatusNames()
    {
        return self::$statusNames;
    }
}
