<?php
include_once ('header.php');
?>
<h1 class='text-rose-600'><?php echo __( 'Welcome to Submenu Page One', 'wpui-menu-page' ); ?></h1>
<form method="post">
    <?php wp_nonce_field('save_name', 'save_name_nonce'); ?>
    <label for="name" class="block text-sm font-medium leading-6 text-gray-900"><?php echo esc_html_e( 'Name', 'wpui-menu-page' ); ?></label>
    <input type="hidden" name="action" value="save_name">
    <input type="text" name="user_name" placeholder="Enter your name" value="<?php echo esc_attr(get_option('user_name'));?>">
    <input type="submit" value="<?php echo esc_attr_e( 'Submit', 'wpui-menu-page' ); ?>" class="cursor-pointer rounded-md bg-slate-500 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
</form>
<?php
include_once ('footer.php');