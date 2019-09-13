<div class="discussion-meta">
	@if($discussion->responses > 0)
		@php(twentynineteen_discussion_avatars_list($discussion->authors))
	@endif
	<p class="discussion-meta-info">
		{!! twentynineteen_get_icon_svg('comment', 24) !!}
		<span>{{ esc_html($label) }}</span>
	</p>
</div><!-- .discussion-meta -->
