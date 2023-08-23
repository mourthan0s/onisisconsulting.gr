    
    <div class="footer">
      <div class="footer-inner">
        <div class="grid-x grid-padding-x">
          <div class="logo_footer large-12 cell">ONISIS</div>
        </div>
       </div>
      <div class="footer-inner">
        <div class="main grid-x grid-padding-x">

          <div class="column1 large-2 medium-3 small-12 cell">
            <div class="title_footer"><?php echo pll__( 'title_footer', 'onisis' ); ?></div>
            <div class="description_footer">
              <p><?php echo pll__( 'description_footer', 'onisis' ); ?></p>
            </div>
          </div>

          <div class="column2 large-2 medium-3 small-12 cell">
            <div class="title_footer"><?php echo pll__( 'company_footer_menu', 'onisis' ); ?></div>
              <div class="description_footer">
                <?php
                  wp_nav_menu( 
                    array(
                      'theme_location' => 'footer1',
                      'menu_class' => 'column2-wrapper',
                    )
                  );
                ?>
              </div>
          </div>

          <div class="column3 large-2 medium-3 small-12 cell">
            <div class="title_footer"><?php echo pll__( 'customer_care_footer_menu', 'onisis' ); ?></div>
            <div class="description_footer">
              <?php
                  wp_nav_menu( 
                    array(
                      'theme_location' => 'footer2', 
                      'menu_class' => 'column3-menu-wrapper',
                    )
                  );
                ?>
            </div>
          </div>

          <div class="large-2 cell"></div>

          <div class="column4 large-4 medium-12 small-12 cell">
            <div class="for_mobile">
              <div class="title_footer"><?php echo pll__( 'ns_title_footer_menu', 'onisis' ); ?></div>
              <div class="description_footer">
                <p><?php echo pll__( 'ns_text_footer_menu', 'onisis' ); ?></p>
              </div>
            </div>
            <?php echo (pll_current_language('slug') === 'el') ? do_shortcode('[contact-form-7 id="1063" title="Footer"]') : do_shortcode('[contact-form-7 id="4968" title="Footer_en"]') ?>
          </div>


        </div>
      </div>
      <div class="footer-inner">
        <div class="grid-x grid-padding-x">
          <div class="allrights large-full medium-full small-full cell"><p>© 2022, Onisis. All rights reserved.</p></div>
          <!-- <p>Designed & Developed by <a href="https://www.wildwildweb.gr/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector.png" alt="κατασκευή ιστοσελίδας" width="48" height="26"></a></p> -->
        </div>
      </div>
    </div>

    <!-- /////////////////////////////////////// -->

    <div class="form_popup">
      <div class="overlay__popup"></div>
      <div class="inner">
        <a href="#" id="closeVideo"><svg width="30" height="30" x="0px" y="0px" viewBox="0 0 512 512"><ellipse style="fill:#E04F5F;" cx="256" cy="256" rx="256" ry="255.832"/><g transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 77.26 32)"><rect x="3.98" y="-427.615" style="fill:#FFFFFF;" width="55.992" height="285.672"/><rect x="-110.828" y="-312.815" style="fill:#FFFFFF;" width="285.672" height="55.992"/></g></svg></a>
		     <?php echo (pll_current_language('slug') === 'el') ? do_shortcode( '[contact-form-7 id="1694" title="Schedule a consultation"]' ) : do_shortcode('[contact-form-7 id="6727" title="Schedule a consultation en"]') ?>
      </div>
    </div>
    
    <?php wp_footer();  ?>
  </body>
</html>