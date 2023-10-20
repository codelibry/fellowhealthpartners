import $ from "jquery";

// import { lottie } from './lottie';

import { header } from "./template-parts/header/header";

// Animations
import { appearence } from "./animations/appearence";

// Blocks

// Parts
import { sliders } from "./parts/slider";
import { show_more, load_projects } from "./parts/ajax";
import { filter } from "./parts/filter";
import { initPopups } from "./parts/popup";
import { full_row } from "./parts/full_row";
import { videoBlock } from "./parts/video";
import { numberBlock } from "./template-parts/blocks/number_block";

header();

//animations
appearence();

//blocks

// Parts
filter();
videoBlock();
show_more();
load_projects();
sliders();
initPopups();
numberBlock();
