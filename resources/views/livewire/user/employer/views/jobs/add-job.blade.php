<div>
    @section('title', 'Dashboard | Create Demand')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A New Job For Your Business</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <h3>form here</h3>
                    {{-- <form wire:submit.prevent="goTest()">
                        <input type="text" class="fomr-control" wire:model.lazy="title">
                        <button type="submit">save</button>
                    </form> --}}
                    <button type="button" wire:click="goTest"></button>
                </div>
            </div>
        </div>
    </div>
</div>
