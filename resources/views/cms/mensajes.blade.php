@if (session('message'))
    <br>
    <div class="alert alert-border-success alert-dismissible fade show">
        <div class="d-flex align-items-center">
            <div class="font-35 text-success"><span class="material-icons-outlined fs-2">check_circle</span>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-success">Acción satisfactoria</h6>
                <div class="">{{ session('message') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
