<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2013 Osclass
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form#change-username').validate({
            rules: {
                s_username: {
                    required: true
                }
            },
            messages: {
                s_username: {
                    required: '<?php echo osc_esc_js(__("Username: this field is required", "bender")); ?>.'
                }
            },
            errorLabelContainer: "#error_list",
            wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });

        var cInterval;
        $("#s_username").keydown(function(event) {
            if($("#s_username").attr("value")!='') {
                clearInterval(cInterval);
                cInterval = setInterval(function(){
                    $.getJSON(
                        "<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
                        {"s_username": $("#s_username").attr("value")},
                        function(data){
                            clearInterval(cInterval);
                            if(data.exists==0) {
                                $("#available").text('<?php echo osc_esc_js(__("The username is available", "bender")); ?>');
                            } else {
                                $("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "bender")); ?>');
                            }
                        }
                    );
                }, 1000);
            }
        });

    });
</script>
<div class="content user-area">
    <div id="right-side">
        <h1><?php _e('User account manager', 'realestate') ; ?></h1>
        <h2><?php _e('Change your username', 'realestate'); ?></h2>
        <div class="ui-generic-form ui-center">
            <div class="ui-generic-form-content">
                <form action="<?php echo osc_base_url(true) ; ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="change_username_post" />
                    <fieldset>
                        <div class="row ui-row-text">
                            <label for="s_username"><?php _e('Username', 'realestate') ; ?></label>
                            <input type="text" name="s_username" id="s_username" value="" />
                            <div id="available"></div>
                        </div>
                        <div class="actions">
                            <a href="#" class="ui-button ui-button-gray js-submit"><?php _e("Update", 'realestate');?></a>
                        </div>
                        <?php osc_run_hook('user_form') ; ?>
                    </fieldset>
                </form>
            </div>
        </div>    
    </div>
    <?php require('user_sidebar.php') ; ?>
    <div class="clear"></div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>