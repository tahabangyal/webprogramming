<?php
  $current_page = basename($_SERVER['PHP_SELF']);
?>
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="https://www.entracloud.net" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="/assets/img/logo.png" alt="entracloud logo">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <!-- PRODUCTS -->
        <li class="dropdown <?php echo in_array($current_page, ['domains.php', 'emails-and-security.php', 'vpn.php', 'cloud-servers.php']) ? 'active' : ''; ?>">
          <a href="#"><span>Products</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="<?php echo $current_page == 'domains.php' ? 'active' : ''; ?>">
              <a href="/products/domains.php">Domains</a>
            </li>
            <li class="<?php echo $current_page == 'emails-and-security.php' ? 'active' : ''; ?>">
              <a href="/products/emails-and-security.php">Emails and Security</a>
            </li>
            <li class="<?php echo $current_page == 'vpn.php' ? 'active' : ''; ?>">
              <a href="/products/vpn.php">Virtual Private Networks (VPN)</a>
            </li>
            <li class="<?php echo $current_page == 'cloud-servers.php' ? 'active' : ''; ?>">
              <a href="/products/cloud-servers.php">Cloud Servers</a>
            </li>
          </ul>
        </li>
    
        <!-- SERVICES -->
        <li class="dropdown <?php echo in_array($current_page, ['artificial-intelligence-development.php', 'mobile-application-development.php', 'website-development.php']) ? 'active' : ''; ?>">
          <a href="#"><span>Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="<?php echo $current_page == 'artificial-intelligence-development.php' ? 'active' : ''; ?>">
              <a href="/services/artificial-intelligence-development.php">Artificial Intelligence Development</a>
            </li>
            <li class="<?php echo $current_page == 'mobile-application-developement.php' ? 'active' : ''; ?>">
              <a href="/services/mobile-application-development.php">Mobile Application Development</a>
            </li>
            <li class="<?php echo $current_page == 'website-development.php' ? 'active' : ''; ?>">
              <a href="/services/website-development.php">Website Development</a>
            </li>
          </ul>
        </li>
        
        <!-- PROJECTS -->
        <li class="<?php echo $current_page == 'projects.php' ? 'active' : ''; ?>">
          <a href="/projects.php">Projects</a>
        </li>
    
        <!-- BLOGS AND UPDATES -->
        <li class="<?php echo $current_page == 'blogs-and-updates.php' ? 'active' : ''; ?>">
          <a href="/blogs-and-updates.php">Blogs and Updates</a>
        </li>
    
        <!-- HELP AND SUPPORT -->
        <li class="dropdown <?php echo in_array($current_page, ['knowledgebase.php', 'contact-us.php']) ? 'active' : ''; ?>">
          <a href="#"><span>Help and Support</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="<?php echo $current_page == 'knowledgebase.php' ? 'active' : ''; ?>">
              <a href="/knowledgebase.php">Knowledgebase</a>
            </li>
            <li class="<?php echo $current_page == 'contact-us.php' ? 'active' : ''; ?>">
              <a href="/contact-us.php">Contact Us</a>
            </li>
            <li>
              <a href="https://support.entracloud.net" target="_blank">
                <span>entraSupport</span> <i class="bi bi-box-arrow-up-right"></i>
              </a>
            </li>
          </ul>
        </li>
        <a href="https://clients.entracloud.net" target="_blank" class="d-none d-xl-block">
          <i class="bi bi-person text-danger" style="font-size: 24px;"></i>
      </a>
      </ul>
        
      <i class="mobile-nav-toggle d-xl-none bi bi-three-dots-vertical"></i>
      
    </nav>
    
  </div>
</header>