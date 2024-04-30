<style>
    .alert-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-container">
            <div>{!! session()->get('success') !!}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-container">
            <div>{!! session()->get('error') !!}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
