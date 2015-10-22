<?php
    if(Params::getParam("action_specific")!='') {
        switch(Params::getParam("action_specific")) {
            case('settings'):
                osc_set_preference('homepage-claim',    trim(Params::getParam('homepage-claim', false, false, false)),   'realstate');

                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'realestate');
                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'realestate');
                osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'realestate');
                osc_set_preference('search-results-middle-728x90',  trim(Params::getParam('search-results-middle-728x90', false, false, false)),       'realestate');

                osc_set_preference('defaultLocationShowAs',  trim(Params::getParam('defaultLocationShowAs')),       'realestate');

                ob_end_clean();
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/realestate/admin/admin_settings.php')); exit;

            break;
        }
    }
?>
    <?php osc_show_flash_message('admin') ; ?>

    <form style="padding: 20px;" action="<?php echo osc_admin_render_theme_url('oc-content/themes/realestate/admin/admin_settings.php'); ?>" method="post">
        <input type="hidden" name="action_specific" value="settings" />

        <h2 class="render-title"><?php _e('Homepage text', 'realestate'); ?></h2>
        <fieldset>
            <div class="form-horizontal">
                <div class="form-row">
                    <div class="form-label"><?php _e('Text:', 'realestate'); ?></div>
                    <div class="form-controls">
                        <textarea name="homepage-claim" rows="4" cols="50"><?php echo osc_get_preference('homepage-claim', 'realstate'); ?></textarea>
                    </div>
                </div>
            </div>
        </fieldset>

        <h2 class="render-title"><?php _e('Location input', 'realestate'); ?></h2>
        <fieldset>
            <div class="form-horizontal">
                <div class="form-row">
                    <div class="form-label"><?php _e('Show location input as:', 'realestate'); ?></div>
                    <div class="form-controls">
                        <select name="defaultLocationShowAs">
                            <option value="dropdown" <?php if (realestate_default_location_show_as() == 'dropdown') { echo 'selected="selected"'; } ?>><?php _e('Dropdown', 'realestate'); ?></option>
                            <option value="autocomplete" <?php if (realestate_default_location_show_as() == 'autocomplete') { echo 'selected="selected"'; } ?>><?php _e('Autocomplete', 'realestate'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>

        <h2 class="render-title"><?php _e('Ads management', 'realestate'); ?></h2>
        <div class="form-row">
            <div class="form-label"></div>
            <div class="form-controls">
                <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', 'realestate'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'realestate'); ?></p>
            </div>
        </div>
        <fieldset>
            <div class="form-horizontal">
                <div class="form-row">
                    <div class="form-label"><?php _e('Header 728x90', 'realestate'); ?></div>
                    <div class="form-controls">
                        <textarea style="height: 115px; width: 500px;"name="header-728x90"><?php echo osc_esc_html(osc_get_preference('header-728x90', 'realestate')); ?></textarea>
                        <br/><br/>
                        <div class="help-box"><?php _e('This ad will be shown at the top of your website, next to the site title and above the search results. Note that the size of the ad has to be 728x90 pixels.', 'realestate'); ?></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label"><?php _e('Search results 728x90 (top of the page)', 'realestate'); ?></div>
                    <div class="form-controls">
                        <textarea style="height: 115px; width: 500px;" name="search-results-top-728x90"><?php echo osc_esc_html(osc_get_preference('search-results-top-728x90', 'realestate')); ?></textarea>
                        <br/><br/>
                        <div class="help-box"><?php _e('This ad will be shown on top of the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'realestate'); ?></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label"><?php _e('Search results 728x90 (middle of the page)', 'realestate'); ?></div>
                    <div class="form-controls">
                        <textarea style="height: 115px; width: 500px;" name="search-results-middle-728x90"><?php echo osc_esc_html(osc_get_preference('search-results-middle-728x90', 'realestate')); ?></textarea>
                        <br/><br/>
                        <div class="help-box"><?php _e('This ad will be shown among the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'realestate'); ?></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label"><?php _e('Sidebar 300x250', 'realestate'); ?></div>
                    <div class="form-controls">
                        <textarea style="height: 115px; width: 500px;" name="sidebar-300x250"><?php echo osc_esc_html(osc_get_preference('sidebar-300x250', 'realestate')); ?></textarea>
                        <br/><br/>
                        <div class="help-box"><?php _e('This ad will be shown at the right sidebar of your website, on the product detail page. Note that the size of the ad has to be 300x350 pixels.', 'realestate'); ?></div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="<?php _e('Save changes', 'realestate'); ?>" class="btn btn-submit">
                </div>
            </div>
        </fieldset>
    </form>
    <div style="clear: both;"></div>
