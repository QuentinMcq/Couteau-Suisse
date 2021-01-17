<x-app-layout>
    <body>
    <x-slot name="header">
        <title>Couteau Suisse | ENT</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ENT') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row sortable mt-3">
            @if(auth()->user()->handicap === "daltonien")
                <div class="col-12">
                    <div class="card mt-2" style="border-color: #1E90FF">
                        <div class="card-header">
                            <h1 class="card-title font-semibold text-xl text-center move" style="color: #1E90FF">Scolarité
                                <span><i class="fas fa-arrows-alt"></i></span>
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="row m-1 child-container" style="border-color: #1E90FF;">
                                <div class="text-center red m-2 square move" style="background-color: #1E90FF" data-arrange="1">
                                    <a class="link-size luciole" href="{{ $infos[0]->link }}" style="color:#FFFFFF">
                                        {{ $infos[0]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="2">
                                    <a class="link-size luciole" href="{{ $infos[1]->link }}" style="color:#FFFFFF">
                                        {{ $infos[1]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="3">
                                    <a class="link-size luciole" href="{{ $infos[2]->link }}" style="color:#FFFFFF">
                                        {{ $infos[2]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="4">
                                    <a class="link-size luciole" href="{{ $infos[3]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[3]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="5">
                                    <a class="link-size luciole" href="{{ $infos[4]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[4]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="6">
                                    <a class="link-size luciole" href="{{ $infos[5]->link }}" style="color:#FFFFFF">
                                        {{ $infos[5]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="7">
                                    <a class="link-size luciole" href="{{ $infos[6]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[6]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="8">
                                    <a class="link-size luciole" href="{{ $infos[7]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[7]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="9">
                                    <a class="link-size luciole" href="{{ $infos[8]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[8]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="10">
                                    <a class="link-size luciole" href="{{ $infos[9]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[9]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="11">
                                    <a class="link-size luciole" href="{{ $infos[10]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[10]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #1E90FF" data-arrange="12">
                                    <a class="link-size luciole" href="{{ $infos[11]->link }}" style="color:#FFFFFF" target="_blank">
                                        {{ $infos[11]->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card mt-2" style="border-color: #D2351F">
                        <div class="card-header">
                            <h1 class="card-title font-semibold text-xl text-center move" style="color: #D2351F">Scolarité
                                <span><i class="fas fa-arrows-alt"></i></span>
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="row m-1 child-container" style="border-color: #D2351F;">
                                <div class="text-center red m-2 square move" data-arrange="1">
                                    <a class="link-size luciole" href="{{ $infos[0]->link }}" style="color:#FFFFFF">
                                        {{ $infos[0]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="2">
                                    <a class="link-size luciole" href="{{ $infos[1]->link }}" style="color: #FFFFFF">
                                        {{ $infos[1]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="3">
                                    <a class="link-size luciole" href="{{ $infos[2]->link }}" style="color: #FFFFFF">
                                        {{ $infos[2]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="4">
                                    <a class="link-size luciole" href="{{ $infos[3]->link }}" style="color: #FFFFFF">
                                        {{ $infos[3]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="5">
                                    <a class="link-size luciole" href="{{ $infos[4]->link }}" target="_blank"  style="color: #FFFFFF">
                                        {{ $infos[4]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="6">
                                    <a class="link-size luciole" href="{{ $infos[5]->link }}" target="_blank"  style="color: #FFFFFF">
                                        {{ $infos[5]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="7">
                                    <a class="link-size luciole" href="{{ $infos[6]->link }}" target="_blank"  style="color: #FFFFFF">
                                        {{ $infos[6]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="8">
                                    <a class="link-size luciole" href="{{ $infos[7]->link }}" target="_blank"  style="color: #FFFFFF">
                                        {{ $infos[7]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="9">
                                    <a class="link-size luciole" href="{{ $infos[8]->link }}" target="_blank" style="color: #FFFFFF">
                                        {{ $infos[8]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="10">
                                    <a class="link-size luciole" href="{{ $infos[9]->link }}" target="_blank" style="color: #FFFFFF">
                                        {{ $infos[9]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="11">
                                    <a class="link-size luciole" href="{{ $infos[10]->link }}" target="_blank" style="color: #FFFFFF">
                                        {{ $infos[10]->title }}
                                    </a>
                                </div>

                                <div class="text-center red m-2 square move" data-arrange="12">
                                    <a class="link-size luciole" href="{{ $infos[11]->link }}" target="_blank" style="color: #FFFFFF">
                                        {{ $infos[11]->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-6">
                <div class="card mt-2" style="border-color: #28A60E">
                    <div class="card-header">
                        <h1 class="card-title font-semibold text-xl text-center move"
                            style="color:#28A60E;"> Campus en ligne
                            <span class="move"><i class="fas fa-arrows-alt"></i></span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row m-1 child-container" id="campus" style="border-color: #28A60E">
                            <div class="green m-2 square move" data-arrange="13">
                                <a class="link-size luciole" href="{{ $infos[12]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[12]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="14">
                                <a class="link-size luciole" href="{{ $infos[13]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[13]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="15">
                                <a class="link-size luciole" href="{{ $infos[13]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[13]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="15">
                                <a class="link-size luciole" href="{{ $infos[14]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[14]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="16">
                                <a class="link-size luciole" href="{{ $infos[15]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[15]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="17">
                                <a class="link-size luciole" href="{{ $infos[16]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[16]->title }}
                                </a>
                            </div>

                            <div class="green m-2 square move" data-arrange="18">
                                <a class="link-size luciole" href="{{ $infos[17]->link }}"
                                   target="_blank" style="color: #FFFFFF">
                                    {{ $infos[17]->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-2" style="border-color: dimgrey">
                    <div class="card-header">
                        <h1 class="card-title font-semibold text-xl text-center move"
                            style="color: dimgrey"> Aide
                            <span class="move"><i class="fas fa-arrows-alt"></i></span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row m-1 child-container" id="aide" style="border-color: dimgrey">
                            <div class="grey m-2 square move" data-arrange="19">
                                <a class="link-size luciole"
                                   href="{{ $infos[18]->link }}" style="color:#FFFFFF">
                                    {{ $infos[18]->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-2" style="border-color: #E47A00">
                    <div class="card-header">
                        <h1 class="card-title font-semibold text-xl text-center move"
                            style="color: #E47A00"> Bureau virtuel
                            <span class="move"><i class="fas fa-arrows-alt"></i></span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row m-1 child-container" id="bureau" style="border-color: #E47A00">
                            <div class="orange m-2 square move" data-arrange="20">
                                <a class="link-size luciole" href="{{ $infos[19]->link }}"
                                   target="_blank" style="color: #FFFFFF"> {{ $infos[19]->title }}</a>
                            </div>

                            <div class="orange m-2 square move" data-arrange="21">
                                <a class="link-size luciole" href="{{ $infos[20]->link }}"
                                   style="color: #FFFFFF"> {{ $infos[20]->title }}</a>
                            </div>

                            <div class="orange m-2 square move" data-arrange="22">
                                <a class="link-size luciole" href="{{ $infos[21]->link }}"
                                   target="_blank" style="color: #FFFFFF"> {{ $infos[21]->title }}</a>
                            </div>

                            <div class="orange m-2 square move" data-arrange="23">
                                <a class="link-size luciole" href="{{ $infos[22]->link }}"
                                   target="_blank" style="color: #FFFFFF"> {{ $infos[22]->title }}</a>
                            </div>

                            <div class="orange m-2 square move" data-arrange="24">
                                <a class="link-size luciole" href="{{ $infos[23]->link }}"
                                   target="_blank" style="color: #FFFFFF"> {{ $infos[23]->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-2" style="border-color: blueviolet">
                    <div class="card-header">
                        <h1 class="card-title font-semibold text-xl text-center move" style="color: blueviolet">
                            Intranet
                            <span class="move"><i class="fas fa-arrows-alt"></i></span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row m-1 child-container" id="intranet" style="border-color: blueviolet">
                            <div class="purple m-2 square move" data-arrange="25">
                                <a class="link-size luciole" href="{{ $infos[24]->link }}"
                                   target="_blank" style="color: #FFFFFF"> {{ $infos[24]->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-2" style="border-color: #0087A7">
                    <div class="card-header">
                        <h1 class="card-title font-semibold text-xl text-center move" style="color: #0087A7">
                            Documentation
                            <span class="move"><i class="fas fa-arrows-alt"></i></span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row m-1 child-container" id="docu" style="border-color: #0087A7">
                            <div class="blue m-2 square move" data-arrange="26">
                                <a class="link-size luciole"
                                   href="{{ $infos[25]->link }}" target="_blank"
                                   style="color:#FFFFFF"> {{ $infos[25]->title }} </a>
                            </div>

                            <div class="blue m-2 square move" data-arrange="27">
                                <a class="link-size luciole"
                                   href="{{ $infos[26]->link }}" target="_blank"
                                   style="color:#FFFFFF"> {{ $infos[26]->title }} </a>
                            </div>

                            <div class="blue m-2 square move" data-arrange="28">
                                <a class="link-size luciole"
                                   href="{{ $infos[27]->link }}" target="_blank"
                                   style="color:#FFFFFF"> {{ $infos[27]->title }} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(auth()->user()->handicap !== "non")
                <div class="col-6">
                    <div class="card mt-2" style="border-color: #FD6C9E">
                        <div class="card-header">
                            <h1 class="card-title font-semibold text-xl text-center move" style="color: #FD6C9E">Mon handicap
                                <span><i class="fas fa-arrows-alt"></i></span>
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="row m-1 child-container" style="border-color: #FD6C9E;">
                                <div class="text-center red m-2 square move" style="background-color: #FD6C9E">
                                    <a class="link-size luciole" id="sms" href="{{ $infos[0]->link }}" style="color:#FFFFFF">
                                        {{ $infos[0]->title }}
                                    </a>
                                </div>

                                <div class="red m-2 square move" style="background-color: #FD6C9E">
                                    <a class="link-size luciole" id="dossier" href="{{ $infos[1]->link }}" style="color:#FFFFFF">
                                        {{ $infos[1]->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    </body>
    @include('footer')
</x-app-layout>

</html>

<script>
    $(".parent-container").sortable({
        connectWith: ".connectedSortable",
        placeholder: 'movable-placeholder',
        tolerance: 'pointer',
        cancel: ".fixed",
        cursor: 'move',
        containment: "document",
        items: "> div",
        handle: ".move",
        opacity: 0.7,
        delay: 150,
        start: (e, ui) => {
            ui.placeholder.height(ui.helper.outerHeight());
        },
    });

    //localStorage.clear();

    // Section Scolarité
    if (localStorage.getItem('scolarite')) {
        const [arrayScolarite, arrayCampus, arrayAide, arrayBureau, arrayIntranet, arrayDocu] =
            [localStorage.getItem('scolarite').split(','), localStorage.getItem('campus').split(','),
                localStorage.getItem('aide').split(','), localStorage.getItem('bureau').split(','),
                localStorage.getItem('intranet').split(','), localStorage.getItem('docu').split(',')];
        map = {};

        // Permet de récupérer la valeur de data-arrange assignée à la div
        // afin de sauvegarder sa position et pouvoir la réutiliser plus tard
        $('#scolarite > div').each(function () {
            const scolarite = $(this);
            map[scolarite.data('arrange')] = scolarite;
        });

        $('#campus > div').each(function () {
            const campus = $(this);
            map[campus.data('arrange')] = campus;
        });

        $('#aide > div').each(function () {
            const aide = $(this);
            map[aide.data('arrange')] = aide;
        });

        $('#bureau > div').each(function () {
            const bureau = $(this);
            map[bureau.data('arrange')] = bureau;
        });

        $('#intranet > div').each(function () {
            const intranet = $(this);
            map[intranet.data('arrange')] = intranet;
        });

        $('#docu > div').each(function () {
            const docu = $(this);
            map[docu.data('arrange')] = docu;
        });

        // Permet d'ajouter les valeurs de chaque tableau aux cases correspondantes
        for (let val of arrayScolarite) $('#scolarite').append(map[val]);
        for (let val of arrayCampus) $('#campus').append(map[val]);
        for (let val of arrayAide) $('#aide').append(map[val]);
        for (let val of arrayBureau) $('#bureau').append(map[val]);
        for (let val of arrayIntranet) $('#intranet').append(map[val]);
        for (let val of arrayDocu) $('#docu').append(map[val]);
    }

    // Sort the children
    $(".child-container").sortable({
        items: "> div",
        tolerance: "pointer",
        containment: "document",
        connectWith: '.child-container',
        cancel: ".fixed",

        // Au rafraichissement de la page
        update: () => {
            const [dataScolarite, dataCampus, dataAide, dataBureau, dataIntranet, dataDocu] = [[], [], [], [], [], []];

            // Permet de sauvegarder les valeurs des cases dans des tableaux
            $('#scolarite').find('div').each(function () {
                dataScolarite.push($(this).data('arrange'));
            });
            $('#campus').find('div').each(function () {
                dataCampus.push($(this).data('arrange'));
            });
            $('#aide').find('div').each(function () {
                dataAide.push($(this).data('arrange'));
            });
            $('#bureau').find('div').each(function () {
                dataBureau.push($(this).data('arrange'));
            });
            $('#intranet').find('div').each(function () {
                dataIntranet.push($(this).data('arrange'));
            });
            $('#docu').find('div').each(function () {
                dataDocu.push($(this).data('arrange'));
            });

            // Permet de placer correctement les cases par rapport à la position avant le rafraichissement
            localStorage.setItem('scolarite', dataScolarite);
            localStorage.setItem('campus', dataCampus);
            localStorage.setItem('aide', dataAide);
            localStorage.setItem('bureau', dataBureau);
            localStorage.setItem('intranet', dataIntranet);
            localStorage.setItem('docu', dataDocu);
        }
    });

    // Permet de ne pas sélectionner le texte des cases
    $("#scolarite").disableSelection();
    $("#campus").disableSelection();
    $("#aide").disableSelection();
    $("#bureau").disableSelection();
    $("#intranet").disableSelection();
    $("#docu").disableSelection();
</script>

<style>
    footer {
        background: #16222A;
        background: linear-gradient(59deg, #0087A7, #024772);
        color: white;
        margin-top: 100px;
    }

    footer a {
        color: #fff;
        font-size: 14px;
        transition-duration: 0.2s;
    }

    footer a:hover {
        color: #FA944B;
        text-decoration: none;
    }

    .copy {
        font-size: 12px;
        padding: 10px;
        border-top: 1px solid #FFFFFF;
    }

    .footer-middle {
        padding-top: 2em;
        color: white;
    }

    .red {
        background-color: #D2351F;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .green {
        background-color: #28A60E;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .orange {
        background-color: #E47A00;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .blue {
        background-color: #0087A7;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .purple {
        background-color: rebeccapurple;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .grey {
        background-color: gray;
        color: white;
        border-radius: 5px;
        text-align: center;
    }

    .column-space {
        margin: 4px;
    }

    a:link {
        text-decoration: none;
        color: white;
    }

    .square {
        padding-top: 40px;
        height: 110px;
        width: 110px;
        font-size: 15px;
        font-weight: bold;
        font-family: Nunito, serif;
    }

    .movable-placeholder {
        background: #ccc;
        width: auto;
        height: auto;
        padding: 20px;
        margin: 0 0 15px 0;
        border-style: dashed;
        border-width: 2px;
        border-color: #000;
    }

    .move {
        cursor: grab;
    }

    .child-container {
        border: solid 1px;
        resize: both;
        overflow: auto;
        min-height: 130px;
        max-height: 505px;
        min-width: min-content;
        max-width: max-content;
    }

    .link-size {
        padding: 8px;
    }
</style>
