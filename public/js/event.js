document.addEventListener('DOMContentLoaded', function() {
    var userid="";
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC+1',

        initialView: 'dayGridMonth',//affichage de base
        selectable: true,//capacité de pouvoir selectioner
        editable: true,
        dayMaxEvents: true,//si trop d'event un pop up s'affiche
        navLinks: true, // si on click sur la date on arrive sur le jour cliqué

        //menu de navigation
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        //action lors d'un click sur une date
        /*dateClick: function(info) {
            var nom=prompt("Entrez votre nom et prénom")
            calendar.addEvent({
                title:nom,
                start:info.dateStr,
            })
        },*/

        //action lors de la selection de date
        select: function(info) {
            viderFormulaire();

            $("#btnSave").prop("disabled",false);
            $("#btnmodifier").prop("disabled",true);
            $("#btnsupprimer").prop("disabled",true);

            moisStart=(info.start.getMonth()+1);
            jourStart=(info.start.getDate());
            anneeStart=(info.start.getFullYear());
            heureStart=(info.start.getHours()-1+":"+info.start.getMinutes());

            moisStart=(moisStart<10)?"0"+moisStart:moisStart;
            jourStart=(jourStart<10)?"0"+jourStart:jourStart;

            moisEnd=(info.end.getMonth()+1);
            jourEnd=(info.end.getDate());
            anneeEnd=(info.end.getFullYear());
            heureEnd=(info.end.getHours()-1+":"+info.end.getMinutes());

            moisEnd=(moisEnd<10)?"0"+moisEnd:moisEnd;
            jourEnd=(jourEnd<10)?"0"+jourEnd:jourEnd;
            $('#startrdv').val(anneeStart+"-"+moisStart+"-"+jourStart+" "+heureStart);
            $('#endrdv').val(anneeEnd+"-"+moisEnd+"-"+jourEnd+" "+heureEnd);
            $('#Modal').modal();
            //var nom=prompt("Entrez votre nom et prénom");
            /*calendar.addEvent({
                title:$('#titrerdv').val(),
                start:info.startStr,
                end:info.endStr,

            }) */},
        eventClick:function(info){
            $("#btnmodifier").prop("disabled",false);
            $("#btnsupprimer").prop("disabled",false);
            $("#btnSave").prop("disabled",true);

            $('#idrdv').val(info.event.id);
            $('#titrerdv').val(info.event.title);
            moisStart=(info.event.start.getMonth()+1);
            jourStart=(info.event.start.getDate());
            anneeStart=(info.event.start.getFullYear());
            heureStart=(info.event.start.getHours()-1+":"+info.event.start.getMinutes());

            moisStart=(moisStart<10)?"0"+moisStart:moisStart;
            jourStart=(jourStart<10)?"0"+jourStart:jourStart;

            moisEnd=(info.event.end.getMonth()+1);
            jourEnd=(info.event.end.getDate());
            anneeEnd=(info.event.end.getFullYear());
            heureEnd=(info.event.end.getHours()-1+":"+info.event.end.getMinutes());

            moisEnd=(moisEnd<10)?"0"+moisEnd:moisEnd;
            jourEnd=(jourEnd<10)?"0"+jourEnd:jourEnd;
            $('#startrdv').val(anneeStart+"-"+moisStart+"-"+jourStart+" "+heureStart);
            $('#endrdv').val(anneeEnd+"-"+moisEnd+"-"+jourEnd+" "+heureEnd);
            userid=info.event.userId;
            $('#Modal').modal();
        },

        events:url_show,
    });
    calendar.render();
    calendar.updateSize();
    calendar.setOption('locale', 'fr');

    $('#save').click(function(){
        ObjEvent=dataGUI("POST");
        envoyerInformation('',ObjEvent);

    });

    $('#btnsupprimer').click(function(){
        ObjEvent=dataGUI("DELETE");
        envoieInformation('/'+$("#idrdv").val(),ObjEvent);

    });
    $('#btnmodifier').click(function(){
        ObjEvent=dataGUI("PATCH");
        envoieInformation('/'+$("#idrdv").val(),ObjEvent);

    });

    function dataGUI(method){
        nouveauEvent= {
            id:$('#idrdv').val(),
            title:$('#titrerdv').val(),
            start:$('#startrdv').val(),
            end:$('#endrdv').val(),
            userId:userid,
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
        }
        return(nouveauEvent);

    }

    function envoyerInformation(action,objEvent){
        $.ajax(
            {
                type:"POST",
                url:url_cree,
                data:objEvent,
                success:function(msg){console.log(msg);
                    $('#Modal').modal('toggle');
                    calendar.refetchEvents();
                },
                error:function(){alert("Une erreur");}

            }
        )
    }
    function envoieInformation(action,objEvent){
        $.ajax(
            {
                type:"POST",
                url:url_+action,
                data:objEvent,
                success:function(msg){console.log(msg);
                    $('#Modal').modal('toggle');
                    calendar.refetchEvents();
                },
                error:function(){alert("Une erreur");}

            }
        )
    }

    function viderFormulaire(){
        $('#idrdv').val("");
        $('#titrerdv').val("");
        $('#startrdv').val("");
        $('#endrdv').val("");

    }

});
