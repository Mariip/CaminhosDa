<!---	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<div class="input-group">

<input type="search" id="s" name="s"  value="<?php echo $_GET['s']; ?>" class="form-control field" />	-->
<?php
    global $wp;
    $current_url = add_query_arg($wp -> query_string, '', home_url($wp -> request));
?>

<form role="search" method="get" id="searchform" action="<?php echo $current_url; ?>"role="search">
    <div class="input-group">
        <input type="search" id="s" name="s"  value="<?php echo $_GET['s']; ?>" class="form-control field" />
    <span class="input-group-btn">
        <button type="submit" class="btn btn-default submit">
            <span class="lupa"></span>
        </button></span></div>
    <!-- .input-group -->
</form>