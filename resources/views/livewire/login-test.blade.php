<div>
    <div class="card text-start">
        <div class="card-body">
            <h4 class="card-title">LOGIN TEST</h4>
            <form action="" wire:submit.prevent="menglogin">
                <input type="text" class="form-control" wire:model.defer="username">
                <input type="password" class="form-control" wire:model.defer="password">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @if(session()->has('message'))
            <span class="text-danger">
                {{ session('message') }}

            </span>
            @endif
        </div>

    </div>
</div>
