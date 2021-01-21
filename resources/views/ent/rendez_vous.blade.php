<x-app-layout>

    <x-slot name="header">
        <title>Couteau Suisse | RDV</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RDV') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">

    <meta charset='utf-8'/>
    <script>
        var url_ = "{{url('/event')}}";
        @if(auth()->user()->personnel=="non")
        var url_show = "{{url('/fullcalendareventappointmentmaster/show')}}";
        var url_showOwn = "{{url('/fullcalendareventappointmentmaster/showOwn')}}"
        console.log(url_show);
        console.log(url_showOwn);
        @else
        var url_show = "{{url('/fullcalendareventappointmentmaster/showall')}}";
        var url_showOwn = ""
        console.log(url_show);
        @endif


        var url_cree = "{{url('/fullcalendareventappointmentmaster/create')}}";
        var url_creeDispo = "{{url('/fullcalendareventappointmentmaster/createDispo')}}";
        var idAuth = "{{Auth::id()}}";
        var AuthUsername = "{{Auth::user()->name}}"


    </script>
    <script src="{{asset('js/eventAppointment.js')}}" defer></script>

    <body>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Rendez-vous</h4>
                    Nom Prenom:
                    <br/>
                    <input type="text" class="form-control" name="titrerdv" id="titrerdv">

                    Start:
                    <br/>
                    <input type="text" class="form-control" name="startrdv" id="startrdv">
                    End:
                    <br/>
                    <input type="text" class="form-control" name="endrdv" id="endrdv">
                    @if(auth()->user()->personnel=="oui")
                        <br/>
                        <div>
                            <input type="radio" class="accept" id="accepted" name="status" value="2"
                                   checked
                            >
                            <label for="accepted">Accepter</label>

                            <input type="radio" class="accept" id="refused" name="status" value="3"
                            >
                            <label for="refused">Refuser</label>
                        </div>

                        <input type="text" id="value">
                    @endif


                </div>

            <div class="modal-footer">
                <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                @if(auth()->user()->personnel=="non")
                    <button id="btnmodifier" type="button" class="btn btn-primary">Sauvegarder</button>
                @elseif(auth()->user()->personnel=="oui")
                    <button id="btnmodifier" type="button" class="btn btn-primary" >Sauvegarder</button>
                <button id="btnsupprimer" type="button" class="btn btn-danger" >Supprimer</button>
                @endif

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DispoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @if(auth()->user()->personnel=="oui")
                    <div class="modal-body">
                        <h4>Rendez-vous</h4>

                        Date du jour de disponibilité:
                        <br/>
                        <input type="date" class="form-control" name="startdispo" id="startdispo">

                        Heure de debut (hh:mm):
                        <br/>
                        <input type="time" class="form-control" name="heurestartdispo" id="heurestartdispo">
                        Heure de fin (hh:mm):
                        <br/>
                        <input type="time" class="form-control" name="heureenddispo" id="heureenddispo">

                    </div>
                    <div class="modal-footer">
                        <button id="closeDispo" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>
                        <button id="saveDispo" type="button" class="btn btn-primary">Sauvegarder</button>
                    </div>
                @else
                    <div class="modal-body">

                        <h2>Vous ne possédez pas des droits nécessaires </h2>

                    </div>
                    <div class="modal-footer">
                        <button id="closeDispo" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>

                    </div>

                @endif


            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div id='calendar'></div>
    </div>
    </body>
    @include('footer')
</x-app-layout>

