<div class="alert {{ Session::get('alert-class') }}" role="alert">
    <div class="alert-text">
        <h4 class="alert-heading">Got Issues!</h4>
        <p>{{ Session::get('message') }}</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
</div>
