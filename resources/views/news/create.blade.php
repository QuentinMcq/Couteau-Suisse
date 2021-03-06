<x-app-layout>
    <x-slot name="header">
        <title>Couteau Suisse | Ajout</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Ajout d'une actualité") }}
        </h2>
    </x-slot>

    <br>
    <br>

    <div class="container">
        <form action="{{route('news.store')}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input id="title"
                               type="text"
                               class="form-control"
                               name="title"
                               tabindex="1"
                               required
                        >
                    </div>

                    <div class="form-group">
                        <label for="department">Département </label>
                        <select id="department"
                                class="form-control"
                                name="department"
                                tabindex="5"
                                required>
                            <option class="font-bold" value="">-- Choisissez un département --</option>
                            <option value="INFORMATIQUE">Informatique</option>
                            <option value="MMI">MMI</option>
                            <option value="TC">TC</option>
                            <option value="GEA">GEA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url">URL<span class="font-italic"> (optionnel)</span></label>
                        <input id="url"
                               type="url"
                               class="form-control"
                               name="url"
                               tabindex="3">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="informations">Informations</label>
                        <textarea id="informations"
                                  class="form-control"
                                  name="informations"
                                  minlength="20"
                                  tabindex="2"
                                  required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="img">Image<span class="font-italic"> (optionnel)</span></label>
                        <input id="img"
                               type="file"
                               class="form-control"
                               name="img"
                               tabindex="3">
                    </div>
                </div>
            </div>

            <div class="row flex items-center justify-center mt-5">
                <button type="submit" class="btn btn-outline-success rounded-pill p-3">Créer une news</button>
            </div>
            <br>
            <br>
            <a href="{{url('/news')}}" type="submit" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</x-app-layout>

<style>
    .container {
        margin-top: 4%;
    }

    form {
        padding: 50px 30px 30px;
        border-radius: 50px;
        border-color: lightgrey;
        border-width: 1px;
        background-color: white;
    }

    textarea {
        height: 124px;
        min-height: 124px;
        max-height: 124px
    }

    .font-italic {
        color: grey;
    }

</style>
