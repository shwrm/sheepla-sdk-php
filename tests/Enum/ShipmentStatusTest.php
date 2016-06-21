<?php

namespace Sheepla\Enum;

/**
 * @covers \Sheepla\Enum\ShipmentStatus
 */
class ShipmentStatusTest extends \PHPUnit_Framework_TestCase
{
    public function testGetStatusNames()
    {
        $shipmentStatus = new ShipmentStatus();
        $this->assertEquals([
            1  => 'W przygotowaniu',
            2  => 'Tworzenie dokumentów',
            3  => 'Odrzucenie zgłoszenia',
            4  => 'Oczekuje na raport zbiorczy',
            7  => 'Do wysyłki',
            8  => 'Do realizacji',
            9  => 'Zwracana do nadawcy',
            10 => 'Doręczona',
            11 => 'Anulowana',
            12 => 'Przyjęto zgłoszenie reklamacyjne',
            16 => 'Anulowana przez Użytkownika',
        ], $shipmentStatus->getStatusNames());
    }

    public function testConstants()
    {
        $shipmentStatus = new \ReflectionClass('Sheepla\Enum\ShipmentStatus');

        $this->assertEquals(1, $shipmentStatus->getConstant('IN_PREPARATION'));
        $this->assertEquals(2, $shipmentStatus->getConstant('DOCUMENT_CREATION'));
        $this->assertEquals(3, $shipmentStatus->getConstant('REJECTED'));
        $this->assertEquals(4, $shipmentStatus->getConstant('WAIT_FOR_COMMON_REPORT'));
        $this->assertEquals(7, $shipmentStatus->getConstant('TO_SHIPMENT'));
        $this->assertEquals(8, $shipmentStatus->getConstant('IN_PROCESS'));
        $this->assertEquals(9, $shipmentStatus->getConstant('RETURNED_TO_SENDER'));
        $this->assertEquals(10, $shipmentStatus->getConstant('DELIVERED'));
        $this->assertEquals(11, $shipmentStatus->getConstant('CANCELLED'));
        $this->assertEquals(12, $shipmentStatus->getConstant('COMPLAINT_RECEIVED'));
        $this->assertEquals(16, $shipmentStatus->getConstant('CANCELLED_BY_USER'));
    }
}
