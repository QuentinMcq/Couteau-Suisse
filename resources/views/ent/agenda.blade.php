<x-app-layout>

    <x-slot name="header">
        <title>Couteau Suisse | Agenda</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">

    <meta charset='utf-8'/>
    <script>
        var url_ = "{{url('/eventAgenda')}}";
        var url_show = "{{url('/fullcalendareventmaster/show')}}";
        var url_cree = "{{url('/fullcalendareventmaster/create')}}";
        var url_update = "{{url('/fullcalendareventmaster/update')}}";
    </script>
    <script src="{{asset('js/event.js')}}" defer></script>

    <body>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Agenda</h4>

                    Id:
                    <br/>
                    <input type="text" class="form-control" name="idrdv" id="idrdv">


                    Description:
                    <br/>
                    <input type="text" class="form-control" name="titrerdv" id="titrerdv">

                    Start:
                    <br/>
                    <input type="text" class="form-control" name="startrdv" id="startrdv">
                    End:
                    <br/>
                    <input type="text" class="form-control" name="endrdv" id="endrdv">

                </div>

                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save" type="button" class="btn btn-primary">Save</button>
                    <button id="btnsupprimer" type="button" class="btn btn-danger">Supprimer</button>
                    <button id="btnmodifier" type="button" class="btn btn-warning">Modifier</button>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-3">
        <div id='calendar'></div>
    </div>

    </body>
    @include('footer')
</x-app-layout>
