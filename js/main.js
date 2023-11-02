import $ from "jquery";

// import { lottie } from './lottie';

import { header } from "./template-parts/header/header";
import { footer } from "./template-parts/footer/footer";
// Animations
import { appearence } from "./animations/appearence";
import {
  scrollToAnchor,
  scrollToHash,
  requestQuoteLink,
  smooth_scroll,
} from "./animations/scroll-to-anchor";
// Blocks

// Parts
import { sliders } from "./parts/slider";
import { show_more, load_projects } from "./parts/ajax";
import { filter } from "./parts/filter";
import { initPopups } from "./parts/popup";
import { full_row } from "./parts/full_row";
import { videoBlock } from "./parts/video";
import { numberBlock } from "./template-parts/blocks/number_block";
import { testimonialBlock } from "./template-parts/blocks/testimonial";
import { vertical_Tabs } from "./template-parts/blocks/vertical_tabs";
import { horizontal_Tabs } from "./template-parts/blocks/horizontal_tabs";
import { parrallax_images } from "./animations/parallax";
import { circle_blocks } from "./template-parts/blocks/circle_blocks";

header();
footer();

//animations
appearence();

smooth_scroll();
//blocks

// Parts
filter();
videoBlock();
show_more();
load_projects();
sliders();
initPopups();
numberBlock();
// testimonialBlock();
vertical_Tabs();
horizontal_Tabs();
parrallax_images();
circle_blocks();
