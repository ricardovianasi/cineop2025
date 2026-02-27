<?php
$up_home_introduction = get_field('up_home_introduction', 'option');
if (!empty($up_home_introduction['up_home_introduction_enabled'])):
  $up_home_introduction_title = $up_home_introduction['up_home_introduction_title'];
  $up_home_introduction_text = $up_home_introduction['up_home_introduction_text'];
  $up_home_introduction_link = $up_home_introduction['up_home_introduction_link'];
  $up_home_introduction_link_text = $up_home_introduction['up_home_introduction_link_text'];

  ?>
  <div class="intro">
    <div class="intro-id">
      <svg
        width="1920"
        height="634"
        viewBox="0 0 1920 634"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <g clip-path="url(#clip0_150_804)">
          <rect
            width="4421"
            height="634"
            transform="matrix(-1 0 0 -1 1920 634)"
            fill="white"
          />
          <path
            d="M1900.91 851.873L-445.761 851.873L1464.93 0.296918L1900.91 851.873Z"
            fill="#B9A280"
          />
          <path
            d="M1536.2 740.392L-1417.65 1280.76L493.041 429.184L1536.2 740.392Z"
            fill="#266D33"
          />
          <path
            d="M-173.5 -213L-301 46.5L308 232.5L-173.5 -213Z"
            fill="#774F55"
          />
          <path
            d="M-1367.7 -117.781L-1546.19 1343.51L493.658 433.648L-1367.7 -117.781Z"
            fill="#A20E13"
          />
          <path
            d="M1900.1 851.873L2642.52 0.296975L1464.12 0.296972L1900.1 851.873Z"
            fill="#DC2018"
          />
          <path
            d="M2102.76 1247.57L224.774 1271.33L1666.78 395.995L2102.76 1247.57Z"
            fill="#18274B"
          />
          <g style="mix-blend-mode: overlay">
            <path
              d="M2124.29 209.974L1130.63 812.279L1090.47 745.435L2084.13 143.13L2124.29 209.974Z"
              fill="#D9D9D9"
            />
          </g>
          <path
            d="M2049.15 766.979L2024.38 886.384L-877.081 29.0238L-686.5 -99L2049.15 766.979Z"
            fill="#8A151E"
          />
          <path
            opacity="0.35"
            d="M-1045 980.707L-624.646 931.158L1534.39 -29.3612L1330.05 -111.853L-1045 980.707Z"
            fill="#CC4818"
          />
          <path
            d="M534 634C400.333 429.5 -11.9 -9.9 -21.5 -19.5H2167L2133.5 120.5L1275 634H534Z"
            fill="#0A0A0A"
          />
        </g>
        <defs>
          <clipPath id="clip0_150_804">
            <rect
              width="4421"
              height="634"
              fill="white"
              transform="matrix(-1 0 0 -1 1920 634)"
            />
          </clipPath>
        </defs>
      </svg>
    </div>
    <div class="container">
      <div class="title">
        <h2><?php echo $up_home_introduction_title; ?></h2>
      </div>
      <div class="desc">
        <?php echo $up_home_introduction_text ?>
      </div>
      <?php if ($up_home_introduction_link): ?>
        <a href="<?php echo $up_home_introduction_link ?>"
           class="btn-red"><?php echo $up_home_introduction_link_text ?? 'Leia a apresentação' ?></a>
      <?php endif; ?>
    </div>
  </div>
<?php endif;
