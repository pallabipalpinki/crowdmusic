<section class="inner-pg inner-gap">
  <div class="container">
    <div class="btns py-4">
      <a href="<?php echo $user_details['user_profile_url']; ?>" class="follow-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 22 22">
          <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
        </svg>
        Back to Profile
      </a>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <ul class="contributors row">
          <?php
            if(isset($contributordata)){
              foreach ($contributordata as $key => $value) {?>
          <li class="col-md-4">
            <a href="javascript:void(0);" onClick = "openListoftracks(<?php echo $value->id;?>);">
              <div class="dp">
                <img src="<?php echo $value->profile_image; ?>">
              </div>
              <p><?php echo ucwords($value->firstname .' '.$value->lastname); ?></p>
            </a>
          </li>
          <?php }} ?>
        </ul>
      </div>
      <div class="col-lg-4">
        <div class="playlist separator pb-4">
          <h4>Contributor Musiclist</h4>
          <?php 
            ?>
          <div class="display">
            <div class="thumb">
              <img id="trackCover" src="" alt="">
            </div>
            <div class="track">
              <div class="controlls">
                <button id="previousTrack"><i class="fas fa-step-backward"></i></button>
                <button id="playPause"><i class="far fa-play-circle"></i></button>
                <button id="nextTrack"><i class="fas fa-step-forward"></i></button>
              </div>
              <h3 id="trackTitle"></h3>
              <audio>
                <source id="trackSource" src="" type="audio/mpeg">
              </audio>
            </div>
          </div>
            <ul class="list" id="contributorlist">
            <?php if(!empty($contributorsonglist)){    

              foreach ($contributorsonglist as $key => $value) { 
            ?>

            <li class="active" data-cover="<?php echo $value->content_image;?>" data-source="<?php echo $value->content_track;?>">
              <div class="track_name"><?php echo $value->content_track_name;?></div>
            </li>
            <?php
              }
            } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>