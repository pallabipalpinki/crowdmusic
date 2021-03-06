<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title)?$page_title:'';?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Saira+Extra+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/tagify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/plugins.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
      body{overflow-x:hidden;overflow-y:auto;}.loding{display:flex;position:fixed;width:100%;height:100%;top:0;left:0;background:#000;z-index:200}.load-content{margin:auto;color:#fff;font-size:22px}#landinglogo path{animation:path-anim .3s ease-in forwards}#landinglogo path:nth-child(1){stroke-dasharray:174px;stroke-dashoffset:174px;animation-delay:0s}#landinglogo path:nth-child(2){stroke-dasharray:115px;stroke-dashoffset:115px;animation-delay:.3s}#landinglogo path:nth-child(3){stroke-dasharray:169px;stroke-dashoffset:169px;animation-delay:.6s}#landinglogo path:nth-child(4){stroke-dasharray:281px;stroke-dashoffset:281px;animation-delay:.9s}#landinglogo path:nth-child(5){stroke-dasharray:216px;stroke-dashoffset:216px;animation-delay:1.2s}#landinglogo path:nth-child(6){stroke-dasharray:270px;stroke-dashoffset:270px;animation-delay:1.5s}#landinglogo path:nth-child(7){stroke-dasharray:179px;stroke-dashoffset:179px;animation-delay:1.8s}#landinglogo path:nth-child(8){stroke-dasharray:164px;stroke-dashoffset:164px;animation-delay:2.1s}#landinglogo path:nth-child(9){stroke-dasharray:120px;stroke-dashoffset:120px;animation-delay:2.4s}#landinglogo path:nth-child(10){stroke-dasharray:254px;stroke-dashoffset:254px;animation-delay:2.7s}@keyframes path-anim{to{stroke-dashoffset:0}}
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/audio7_html5/audio7_html5.css">
  </head>
  <body id="_view">
     <?php if(!$this->session->userdata('SESSION_USER_ID')){  ?>
      <div class="loding">
        <div class="load-content">
          <svg id="landinglogo" width="365" height="61" viewBox="0 0 365 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.9878 6.688C22.7611 6.688 25.1718 7.09334 27.2198 7.904C29.2678 8.672 31.2731 9.86667 33.2358 11.488L28.5638 16.928C26.0038 14.8373 23.3158 13.792 20.4998 13.792C17.3424 13.792 14.8251 15.0933 12.9478 17.696C11.1131 20.256 10.1958 24.288 10.1958 29.792C10.1958 35.168 11.1131 39.1573 12.9478 41.76C14.8251 44.32 17.3638 45.6 20.5638 45.6C22.2278 45.6 23.7424 45.3013 25.1078 44.704C26.4731 44.064 27.9024 43.168 29.3958 42.016L33.7478 47.456C32.1691 49.0773 30.2064 50.4213 27.8598 51.488C25.5558 52.512 22.9958 53.024 20.1798 53.024C16.2118 53.024 12.7344 52.128 9.74776 50.336C6.76109 48.544 4.43576 45.92 2.77176 42.464C1.10776 38.9653 0.275757 34.7413 0.275757 29.792C0.275757 24.9707 1.12909 20.832 2.83576 17.376C4.54243 13.8773 6.88909 11.232 9.87576 9.44C12.8624 7.60534 16.2331 6.688 19.9878 6.688Z" fill="none" stroke="white" stroke-width="2" />
            <path d="M55.6098 17.12C56.6338 17.12 57.7644 17.2907 59.0018 17.632L57.4658 26.4C56.2711 26.1013 55.2684 25.952 54.4578 25.952C52.4524 25.952 50.8951 26.656 49.7858 28.064C48.6764 29.472 47.8018 31.6053 47.1618 34.464V52H38.0738V18.08H45.9458L46.7778 24.672C47.5884 22.2827 48.7618 20.4267 50.2978 19.104C51.8764 17.7813 53.6471 17.12 55.6098 17.12Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M75.8458 17.056C80.9231 17.056 84.8911 18.656 87.7498 21.856C90.6084 25.0133 92.0378 29.408 92.0378 35.04C92.0378 38.624 91.3764 41.7813 90.0538 44.512C88.7738 47.2 86.8964 49.2907 84.4218 50.784C81.9898 52.2773 79.1098 53.024 75.7818 53.024C70.7044 53.024 66.7151 51.4453 63.8138 48.288C60.9551 45.088 59.5258 40.672 59.5258 35.04C59.5258 31.456 60.1658 28.32 61.4458 25.632C62.7684 22.9013 64.6458 20.7893 67.0778 19.296C69.5524 17.8027 72.4751 17.056 75.8458 17.056ZM75.8458 23.84C73.5418 23.84 71.8138 24.7573 70.6618 26.592C69.5524 28.384 68.9978 31.2 68.9978 35.04C68.9978 38.88 69.5524 41.7173 70.6618 43.552C71.8138 45.344 73.5204 46.24 75.7818 46.24C78.0431 46.24 79.7284 45.344 80.8378 43.552C81.9898 41.7173 82.5658 38.88 82.5658 35.04C82.5658 31.2 82.0111 28.384 80.9018 26.592C79.7924 24.7573 78.1071 23.84 75.8458 23.84Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M141.381 18.08L134.149 52H123.077L118.213 26.208L113.349 52H102.405L94.9808 18.08H104.133L108.293 45.28L113.925 18.08H123.013L128.069 45.28L132.677 18.08H141.381Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M175.762 4.576V52H167.762L167.25 47.84C164.861 51.296 161.618 53.024 157.522 53.024C153.341 53.024 150.141 51.424 147.922 48.224C145.746 44.9813 144.658 40.5867 144.658 35.04C144.658 31.5413 145.213 28.448 146.322 25.76C147.474 23.0293 149.096 20.896 151.186 19.36C153.277 17.824 155.688 17.056 158.418 17.056C161.576 17.056 164.328 18.1867 166.674 20.448V3.552L175.762 4.576ZM160.21 46.24C161.533 46.24 162.706 45.92 163.73 45.28C164.754 44.5973 165.736 43.552 166.674 42.144V26.976C165.778 25.9093 164.861 25.12 163.922 24.608C163.026 24.0533 161.981 23.776 160.786 23.776C158.696 23.776 157.053 24.6933 155.858 26.528C154.706 28.3627 154.13 31.2 154.13 35.04C154.13 39.0933 154.642 41.9733 155.666 43.68C156.733 45.3867 158.248 46.24 160.21 46.24Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M221.371 17.056C224.059 17.056 226.213 17.9733 227.835 19.808C229.499 21.6427 230.331 24.1387 230.331 27.296V52H221.243V28.832C221.243 25.504 220.133 23.84 217.915 23.84C216.72 23.84 215.675 24.224 214.779 24.992C213.883 25.76 212.965 26.9547 212.027 28.576V52H202.939V28.832C202.939 25.504 201.829 23.84 199.611 23.84C198.416 23.84 197.371 24.2453 196.475 25.056C195.579 25.824 194.683 26.9973 193.787 28.576V52H184.699V18.08H192.571L193.275 22.304C194.555 20.5973 195.984 19.296 197.563 18.4C199.184 17.504 201.04 17.056 203.131 17.056C205.051 17.056 206.715 17.5467 208.123 18.528C209.531 19.4667 210.555 20.8107 211.195 22.56C212.603 20.7253 214.117 19.36 215.739 18.464C217.403 17.5253 219.28 17.056 221.371 17.056Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M266.725 52H258.853L258.405 47.456C257.21 49.3333 255.759 50.7413 254.053 51.68C252.346 52.576 250.362 53.024 248.101 53.024C245.029 53.024 242.682 52.1067 241.061 50.272C239.439 48.3947 238.629 45.792 238.629 42.464V18.08H247.717V41.312C247.717 43.104 248.015 44.384 248.613 45.152C249.21 45.8773 250.149 46.24 251.429 46.24C253.861 46.24 255.93 44.768 257.637 41.824V18.08H266.725V52Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M286.963 17.056C291.741 17.056 295.837 18.4213 299.251 21.152L295.795 26.336C292.936 24.544 290.12 23.648 287.347 23.648C285.853 23.648 284.701 23.9253 283.891 24.48C283.08 25.0347 282.675 25.7813 282.675 26.72C282.675 27.4027 282.845 27.9787 283.187 28.448C283.571 28.9173 284.253 29.3653 285.235 29.792C286.259 30.2187 287.773 30.7307 289.779 31.328C293.363 32.3093 296.029 33.632 297.779 35.296C299.528 36.9173 300.403 39.1573 300.403 42.016C300.403 44.2773 299.741 46.24 298.419 47.904C297.139 49.568 295.389 50.848 293.171 51.744C290.952 52.5973 288.477 53.024 285.747 53.024C282.888 53.024 280.285 52.5973 277.939 51.744C275.592 50.848 273.587 49.632 271.923 48.096L276.403 43.104C279.261 45.3227 282.291 46.432 285.491 46.432C287.197 46.432 288.541 46.112 289.523 45.472C290.547 44.7893 291.059 43.872 291.059 42.72C291.059 41.824 290.867 41.12 290.483 40.608C290.099 40.096 289.395 39.6267 288.371 39.2C287.347 38.7307 285.747 38.1973 283.571 37.6C280.157 36.6613 277.619 35.3387 275.955 33.632C274.333 31.8827 273.523 29.728 273.523 27.168C273.523 25.248 274.077 23.52 275.187 21.984C276.296 20.448 277.853 19.2533 279.859 18.4C281.907 17.504 284.275 17.056 286.963 17.056Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M315.412 18.08V52H306.324V18.08H315.412ZM310.804 0.608002C312.425 0.608002 313.748 1.12 314.772 2.144C315.838 3.12533 316.372 4.384 316.372 5.92C316.372 7.456 315.838 8.736 314.772 9.76C313.748 10.7413 312.425 11.232 310.804 11.232C309.182 11.232 307.86 10.7413 306.836 9.76C305.812 8.736 305.3 7.456 305.3 5.92C305.3 4.384 305.812 3.12533 306.836 2.144C307.86 1.12 309.182 0.608002 310.804 0.608002Z" fill="none" stroke="white" stroke-width="2"/>
            <path d="M351.33 49.248C353.976 49.248 356.322 49.5893 358.37 50.272C360.418 50.9547 362.338 51.936 364.13 53.216L358.434 60.704C355.917 58.1013 353.4 56.1387 350.882 54.816C348.408 53.4933 345.272 52.832 341.474 52.832C337.592 52.832 334.2 51.936 331.298 50.144C328.44 48.352 326.221 45.7493 324.642 42.336C323.106 38.88 322.338 34.72 322.338 29.856C322.338 25.0773 323.128 20.96 324.706 17.504C326.328 14.0053 328.61 11.3387 331.554 9.504C334.541 7.62667 338.04 6.688 342.05 6.688C346.104 6.688 349.602 7.60534 352.546 9.44C355.49 11.232 357.752 13.856 359.33 17.312C360.909 20.768 361.698 24.9493 361.698 29.856C361.698 34.848 360.76 38.9013 358.882 42.016C357.005 45.088 354.488 47.4987 351.33 49.248ZM332.258 29.856C332.258 35.488 333.09 39.584 334.754 42.144C336.418 44.704 338.85 45.984 342.05 45.984C345.293 45.984 347.725 44.7253 349.346 42.208C350.968 39.648 351.778 35.5307 351.778 29.856C351.778 24.1813 350.968 20.0853 349.346 17.568C347.725 15.008 345.293 13.728 342.05 13.728C338.808 13.728 336.354 15.008 334.69 17.568C333.069 20.128 332.258 24.224 332.258 29.856Z" fill="none" stroke="white" stroke-width="2"/>
          </svg>
        </div>
      </div>
      <!-- End loding animation -->
     <?php } ?>
    <header id="header">
      <div class="header-area">
        <div class="header-top text-right">
          <div class="container-fluid">
            <div class="header-social">
              <a href="#">
                <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.2792 11.25L10.8496 7.63047H7.28306V5.28164C7.28306 4.29141 7.78127 3.32617 9.3786 3.32617H11V0.244531C11 0.244531 9.52863 0 8.12184 0C5.18471 0 3.26486 1.73359 3.26486 4.87187V7.63047H0V11.25H3.26486V20H7.28306V11.25H10.2792Z" fill="white"/>
                </svg>
              </a>
              <a href="#">
                <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20.6358 4.73514C20.6504 4.94294 20.6504 5.15079 20.6504 5.35859C20.6504 11.6968 15.9074 19 7.2386 19C4.5679 19 2.08694 18.2132 0 16.8477C0.379457 16.8922 0.744269 16.907 1.13832 16.907C3.34198 16.907 5.37057 16.15 6.9905 14.8586C4.91816 14.8141 3.18147 13.4336 2.58311 11.5336C2.87501 11.5781 3.16687 11.6078 3.47337 11.6078C3.89658 11.6078 4.31984 11.5484 4.71385 11.4445C2.55395 10.9992 0.933974 9.06952 0.933974 6.73905V6.6797C1.56149 7.03595 2.29125 7.25861 3.06467 7.28826C1.795 6.4273 0.963174 4.95779 0.963174 3.29528C0.963174 2.40467 1.19663 1.58826 1.60529 0.875759C3.92574 3.78513 7.41371 5.6851 11.3248 5.89295C11.2519 5.5367 11.2081 5.16564 11.2081 4.79454C11.2081 2.15232 13.3096 0 15.9219 0C17.2792 0 18.5051 0.578905 19.3661 1.51406C20.4314 1.30626 21.453 0.905458 22.3579 0.356253C22.0076 1.46956 21.2633 2.40472 20.2855 2.99842C21.2342 2.89457 22.1536 2.62732 23 2.25627C22.358 3.20623 21.5553 4.05229 20.6358 4.73514Z" fill="white"/>
                </svg>
              </a>
              <a href="#">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.4977 5.11587C13.4772 5.11587 15.8806 7.51975 15.8806 10.5C15.8806 13.4803 13.4772 15.8841 10.4977 15.8841C7.51807 15.8841 5.11472 13.4803 5.11472 10.5C5.11472 7.51975 7.51807 5.11587 10.4977 5.11587ZM10.4977 14.0004C12.4231 14.0004 13.9973 12.4306 13.9973 10.5C13.9973 8.5694 12.4278 6.99961 10.4977 6.99961C8.56748 6.99961 6.99805 8.5694 6.99805 10.5C6.99805 12.4306 8.57217 14.0004 10.4977 14.0004ZM3.63898 4.89563C3.63898 5.59383 4.20117 6.15146 4.89453 6.15146C5.59258 6.15146 6.15008 5.58914 6.15008 4.89563C6.15008 4.20211 5.5879 3.6398 4.89453 3.6398C4.20117 3.6398 3.63898 4.20211 3.63898 4.89563ZM0.0737858 6.1702C0.153429 4.48795 0.53759 2.99782 1.76972 1.77011C2.99716 0.542396 4.48695 0.15815 6.16882 0.0738034C7.90223 -0.0246011 13.0978 -0.0246011 14.8312 0.0738034C16.5084 0.153464 17.9982 0.537711 19.2303 1.76542C20.4624 2.99314 20.8419 4.48326 20.9262 6.16551C21.0246 7.89931 21.0246 13.096 20.9262 14.8298C20.8466 16.512 20.4624 18.0022 19.2303 19.2299C17.9982 20.4576 16.5131 20.8419 14.8312 20.9262C13.0978 21.0246 7.90223 21.0246 6.16882 20.9262C4.48695 20.8465 2.99716 20.4623 1.76972 19.2299C0.542276 18.0022 0.158113 16.512 0.0737858 14.8298C-0.0245953 13.096 -0.0245953 7.90399 0.0737858 6.1702ZM2.31316 16.6901C2.67858 17.6086 3.386 18.3161 4.30892 18.6863C5.69096 19.2346 8.97038 19.1081 10.4977 19.1081C12.0249 19.1081 15.309 19.2299 16.6864 18.6863C17.6046 18.3208 18.312 17.6132 18.6822 16.6901C19.2303 15.3078 19.1038 12.0276 19.1038 10.5C19.1038 8.97239 19.2256 5.68755 18.6822 4.30989C18.3167 3.39144 17.6093 2.68387 16.6864 2.31368C15.3044 1.76542 12.0249 1.89194 10.4977 1.89194C8.97038 1.89194 5.68628 1.77011 4.30892 2.31368C3.39069 2.67918 2.68327 3.38676 2.31316 4.30989C1.76503 5.69223 1.89152 8.97239 1.89152 10.5C1.89152 12.0276 1.76503 15.3125 2.31316 16.6901Z" fill="white"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="header-bottom">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-auto mr-auto">
                <a href="<?php echo base_url(); ?>" class="logo navbar-brand"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
              </div>
              <div class="col-auto">
                <?php
                  if($this->session->userdata('success')){?>
                <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                  
                   ?> 
                <?php if($this->session->userdata('fail')){?>
                <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  
                  ?> 
                <nav class="header-nav">
                  <ul class="home-section-menu vc d-none d-lg-inline-block">
                    <li><a class="active" href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="#_top-songs">Top Songs</a></li>
                    <li><a href="#_categories">Categories</a></li>
                    <?php
                    if(session_userdata('SESSION_USER_ID')){
                      ?>
                      <li><a href="<?php echo $profile_url;?>">My Profile</a></li>
                      <?php
                    }
                    ?>
                  </ul>
                
                  <div class="socials vc">
                    <div class="search-group">
                      <a href="#">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="18" fill="#D70672"/>
                        <path d="M21.25 21.25L25 25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 16.4286C10 17.2728 10.1663 18.1087 10.4893 18.8887C10.8124 19.6686 11.2859 20.3773 11.8829 20.9743C12.4798 21.5712 13.1885 22.0447 13.9685 22.3678C14.7484 22.6909 15.5844 22.8571 16.4286 22.8571C17.2728 22.8571 18.1087 22.6909 18.8887 22.3678C19.6686 22.0447 20.3773 21.5712 20.9743 20.9743C21.5712 20.3773 22.0447 19.6686 22.3678 18.8887C22.6909 18.1087 22.8571 17.2728 22.8571 16.4286C22.8571 14.7236 22.1798 13.0885 20.9743 11.8829C19.7687 10.6773 18.1335 10 16.4286 10C14.7236 10 13.0885 10.6773 11.8829 11.8829C10.6773 13.0885 10 14.7236 10 16.4286V16.4286Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </a>
                      <div class="search-fields">
                        <form action="">
                        <input type="text" class="form-control" placeholder="Search here...">
                        <button type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                     <?php if(!session_userdata('SESSION_USER_ID')){  ?>
                    <a href="<?php echo base_url('sign-up');?>">
                      <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 0C10.089 0 4.69762 4.66356 3.32812 10.8889H6.42188C7.71637 6.39644 11.7525 3.11111 16.5 3.11111C22.29 3.11111 27 7.99556 27 14C27 20.0044 22.29 24.8889 16.5 24.8889C11.7525 24.8889 7.71637 21.6036 6.42188 17.1111H3.32812C4.69762 23.3364 10.089 28 16.5 28C23.943 28 30 21.7187 30 14C30 6.28133 23.943 0 16.5 0ZM12 7.77778V12.4444H0V15.5556H12V20.2222L19.5 14L12 7.77778Z" fill="#D70672" />
                      </svg>
                    </a>
                    <a href="javascript:;" onclick="openSignin()">
                      <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="18" fill="#D70672" />
                        <g clip-path="url(#clip0)">
                          <path d="M17 18C19.2094 18 21 16.2094 21 14C21 11.7906 19.2094 10 17 10C14.7906 10 13 11.7906 13 14C13 16.2094 14.7906 18 17 18ZM19.8 19H19.2781C18.5844 19.3188 17.8125 19.5 17 19.5C16.1875 19.5 15.4188 19.3188 14.7219 19H14.2C11.8813 19 10 20.8813 10 23.2V24.5C10 25.3281 10.6719 26 11.5 26H20.0906C20.0156 25.7875 19.9844 25.5625 20.0094 25.3344L20.2219 23.4312L20.2594 23.0844L20.5063 22.8375L22.9219 20.4219C22.1563 19.5562 21.0469 19 19.8 19ZM21.2156 23.5406L21.0031 25.4469C20.9688 25.7656 21.2375 26.0344 21.5531 25.9969L23.4563 25.7844L27.7656 21.475L25.525 19.2344L21.2156 23.5406ZM29.7813 18.4031L28.5969 17.2188C28.3063 16.9281 27.8313 16.9281 27.5406 17.2188L26.3594 18.4L26.2313 18.5281L28.475 20.7688L29.7813 19.4625C30.0719 19.1687 30.0719 18.6969 29.7813 18.4031Z" fill="white" />
                        </g>
                        <defs>
                          <clipPath id="clip0">
                            <rect width="20" height="16" fill="white" transform="translate(10 10)" />
                          </clipPath>
                        </defs>
                      </svg>
                    </a>
                    
                    <button class="menu-toggler vc">
                    <span></span>
                    <span></span>
                    <span></span>
                    </button>
                 
                  <?php }else{ ?>
                  
                    <a href="<?php echo base_url('user-logout');?>">
                      <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 0C10.089 0 4.69762 4.66356 3.32812 10.8889H6.42188C7.71637 6.39644 11.7525 3.11111 16.5 3.11111C22.29 3.11111 27 7.99556 27 14C27 20.0044 22.29 24.8889 16.5 24.8889C11.7525 24.8889 7.71637 21.6036 6.42188 17.1111H3.32812C4.69762 23.3364 10.089 28 16.5 28C23.943 28 30 21.7187 30 14C30 6.28133 23.943 0 16.5 0ZM12 7.77778V12.4444H0V15.5556H12V20.2222L19.5 14L12 7.77778Z" fill="#D70672" />
                      </svg>
                    </a>
                  </div>
                  <?php }?>
                  <div class="menu-wrapper">
                    <div class="menu-close">
                      <span></span>
                      <span></span>
                    </div>
                    <ul class="mt-auto">
                      <li><a href="#">Item 1</a></li>
                      <li><a href="#">Item 2</a></li>
                      <li><a href="#">Item 3</a></li>
                      <li><a href="#">Item 4</a></li>
                    </ul>
                    <ul class="home-section-menu d-inline-block d-lg-none mb-auto">
                      <li><a class="active" href="#_view">Home</a></li>
                      <li><a href="#_top-songs">Top Songs</a></li>
                      <li><a href="#_categories">Categories</a></li>
                    </ul>
                  </div>
                  <div class="menu-overlay"></div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="modal fade da-modal signinModal" id="signinModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog loginForm" role="document">
                        <div class="modal-content px-2">
                          <div class="modal-header">
                            <div class="header-title mb-0">
                              <h2>Sign in</h2>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="loguserform">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="usernamei" class="form-control">
                                <span style="color:red"><?php echo form_error('username'); ?></span>
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="passwordi" class="form-control">
                                <span style="color:red"><?php echo form_error('password'); ?></span>
                              </div>
                              <!-- <a href="#"> <span></span> <span></span> <span></span> <span></span> Submit </a> -->
                              <button class="log-btn btn btn-lg btn-primary btn-block" type="submit" id="loguser" >Login</button>
                              <div class="omb_login">
                                <h4>OR</h4>
                                <div class="text-center">
                                  <div class="omb_socialButtons mb-4">
                                    <!-- <a href="javascript:void(0);" class="btn btn-lg omb_btn-facebook" id="btn_gauth" data-social_id="fbauth">
                                      <i class="fab fa-facebook-f" style="padding:14px;"></i>
                                    </a> -->
                                    <a href="javascript:void(0);" class="btn btn-lg omb_btn-google" id="btn_gauth" data-social_id="gauth">
                                      <i class="fab fa-google" style="padding:14px;"></i>
                                    </a>
                                  </div>
                                  <p>Don't have an account? <a href="<?php echo base_url('sign-up');?>">Sign up</a></p>
                                </div>
                              </div>
                              <!-- <div class="omb_login">
                                <h4>OR</h4>
                                <div class="row omb_socialButtons">
                                  <div class="col-xs-4 col-sm-2 col-lg-4 col-md-4">
                                    <a href="#" class="btn btn-lg btn-block omb_btn-facebook" id="btn_gauth" data-social_id="fbauth">
                                      <i class="fab fa-facebook-f"></i>
                                      <span class="hidden-xs">Facebook</span>
                                    </a>
                                  </div>
                                  <div class="col-xs-4 col-sm-2 col-lg-4 col-md-4">
                                    <a href="#" class="btn btn-lg btn-block omb_btn-twitter" id="btn_tauth" data-social_id="tauth">
                                      <i class="fab fa-twitter"></i>
                                      <span class="hidden-xs">Twitter</span>
                                    </a>
                                  </div>
                                  <div class="col-xs-4 col-sm-2 col-lg-4 col-md-4">
                                    <a href="#" class="btn btn-lg btn-block omb_btn-google" id="btn_gauth" data-social_id="gauth">
                                      <i class="fab fa-google-plus-g"></i>
                                      <span class="hidden-xs">Google+</span>
                                    </a>
                                  </div>
                                </div>
                              </div> -->
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
    <main id="page-view">