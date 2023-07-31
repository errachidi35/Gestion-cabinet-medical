<div id="calendar"></div>
<div class="form_wrapper">
    <h5>Prendre un rendez-vous</h5>
    <div class="insert_form">
        <input class="inser_input d-none" type="text" id="id">
        <input class="inser_input" type="date" placeholder="date" id="date_rendez-vous">
        <input class="inser_input" type="time" placeholder="time" id="time_start">
        <input class="inser_input" type="time" placeholder="time" id="time_end">
        <button type="submit" class="btn btn-warning confirmer">Confirmer</button>
    </div>
</div>
<script>
function reloadcal() {
    var calendar = $("#calendar").fullCalendar({
        eidtable: true,
        height: $(".calendar").height(),
        header: {
            left: "prev,next,today",
            center: "title",
            right: "month,agendaWeek,agendaDay",
        },

        weekends: false, // Hide weekends
        defaultView: "agendaWeek", // Only show week view
        //header: false, // Hide buttons/titles
        minTime: "07:30:00", // Start time for the calendar
        maxTime: "22:00:00", // End time for the calendar
        displayEventTime: true, // Display event time

        events: "../controller/controller_rv.php?action=load",

        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            // var title = prompt("Enter Event Title");
            console.log("hi");
            if (true) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                console.log(start);
                $.ajax({
                    url: "",
                    type: "POST",
                    data: {
                        start: start,
                        end: end,
                    },
                    success: function() {
                        // calendar.fullCalendar("refetchEvents");
                    },
                });
                // window.location.href = "rendez-vous.php";
            }
        },
        editable: true,
        eventResize: function(event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "../controller/controller_rv.php?action=update",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                },
                success: function() {
                    calendar.fullCalendar("refetchEvents");
                    alert("Event Update");
                },
            });
        },
        eventDrop: function(event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "../controller/controller_rv.php?action=update",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                },
                success: function() {
                    calendar.fullCalendar("refetchEvents");
                },
            });
        }
    });
    calendar.fullCalendar("refetchEvents");
}
$(document).ready(function() {
    reloadcal();
})
$(".confirmer").click(function(calendar) {
    var cin = "<?php echo $_SESSION['patient']->getCin(); ?>";
    var email = "<?php echo $_SESSION['patient']->getEmail(); ?>";
    var password = "<?php echo $_SESSION['patient']->getPassword(); ?>";
    $.ajax({
        url: "../controller/controller_rv.php?action=chercherPatient",
        type: "POST",
        data: {
            cin: cin,
            email: email,
            password: password
        },
        success: function(data) {
            data = JSON.parse(data)
            document.getElementById("id").value = data[
                "id"]
            var start = document.getElementById(
                    "date_rendez-vous").value +
                " " + document.getElementById(
                    "time_start")
                .value
            var end = document.getElementById(
                    "date_rendez-vous").value +
                " " + document.getElementById(
                    "time_end")
                .value
            var id = document.getElementById("id").value
            console.log(start, end, id)
            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = String(currentDate.getMonth() + 1).padStart(2, '0');
            var day = String(currentDate.getDate()).padStart(2, '0');
            var formattedDate = year + '-' + month + '-' + day;
            var start_current = formattedDate + " " + document.getElementById("time_start").value;
            var startDate = new Date(start);
            var endDate = new Date(end);
            if(start<end && start>start_current && (startDate.getHours()>=8 && startDate.getHours()<21) && 
            (endDate.getHours()>8 || endDate.getHours()<=21) && startDate.getDay()!=6 && startDate.getDay()!=0
             && endDate.getDay()!=6 && endDate.getDay()!=0 && endDate.getHours()-startDate.getHours() <=2 && endDate.getHours()-startDate.getHours() >=1){
                $.ajax({
                    url: "../controller/controller_rv.php?action=insert",
                    type: "POST",
                    data: {
                        start: start,
                        end: end,
                        patientID: id
                    },
                    success: function() {
                        reloadcal();
                        if (!jQuery
                            .isEmptyObject(JSON
                                .parse(data))) {
                            alert(
                                "plage indisponbile"
                            );
                        }
                        reloadcal();
                    }
                })
            }
            else{
                alert("impossible");
            }

        }
    })
    // var cin = document.getElementById("cin").value
    // var name = document.getElementById("name").value
    // var tele = document.getElementById("telephone").value
    // var prenom = document.getElementById("prenom").value
    // var email = document.getElementById("email").value
    // var date = new Date().toJSON().slice(0, 10).replace(/-/g, '/');
    // $.ajax({
    //     url: "CRUD/addPatient.php",
    //     type: "POST",
    //     data: {
    //         cin: cin,
    //         name: name,
    //         telephone: tele,
    //         prenom: prenom,
    //         email: email,
    //         date: date
    //     },
    //     success: function() {
    //     }
    // })
});

</script>