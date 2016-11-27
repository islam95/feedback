<nav class="navbar navbar-inverse">
	<p class="navbar-brand">Отзывы</p>
	<div class="pull-right" style="padding-right: 15px;">
		<a href="?page=login" class="btn btn-primary navbar-btn" role="button">Админ логин</a>
	</div>
</nav>
<!-- Feedback content -->
<div class="col-md-8 col-md-offset-2">

	<div class="sorting">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-primary active" onclick="ajax_onload('sort_date')">
				<input type="radio" name="option1" id="option1" autocomplete="off" checked> По дате
			</label>
			<label class="btn btn-primary" onclick="ajax_onload('sort_name')">
				<input type="radio" name="option2" id="option2" autocomplete="off"> По имени
			</label>
			<label class="btn btn-primary" onclick="ajax_onload('sort_email')">
				<input type="radio" name="option3" id="option3" autocomplete="off"> По email
			</label>
		</div>
	</div>

	<div id="all_feed"></div>
	<div id="feed_send"></div>

	<div id="feed_preview">
		<div class="well well-sm">

			<div class="media">
				<div class="media-left">
					<div id="pre_image"></div>
				</div>
				<div class="media-body">
					<h4 class="media-heading text-capitalize"><span id="pre_name"></span>
                        <em><small class="pull-right" id="pre_date"></em></small></h4>
					<span id="pre_message"></span>
				</div>

			</div>

		</div>
	</div>
</div>