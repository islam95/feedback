
<div class="jumbotron">
    <div class="col-md-offset-2">
        <h2 class="text-muted">Отзывы</h2>
    </div>
    <div class="text-right">
        <button class="btn btn-primary">Админ</button>
    </div>
</div>

<div class="col-md-10">
    <input type="text" onkeyup="ajax_request(this.value);">
    <button onclick="ajax_request();">Нажать</button>
    <div id="result">This is the result div</div>
</div>

