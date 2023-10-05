import $ from "jquery";

// import { lottie } from './lottie';

import { header } from "./template-parts/header/header";

// Animations
import { appearence } from "./animations/appearence";

// Blocks

// Parts
import { sliders } from "./parts/slider";
import { show_more } from "./parts/ajax";
import { filter } from "./parts/filter";
import { popup } from "./parts/popup";
import { full_row } from "./parts/full_row";
import { videoBlock } from "./parts/video";

// header();

//animations
appearence();

//blocks

// Parts
filter();
videoBlock();
show_more();
