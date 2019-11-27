document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listMonth'
      },
      // navLinks: true, // can click day/week names to navigate views
      // businessHours: true, // display business hours
      // editable: true,

      googleCalendarApiKey: 'AIzaSyDptpUnK0RjIYLUUwV475qppEx_XEcIzvg',
      events: 'ov0dk4m6dedaob7oqse4nrda4s@group.calendar.google.com',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },
      //events:
    });

    calendar.render();
  });



// document.addEventListener('DOMContentLoaded', function() {
//     var Calendar = FullCalendar.Calendar;
//     //var Draggable = FullCalendarInteraction.Draggable
//
//     /* initialize the external events */
//
//     //var containerEl = document.getElementById('external-events-list');
//     // new Draggable(containerEl, {
//     //     itemSelector: '.fc-event',
//     //     eventData: function(eventEl) {
//     //       return {
//     //         title: eventEl.innerText.trim()
//     //       }
//     //     }
//     //   });
//
//     /* initialize the calendar */
//
//     var calendarEl = document.getElementById('calendar');
//     var calendar = new Calendar(calendarEl, {
//         plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
//         header: {
//           left: 'prev,next today',
//           center: 'title',
//           right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
//         },
//         locale: 'en-br',
//         // editable: true,
//         // droppable: true, // this allows things to be dropped onto the calendar
//         // eventLimit: true,
//         // navLinks: true,
//         // selectable: true,
//         // drop: function(arg) {
//         //   // is the "remove after drop" checkbox checked?
//         //   if (document.getElementById('drop-remove').checked) {
//         //     // if so, remove the element from the "Draggable Events" list
//         //     arg.draggedEl.parentNode.removeChild(arg.draggedEl);
//         //   }
//         // }
//
//       });
//       calendar.render();
//
//   });
