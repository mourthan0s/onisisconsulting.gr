<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo is_front_page() ? 'homeOverflow' : '';?>" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?> 
</head>
<body <?php body_class( $bodyClass . ' view ' . $user_browser ); ?>>

<div class="header">
  <div class="header-inner">
      <div class="left">
            <div class="logo"> 
              <a href="<?php echo get_home_url(); ?>">
                <img class="logo-black" src="https://onisis.white-space.gr/wp-content/uploads/2023/03/onisis-black.png" alt="logo" >
                <img class="logo-white" src="https://onisis.white-space.gr/wp-content/uploads/2023/03/onisis-white.png" alt="logo" >
              </a>
            </div>
            <?php wp_nav_menu([ 'theme_location' => 'main', 'menu_class' => 'main-menu-wrapper', 'walker' => new Main_Menu_Walker() ]); ?> 
      </div> 
      <div class="right">
          <div class="phone">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_881_870)"><path d="M14.6468 12.2202C14.6468 12.4602 14.5935 12.7068 14.4802 12.9468C14.3668 13.1868 14.2202 13.4135 14.0268 13.6268C13.7002 13.9868 13.3402 14.2468 12.9335 14.4135C12.5335 14.5802 12.1002 14.6668 11.6335 14.6668C10.9535 14.6668 10.2268 14.5068 9.46016 14.1802C8.6935 13.8535 7.92683 13.4135 7.16683 12.8602C6.39223 12.2936 5.66129 11.6696 4.98016 10.9935C4.30601 10.3148 3.68423 9.58608 3.12016 8.8135C2.5735 8.0535 2.1335 7.2935 1.8135 6.54016C1.4935 5.78016 1.3335 5.0535 1.3335 4.36016C1.3335 3.90683 1.4135 3.4735 1.5735 3.0735C1.7335 2.66683 1.98683 2.2935 2.34016 1.96016C2.76683 1.54016 3.2335 1.3335 3.72683 1.3335C3.9135 1.3335 4.10016 1.3735 4.26683 1.4535C4.44016 1.5335 4.5935 1.6535 4.7135 1.82683L6.26016 4.00683C6.38016 4.1735 6.46683 4.32683 6.52683 4.4735C6.58683 4.6135 6.62016 4.7535 6.62016 4.88016C6.62016 5.04016 6.5735 5.20016 6.48016 5.3535C6.3935 5.50683 6.26683 5.66683 6.10683 5.82683L5.60016 6.3535C5.52683 6.42683 5.4935 6.5135 5.4935 6.62016C5.4935 6.6735 5.50016 6.72016 5.5135 6.7735C5.5335 6.82683 5.5535 6.86683 5.56683 6.90683C5.68683 7.12683 5.8935 7.4135 6.18683 7.76016C6.48683 8.10683 6.80683 8.46016 7.1535 8.8135C7.5135 9.16683 7.86016 9.4935 8.2135 9.7935C8.56016 10.0868 8.84683 10.2868 9.0735 10.4068C9.10683 10.4202 9.14683 10.4402 9.1935 10.4602C9.24683 10.4802 9.30016 10.4868 9.36016 10.4868C9.4735 10.4868 9.56016 10.4468 9.6335 10.3735L10.1402 9.8735C10.3068 9.70683 10.4668 9.58016 10.6202 9.50016C10.7735 9.40683 10.9268 9.36016 11.0935 9.36016C11.2202 9.36016 11.3535 9.38683 11.5002 9.44683C11.6468 9.50683 11.8002 9.5935 11.9668 9.70683L14.1735 11.2735C14.3468 11.3935 14.4668 11.5335 14.5402 11.7002C14.6068 11.8668 14.6468 12.0335 14.6468 12.2202Z" stroke="#394854" stroke-width="1.5" stroke-miterlimit="10"/><path d="M10.8198 5.17982L13.1798 2.81982M13.1798 5.17982L10.8198 2.81982" stroke="#394854" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_881_870"><rect width="16" height="16" fill="white"/></clipPath></defs></svg>
            <div class="phone_txt"><a href="tel:+302103001803">+302103001803</a></div>
          </div>
          <div class="global">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="24" height="24" fill="url(#pattern0)"/><defs><pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_880_923" transform="scale(0.0208333)"/></pattern><image id="image0_880_923" width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACnElEQVR4nO1ZyWoVQRQ9MUJMxAlxwKXigDuzctgZSZSIQ/QTnBZBPyKJA4pfEBVCIiZxWCQQB/TpXkJCXKgrNaKJWYnDwpgoBbehOFS/W939ummxDtzNq9OnzuF1dVffAgICAvLAMgCXAcxIXQLQgBJiPYAl9FsjgBcA/lBVJJiNetEoHKsB9ADodYzdcpiP6oaDf1O0jGYhaAcwB2ARwHYaa6tiPqoDdM1O0TKah/I0vhTARZnMGHlE43UAXnkEmBSujccytij/Rn0e5u+RkQ7iHPUwH9VhuvYkjQ/XMoRZpP00wTdZrDYeJggwStc2iqbN6XM8IFLhusPAIHE2AfidIMA8gI2kMezgXc1qvsW65+06TbxzCczHaZx1cMzcB9OaXwXgfczkW4n7IEWA+6SxLYb3EcCatCECAv5HNCuL7xjxb6dYwFENkNZxhW+8qbigiOwmvmvn6VsV0tqr8M/7BBhSRDYT/22GAG9Ia4vC5xeoExOKyFriz2UIMENa6xT+uE+AaUVkOfF5D5OkvpLWCoVvXqwqfioivEuczxDgl2PXW41vvKn4UeIA330CfCjxLfTOJ8B4iRfxS58AgwU+Rl8nfIzeqcWLbA/xn2cI8Iy09in8zlpsJczr3sZAhgD9pNWh8Hf5BAgICNA/6s0HeFEf9dNZPur3A1hwiJ7xaIlodcpDY0E8ZMK1nBpbGzwaW1dQA9RJG90WNhu+JuKNJQgwQtc2yUYtl9ZitEu8SxOcIM6RBAFMi94GN3eH8uhQG8Fua0242utTHuYnHO31J9Y935WHeRumV/lF+pY7aKzVI4Dpt7oOOGblgKSwR2x3lSOjOPO9MfwuACtRokO+isP80zId8mlokOOozwA+ybFRKY9ZAwLwj+MvdFyzgPxENokAAAAASUVORK5CYII="/></defs></svg>
          </div>
        <div class="translate"> <?php pll_the_languages( array( 'dropdown' => 1 ) ); ?></div>
          <div class="pop_up">
            <div class="schedule"><a class="" href="#" title="" id="book_now_btn"><?php echo pll__( 'consulte_top', 'onisis' ); ?></a></div>
          </div>
          <div class="burger-menu"><span></span><span></span><span></span></div>
      </div>
  </div>
</div>