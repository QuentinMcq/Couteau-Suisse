@if(auth()->user()->handicap === "dyslexie")
    <div class="container-fluid luciole">
        <label class="mt-3">
            <input type="text" wire:model="searchTerm" placeholder="Rechercher..." class="form-control m-3">
        </label>

        <div class="card-group">
            @foreach ($news as $new)
                <div class="col-lg-4 col-sm-6 mb-2 mt-3">
                    <div class="card">
                        <div class="card-header">
                            @if ($new->read_state === 'consulté')
                                <p class="float-right">&#10004; {{$new->read_state}}</p>
                            @else
                                <p class="float-right">&#10060; {{$new->read_state}}</p>
                            @endif
                            <h5 class="card-title font-bold">{{ $new->title }}</h5>
                        </div>

                        @if ($new->read_state === 'non lu')
                            <div class="card-body card border-danger">
                                @else
                                    <div class="card-body card border-success">
                                        @endif
                                        <p class="card-text">{{ $new->user }}</p>
                                        <p class="text-muted font-bold">Département {{ $new->department }} </p>
                                        <p>{{ $new->informations }}</p>
                                        @if ($new->url != null)
                                            <p class="text-muted font-italic">Cette actualité inclue une vidéo.</p>
                                        @endif
                                        <p class="text-muted">Ajoutée le {{ $new->created_at->format('d/m/y à H:m') }}</p>
                                        <a href="{{url('new/' . $new->id)}}" class="btn btn-success">
                                            Plus de détails
                                        </a>
                                    </div>
                            </div>
                    </div>
                    @endforeach
                </div>

                <div class="container mt-5" style="text-align: center">
                    <div class="format">
                        {{$news->links('livewire.pagination')}}
                    </div>
                </div>

                <br>
                <br>

        </div>
@else
    <div class="container-fluid">
        <label class="mt-3">
            <input type="text" wire:model="searchTerm" placeholder="Rechercher..." class="form-control m-3">
        </label>

        <div class="card-group">
            @foreach ($news as $new)
                <div class="col-lg-4 col-sm-6 mb-2 mt-3">
                    <div class="card">
                        <div class="card-header">
                            @if ($new->read_state === 'consulté')
                                <p class="float-right">&#10004; {{$new->read_state}}</p>
                            @else
                                <p class="float-right">&#10060; {{$new->read_state}}</p>
                            @endif
                            <h5 class="card-title font-bold">{{ $new->title }}</h5>
                        </div>

                        @if ($new->read_state === 'non lu')
                            <div class="card-body card border-danger">
                                @else
                                    <div class="card-body card border-success">
                                        @endif
                                        <p class="card-text">{{ $new->user }}</p>
                                        <p class="text-muted font-bold">Département {{ $new->department }} </p>
                                        <p>{{ $new->informations }}</p>
                                        @if ($new->url != null)
                                            <p class="text-muted font-italic">Cette actualité inclue une vidéo.</p>
                                        @endif
                                        <p class="text-muted">Ajoutée le {{ $new->created_at->format('d/m/y à H:m') }}</p>
                                        <a href="{{url('new/' . $new->id)}}" class="btn btn-success">
                                            Plus de détails
                                        </a>
                                    </div>
                            </div>
                    </div>
                    @endforeach
                </div>

                <div class="container mt-5" style="text-align: center">
                    <div class="format">
                        {{$news->links('livewire.pagination')}}
                    </div>
                </div>

                <br>
                <br>

        </div>
@endif



<style>
    .format {
        display: inline-block;
    }
</style>
