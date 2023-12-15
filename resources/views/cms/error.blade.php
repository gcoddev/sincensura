@if (session('error'))
<br>
    <div class="alert alert-border-danger alert-dismissible fade show">
        <div class="d-flex align-items-center">
            <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-danger">Error</h6>
                <div class="">{{ session('error') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
