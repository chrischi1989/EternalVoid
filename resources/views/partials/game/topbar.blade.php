<div class="row no-gutters justify-content-between wow fadeIn milky bordered-bottom p-2">
    <div class="col-lg-2 font-weight-bold">
        <div class="row">
            <div class="col">{{ Helper::nf($resources->aluminium) }}</div>
            <div class="col">{{ Helper::nf($resources->titan) }}</div>
            <div class="col">{{ Helper::nf($resources->silizium) }}</div>
        </div>
        <div class="row">
            <div class="col">{{ Helper::nf($resources->arsen) }}</div>
            <div class="col">{{ Helper::nf($resources->wasserstoff) }}</div>
            <div class="col">{{ Helper::nf($resources->antimaterie) }}</div>
        </div>
    </div>
    <div class="col-lg-8">
        <h2 class="text-center">{{ $planet->planetname }}</h2>
    </div>
    <div class="col-lg-2 d-flex justify-content-end align-items-center">
        <a href="#" class="btn btn-primary circle"><span class="fas fa-fw fa-envelope"></span></a>
    </div>
</div>
