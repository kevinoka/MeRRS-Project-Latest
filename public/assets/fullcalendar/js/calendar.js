document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;

    /* initialize the external events
    -----------------------------------------------------------------*/

    // var containerEl = document.getElementById('external-events-list');
    // new Draggable(containerEl, {
    //     itemSelector: '.fc-event',
    //     eventData: function(eventEl) {
    //         return {
    //             title: eventEl.innerText.trim()
    //         }
    //     }
    // });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        buttonText: {
            dayGridMonth: 'Month',
            timeGridWeek: 'Week',
            timeGridDay: 'Day',
            listWeek: 'List',
            today: 'Today',
        },
        slotLabelFormat: [
            {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            }
        ],
        event: [
            {
                timeFormat: 'H:mm',
                hour12: false,
            }
        ],
        allDay: false,
        navLinks: true,
        eventLimit: true,
        eventTextColor: '#FFFFFF',
        editable: false,
        eventDrop: function(event){
            alert('event Drop')
        },
        eventResize: function(event){
            alert('event Resize')
        },
        eventClick: function(element){
            $("#modalCalendar").modal('show');

            let title = element.event.title;
            $("#modalCalendar input[name='title']").val(title);
            let start = moment(element.event.start).format("dddd, MMMM Do YYYY | HH:mm");
            $("#modalCalendar input[name='start']").val(start);
            let end = moment(element.event.end).format("dddd, MMMM Do YYYY | HH:mm");
            $("#modalCalendar input[name='end']").val(end);
            let room = element.event.extendedProps.room;
            $("#modalCalendar input[name='room']").val(room);
            let personNum = element.event.extendedProps.personNum;
            $("#modalCalendar input[name='personNum']").val(personNum);
            let requestedBy = element.event.extendedProps.requestedBy;
            $("#modalCalendar input[name='requestedBy']").val(requestedBy);
            let description = element.event.extendedProps.description;
            $("#modalCalendar input[name='description']").val(description);
        },
        events: routeEvents('routeLoadEvents')
    });
    calendar.render();

});
