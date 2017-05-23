<?php

use \model\Event;
use \controller\EventController;

class EventControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockPersonRepository = $this->getMockBuilder('model\EventRepository')
            ->getMock();
        $this->mockView = $this->getMockBuilder('view\View')
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockEventRepository = null;
        $this->mockView = null;
    }

    public function testHandleFindEventById_eventFound_stringWithIdName()
    {
        $event = new Event(1, 'Verjaardag');
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEventById')
            ->will($this->returnValue($event));
        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                $event = $object['events'];
                printf("[{\"id\"=>%d, \"name\"=>%s}]", $event[0]->getId(), $event[0]->getName());
            }));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEventById($event->getId());
        $this->expectOutputString(sprintf("[{\"id\"=>%d, \"name\"=>%s}]", $event->getId(), $event->getName()));
    }

    public function test_handleFindEventById_eventFound_returnStringEmpty()
    {
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEventById')
            ->will($this->returnValue(null));

        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                echo '';
            }));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEventById(1);
        $this->expectOutputString('');
    }

    public function testHandleFindEvents_eventsFound_stringWithIdName()
    {
        $event1 = new Event(1, 'feest1');
        $event2 = new Event(2, 'feest2');
        $events = [$event1, $event2];
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEvents')
            ->will($this->returnValue([$event1, $event2]));
        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                $events = $object['events'];
                echo json_encode($events);
            }));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEvents();
        $this->expectOutputString(json_encode($events));
    }

    public function test_handleFindEvents_NoEventFound_returnStringEmpty()
    {

        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEvents')
            ->will($this->returnValue([]));

        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                echo '[]';
            }));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEvents();
        $this->expectOutputString('[]');
    }


}
