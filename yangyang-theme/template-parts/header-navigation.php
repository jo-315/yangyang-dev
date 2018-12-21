<?php
// ヘッダーのナビゲーション
?>
<div class="header-top-wrap">
  <div class="header-logo-wrap">
    <a href="/">
      <img
        src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-jo.png"
        class="header-logo"
      >
    </a>
  </div>

  <div class='header-title-wrap'>
    <span class="header-title">
      やんやんとやんやん
    </span>
  </div>

  <div class="header-main-navigation-wrap">
    <nav class="header-main-navigation">
      <ul class='header-main-navigation-items-wrap'>
        <li>
          <a href="/">
            HOME
          </a>
        </li>
        <li>
          <a href="/portfolio">
            PORTFOLIO
          </a>
        </li>
        <li>
          <a href="/about">
            ABOUT
          </a>
        </li>
        <li>
          <a href="/contact-us">
            CONTACT US
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="header-menu-toggle-button-wrap">
    <button class="header-menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
  </div>

</div>
