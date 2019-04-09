<?php
// ヘッダーのナビゲーション
?>
<div class="header-top-wrap">
  <div class="header-logo-wrap">
    <a href="/">
      <img
        data-src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-jo.png"
        class="header-logo lazyload"
      >
    </a>
  </div>

  <div class='header-title-wrap'>
    <span class="header-title">
      やんやんとやんやん
    </span>
  </div>

  <nav class="header-main-navigation">
    <ul class='header-main-navigation-items-wrap'>
      <li>
        <a href="/">
          HOME
        </a>
      </li>
      <li>
        <a href="/">
          ARTICLE
        </a>
        <div class="header-main-navigation-child">
          <ul>
            <li>
              <a href="/category/trip/">
                Trip
              </a>
            </li>
            <li>
              <a href="/category/academic/">
                Academic
              </a>
            </li>
            <li>
              <a href="/category/skill/">
                Web Skill
              </a>
            </li>
            <li>
              <a href="/category/thought/">
                Thought
              </a>
            </li>
            <li>
              <a href="/category/lifestyle/">
                Lifestyle
              </a>
            </li>
            <li>
              <a href="/category/book/">
                Book
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/portfolio_index">
          PORTFOLIO
        </a>
      </li>
      <li>
        <a href="/about">
          ABOUT
        </a>
      </li>
      <li>
        <a href="/contact">
          CONTACT
        </a>
      </li>
    </ul>
  </nav>

  <div class="header-menu-toggle-button-wrap">
    <button class="header-menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
  </div>

</div>
