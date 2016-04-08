<?php while (osc_has_items()) { ?>
    <div class="ui-item ui-item-list">
        <div class="frame">
            <a href="<?php echo osc_item_url(); ?>"><?php if (osc_images_enabled_at_items()) { ?>
                    <?php if (osc_count_item_resources()) { ?>
                        <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>"/>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" alt="" title=""/>
                    <?php } ?>
                <?php } else { ?>
                    <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" alt="" title=""/>
                <?php } ?>
                <div class="type"><?php echo osc_item_category(); ?></div>
                <?php if (osc_price_enabled_at_items()) { ?><div class="price"><?php echo osc_item_formated_price(); ?></div> <?php } ?>
            </a>
        </div>
        <div class="info">
            <div>
                <h3><a href="<?php echo osc_item_url(); ?>"><?php if (strlen(osc_item_title()) > 31) {
                echo substr(osc_item_title(), 0, 28) . '...';
            } else {
                echo osc_item_title();
            } ?></a></h3>
            </div>
            <div class="data data-full">
                <?php _e('Publication date', 'realestate'); ?>: <?php echo osc_format_date(osc_item_pub_date()); ?><br />
            <div>
                <?php if(Params::getParam('route') == 'watchlist-user') {
                $url_delete_watchlist = osc_route_url('watchlist-delete', array('delete' => osc_item_id())); ?>
                <a onclick="javascript:return confirm('<?php _e('This action can not be undone. Are you sure you want to continue?', 'realestate'); ?>')" href="<?php echo $url_delete_watchlist; ?>" class="ui-button ui-button-grey ui-button-mini"><?php _e('Delete', 'realestate'); ?></a>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>