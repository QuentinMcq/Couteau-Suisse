document.addEventListener('DOMContentLoaded', function() {
    var userid="";
    var eventid;
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC+1',

        initialView: 'timeGridWeek',//affichage de base
        selectable: true,//capacité de pouvoir selectioner
        editable: false,
        dayMaxEvents: true,//si trop d'event un pop up s'affiche
        businessHours: {
            startTime: '8:00',
            endTime: '18:00'
        },
        navLinks: true, // si on click sur la date on arrive sur le jour cliqué
        nowIndicator: true,

        //menu de navigation
        customButtons: {
            disponibiliteBtn: {
                text: 'Mes disponibilités',
                click: function() {
                    viderFormulaire();
                    $('#DispoModal').modal();

                }
            }
        },
        headerToolbar: {
            left: 'prev,next,today,disponibiliteBtn',
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
        /*select: function(info) {
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

        },*/
        eventClick:function(info){

            $("#btnSave").prop("disabled",true);
            $("#btnmodifier").prop("disabled",false);
            $("#btnsupprimer").prop("disabled",false);

            //$('#idrdv').val(info.event.id);
            eventid=info.event.id;
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

            userid=info.event.userId;
            $('#startrdv').val(anneeStart+"-"+moisStart+"-"+jourStart+" "+heureStart);
            $('#endrdv').val(anneeEnd+"-"+moisEnd+"-"+jourEnd+" "+heureEnd);

            $('#Modal').modal();

        },

        //events:url_show,
        //events:url_showOwn,
        eventSources: [
            {
                url: url_show, // use the `url` property
                textColor: 'white'  // an option!
            },
            {
                url: url_showOwn, // use the `url` property
                textColor: 'white'  // an option!
            }
            ]

    });
    calendar.render();
    calendar.updateSize();
    calendar.setOption('locale', 'fr');

    $('#save').click(function(){
        ObjEvent=dataGUI("POST");
        console.log(ObjEvent);
        envoyerInformation('',ObjEvent);

    });

    $('#btnsupprimer').click(function(){
        ObjEvent=dataGUI("DELETE");
        envoieInformation('/'+eventid,ObjEvent);

    });
    $('#btnmodifier').click(function(){
        ObjEvent=dataGUIModification("PATCH");
        envoieInformation('/'+eventid,ObjEvent);

    });

    $('#saveDispo').click(function() {
        ObjEvent = dataGUIDispo("POST");
        //console.log(ObjEvent);
        for(let i=0;i<ObjEvent.length;i++){

        envoyerInformation('', ObjEvent[i]);
        }

    });

    function dataGUI(method){

        nouveauEvent= {
            id:eventid,
            title:$('#titrerdv').val(),
            start:$('#startrdv').val(),
            end:$('#endrdv').val(),
            userId:userid,
            status:0,
            color:'gray',
            display: "",
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
        }
        return(nouveauEvent);

    }
    function dataGUIModification(method){
        console.log(eventid);
        if(document.querySelector("#accepted:checked")){
            nouveauEvent= {
                id:eventid,
                title:$('#titrerdv').val(),
                start:$('#startrdv').val(),
                end:$('#endrdv').val(),
                userId:userid,
                status:2,
                color:"green",
                display: "",
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
        }
        else if(document.querySelector("#refused:checked")){
            nouveauEvent= {
                id:eventid,
                title:$('#titrerdv').val(),
                start:$('#startrdv').val(),
                end:$('#endrdv').val(),
                userId:userid,
                status:3,
                color:"red",
                display: "",
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
        }
        else {
            nouveauEvent = {
                id: eventid,
                title: $('#titrerdv').val(),
                start: $('#startrdv').val(),
                end: $('#endrdv').val(),
                userId: userid,
                status: 1,
                color: "orange",
                appointmentUserId: idAuth,
                display: "",
                '_token': $("meta[name='csrf-token']").attr("content"),
                '_method': method
            }
        }
        return(nouveauEvent);

    }

    function dataGUIDispo(method){

         day=$('#startdispo').val();


         heureStart=$('#heurestartdispo').val();

         sta= heureStart.split(":");
         heureEnd=$('#heureenddispo').val();
         end= heureEnd.split(":");
         hend="";
         events=[];

         hs="";
         ms="";
         he= (Number(sta[0]));
         me= (+(sta[1]));
         i=0;
        while(+(sta[0]+sta[1])<+(end[0]+end[1])){
            sta= heureStart.split(":");
            if(+(sta[0]+sta[1]) >= +(end[0]+end[1])){
                break;
            }

            if(me>=30){
                hs=he;
                ms=me;
                he= (+ (sta[0]))+1;
                me= ( (+(sta[1]))+30)-60;
                heureStart=hs +":"+ms;
                hend=he +":"+me;
            }
            else{
                hs=he;
                ms=me;
                he= (+(sta[0]));
                me= (+(sta[1]))+30;
                heureStart=hs+":"+ms;
                hend=he +":"+me;
            }
            console.log(day+" "+heureStart);
            console.log("nom"+AuthUsername);
            nouveauEvent= {
                id:"",
                title:"disponibilité de "+AuthUsername,
                start:day+" "+heureStart,
                end:day+" "+hend,
                userId:userid,
                display:"",

                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method,
            }

            events.push(nouveauEvent);
            heureStart=hend;
            i++;
        }

        return(events);

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
    function envoyerInformationDispo(action,objEvent){
        $.ajax(
            {
                type:"POST",
                url:url_creeDispo,
                data:objEvent,
                success:function(msg){console.log(msg);
                    $('#DispoModal').modal('toggle');
                    calendar.refetchEvents();
                },
                error:function(){alert("Une erreur");}

            }
        )
    }
    function envoieInformation(action,objEvent) {
        $.ajax(
            {
                type: "POST",
                url: url_ + action,
                data: objEvent,
                success: function (msg) {
                    console.log(msg);
                    $('#Modal').modal('toggle');
                    calendar.refetchEvents();
                },
                error: function () {
                    alert("Une erreur");
                }

            }
        )
    }
    function envoieInformationDispo(action,objEvent){
        $.ajax(
            {
                type:"POST",
                url:url_+action,
                data:objEvent,
                success:function(msg){console.log(msg);
                    $('#DispoModal').modal('toggle');
                    calendar.refetchEvents();
                },
                error:function(){alert("Une erreur");}

            }
        )
    }

    function viderFormulaire(){
        $('#titrerdv').val("");
        $('#startrdv').val("");
        $('#endrdv').val("");

    }

});
