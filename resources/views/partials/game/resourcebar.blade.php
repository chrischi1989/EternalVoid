<div class="row m-0 no-gutters justify-content-around font-weight-bold p-2 wow fadeIn milky bordered-bottom ">
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-13" title="Aluminium"></div>
        <span class="aluminium amount">{{ Helper::nf($resources->aluminium) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-4" title="Titan"></div>
        <span class="titan amount">{{ Helper::nf($resources->titan) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-14" title="Silizium"></div>
        <span class="silizium amount">{{ Helper::nf($resources->silizium) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-13" title="Arsen"></div>
        <span class="arsen amount">{{ Helper::nf($resources->arsen) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-1" title="Wasserstoff"></div>
        <span class="wasserstoff amount">{{ Helper::nf($resources->wasserstoff) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center mb-2 mb-sm-0">
        <div class="pse pse-14" title="Antimaterie"></div>
        <span class="antimaterie amount">{{ Helper::nf($resources->antimaterie) }}</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center">
        <div class="pse pse-14" title="Lager"></div>
        <span class="lager amount">{{ Helper::nf($resources->lager_int, 2) }}%</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center">
        <div class="pse pse-14" title="Speziallager"></div>
        <span class="speziallager amount">{{ Helper::nf($resources->speziallager_int, 2) }}%</span>
    </div>
    <div class="col-4 col-lg d-flex align-items-center">
        <div class="pse pse-14" title="Tanks"></div>
        <span class="tanks amount">{{ Helper::nf($resources->tanks_int, 2) }}%</span>
    </div>
    <a href="#" class="btn btn-primary circle position-absolute messages">
        <span class="fas fa-fw fa-envelope"></span>
    </a>
</div>
