@if (session('success'))
    <div class="alert alert-success">
        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
        <i class="fa fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
        <i class="fa fa-check-circle"></i> {{ session('danger') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
        <i class="fa fa-check-circle"></i> {{ session('danger') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
        <i class="fa fa-check-circle"></i> {{ session('info') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
        <i class="fa fa-check-circle"></i> {{ session('warning') }}
    </div>
@endif
