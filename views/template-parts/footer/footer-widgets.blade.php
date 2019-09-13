@if(is_active_sidebar('sidebar-1'))
    <aside class="widget-area" role="complementary" aria-label="{{ esc_attr('Footer', THEME_TD) }}">
        @if(is_active_sidebar('sidebar-1'))
            <div class="widget-column footer-widget-1">
                @php(dynamic_sidebar('sidebar-1'))
            </div>
        @endif
    </aside><!-- .widget-area -->
@endif
