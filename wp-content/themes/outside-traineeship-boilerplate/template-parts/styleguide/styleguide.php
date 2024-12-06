<?php ?>
<section class="styleguide">
    <header id="header" class="styleguide__header">
        <h1 class="styleguide__heading h1 text-primary">Appian - Development Guidelines</h1>
    </header>

    <main class="content">
        <!-- aside bar -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar__list">
                <li class="sidebar__item"><a href="#colors" class="sidebar__link">Colors</a></li>
                <li class="sidebar__item"><a href="#typography" class="sidebar__link">Typography</a></li>
                <li class="sidebar__item"><a href="#icons" class="sidebar__link">Icons</a></li>
                <li class="sidebar__item"><a href="#icons" class="sidebar__link">Buttons</a></li>
                <li class="sidebar__item"><a href="#icons" class="sidebar__link">Texture</a></li>
                <li class="sidebar__item"><a href="#icons" class="sidebar__link">Logo & Favicon</a></li>
            </ul>
        </aside>

        <div class="styleguide__container">
            <!-- color section -->
            <section id="colors" class="colors">
                <h2 class="colors__header">Colors</h2>

                <div class="colors__container">
                    <div class="primary colors__row">
                        <h3>Primary</h3>
                        <div class="colors__card bg-primary">
                            <div class="colors__card-body">
                                <strong>Primary Red</strong>
                                <i>$primary</i>
                                <span>#D72027</span>
                            </div>
                            <code>.bg-primary</code>
                        </div>
                        <div class="colors__card ">
                            <div class="colors__card-body">
                                <strong>Dark Red</strong>
                                <i>$dark-red</i>
                                <span>#A1181D</span>
                            </div>
                            <code>.bg-dark-red</code>
                        </div>
                        <div class="colors__card bg-light-red">
                            <div class="colors__card-body">
                                <strong>Light Red</strong>
                                <i>$light-red</i>
                                <span>#F3BABC</span>
                            </div>
                            <code>.bg-light-red</code>
                        </div>
                        <div class="colors__card bg-ultra-light-red">
                            <div class="colors__card-body">
                                <strong>Ultra Light Red</strong>
                                <i>$ultra-light-red</i>
                                <span>#FBE9E9</span>
                            </div>
                            <code>.bg-ultra-light-red</code>
                        </div>
                    </div>

                    <div class="secondary colors__row">
                        <h3>Secondary</h3>
                        <div class="colors__card bg-secondary">
                            <div class="colors__card-body">
                                <strong>Secondary</strong>
                                <i>$secondary</i>
                                <span>#101922</span>
                            </div>
                            <code>.bg-secondary</code>
                        </div>
                        <div class="colors__card bg-dark">
                            <div class="colors__card-body">
                                <strong>Dark</strong>
                                <i>$dark</i>
                                <span>#0C131A</span>
                            </div>
                            <code>.bg-dark</code>
                        </div>
                        <div class="colors__card bg-light">
                            <div class="colors__card-body">
                                <strong>Light Red</strong>
                                <i>$light</i>
                                <span>#DBDDDE</span>
                            </div>
                            <code>.bg-light</code>
                        </div>
                        <div class="colors__card bg-ultra-light">
                            <div class="colors__card-body">
                                <strong>Ultra Light</strong>
                                <i>$ultra-light</i>
                                <span>#E7E8E9</span>
                            </div>
                            <code>.bg-ultra-light</code>
                        </div>
                    </div>

                    <div class="neutrals colors__row">
                        <h3>Neutrals</h3>
                        <div class="colors__card bg-neutral-600">
                            <div class="colors__card-body">
                                <strong>Neutral 600</strong>
                                <i>$neutral-600</i>
                                <span>#111111</span>
                            </div>
                            <code>.bg-neutral-600</code>
                        </div>
                        <div class="colors__card bg-neutral-500">
                            <div class="colors__card-body">
                                <strong>Neutral 500</strong>
                                <i>$neutral-500</i>
                                <span>#1C1C1C</span>
                            </div>
                            <code>.bg-neutral-500</code>
                        </div>
                        <div class="colors__card bg-neutral-400">
                            <div class="colors__card-body">
                                <strong>Neutral 400</strong>
                                <i>$neutral-400</i>
                                <span>#292929</span>
                            </div>
                            <code>.bg-neutral-400</code>
                        </div>
                        <div class="colors__card bg-neutral-300">
                            <div class="colors__card-body">
                                <strong>Neutral 300</strong>
                                <i>$neutral-300</i>
                                <span>#393939</span>
                            </div>
                            <code>.bg-neutral-300</code>
                        </div>
                        <div class="colors__card bg-neutral-200">
                            <div class="colors__card-body">
                                <strong>Neutral 200</strong>
                                <i>$neutral-200</i>
                                <span>#7C7C7C</span>
                            </div>
                            <code>.bg-neutral-200</code>
                        </div>
                        <div class="colors__card bg-neutral-100">
                            <div class="colors__card-body">
                                <strong>Neutral 100</strong>
                                <i>$neutral-100</i>
                                <span>#DEDEDE</span>
                            </div>
                            <code>.bg-neutral-100</code>
                        </div>
                        <div class="colors__card bg-neutral-75">
                            <div class="colors__card-body">
                                <strong>Neutral 75</strong>
                                <i>$neutral-75</i>
                                <span>#E9E9E9</span>
                            </div>
                            <code>.bg-neutral-75</code>
                        </div>
                        <div class="colors__card bg-neutral-50">
                            <div class="colors__card-body">
                                <strong>Neutral 50</strong>
                                <i>$neutral-50</i>
                                <span>#FFFFFF</span>
                            </div>
                            <code>.bg-neutral-50</code>
                        </div>
                    </div>

                    <div class="overlay colors__row">
                        <h3>Overlays</h3>
                        <div class="colors__card bg-overlay-68">
                            <div class="colors__card-body">
                                <strong>Overlay 68</strong>
                                <i>$overlay-68</i>
                                <span>#000000AD</span>
                            </div>
                            <code>.bg-overlay-68</code>
                        </div>
                        <div class="colors__card bg-overlay-50">
                            <div class="colors__card-body">
                                <strong>Overlay 50</strong>
                                <i>$overlay-50</i>
                                <span>#00000080</span>
                            </div>
                            <code>.bg-overlay-50</code>
                        </div>
                        <div class="colors__card bg-overlay-30">
                            <div class="colors__card-body">
                                <strong>Overlay 30</strong>
                                <i>$overlay-30</i>
                                <span>#0000004D</span>
                            </div>
                            <code>.bg-overlay-30</code>
                        </div>
                        <div class="colors__card bg-overlay-20">
                            <div class="colors__card-body">
                                <strong>Overlay 20</strong>
                                <i>$overlay-20</i>
                                <span>#00000033</span>
                            </div>
                            <code>.bg-overlay-20</code>
                        </div>
                    </div>
                </div>
            </section>

            <!-- typography section -->
            <section id="typography" class="typography">
                    <h2 class="typography__header">Typography</h2>

                    <div class="typography__container">
                        <div class="typography__section">
                            <h3>Display</h3>

                            <div class="typography__item">
                                <p class="d1">D1 - Display 1</p>
                                <p>Desktop - 120px/100% Tablet - 60px/100% Mobile - 48px/110% Letter-spacing 0%</p>
                            </div>
                            <div class="typography__item">
                                <p class="d2">D2 - Display 2</p>
                                <p>Desktop - 88px/120% Tablet - 64px/100% Mobile - 40px/90% Letter-spacing 0%/-1%/-2%</p>
                            </div>
                        </div>

                        <div class="typography__section">
                            <h3>Headings</h3>

                            <div class="typography__item">
                                <h1 class="h1">h1 - Heading 1</h1>
                                <p>Desktop - 64px/110% Tablet - 52px/110% Mobile - 40px/110% Letter-spacing - 0%</p>
                            </div>
                            <div class="typography__item">
                                <h2 class="h2">h2 - Heading 2</h2>
                                <p>Desktop - 48px/110% Tablet - Mobile - 28px/30.8px</p>
                            </div>
                            <div class="typography__item">
                                <h3 class="h3">h3 - Heading 3</h3>
                                <p>Desktop - 32px/35.2px Mobile - 20px/22px</p>
                            </div>
                            <div class="typography__item">
                                <h4 class="h4">h4 - Heading 4</h4>
                                <p>Desktop - 24px/26.4px Mobile - 18px/19.8px</p>
                            </div>
                            <div class="typography__item">
                                <h5 class="h5">h5 - Heading 5</h5>
                                <p>Desktop - 16px/17.6px Mobile - 14px/15.4px</p>
                            </div>
                            <div class="typography__item">
                                <h6 class="h6">h6 - Heading 6</h6>
                                <p>Desktop - 14px/15.4px Mobile - 13px/14.3px</p>
                            </div>
                        </div>

                        <hr>

                        <div class="typography__section">
                            <h3>Text</h3>

                            <div class="typography__item">
                                <p class="text-large">text-large - Text Size Large</p>
                            </div>
                            <div class="typography__item">
                                <p class="text-medium">text-medium - Text Size Medium</p>
                            </div>
                            <div class="typography__item">
                                <p class="text-regular">text-regular - Text Size Regular</p>
                            </div>
                            <div class="typography__item">
                                <p class="text-small">text-small - Text Size Small</p>
                            </div>
                            <div class="typography__item">
                                <p class="text-xsmall">text-xsmall - Text Size Xsmall</p>
                            </div>
                        </div>
                    </div>
                </section>

            <!-- icon section -->
            <section id="icons" class="icons">
                    <h2 class="icons__header">Icons</h2>

                    <div class="icons__container">
                        <div class="icons__item">
                            <span class="icon-arrow-left"></span>
                            <p>icon-arrow-left</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-arrow-right"></span>
                            <p>icon-arrow-right</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-chevron-down"></span>
                            <p>icon-chevron-down</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-menu"></span>
                            <p>icon-menu</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-phone-call"></span>
                            <p>icon-phone-call</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-play"></span>
                            <p>icon-play</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-pause"></span>
                            <p>icon-pause</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-quote"></span>
                            <p>icon-quote</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-x-mark"></span>
                            <p>icon-x-mark</p>
                        </div>
                        <div class="icons__item">
                            <span class="icon-linkedin"></span>
                            <p>icon-linkedin</p>
                        </div>
                    </div>
                </section>
        </div>
    </main>

    <footer>
        <div class="foot">
            <p class="mb-0">© 2024. All Rights Reserved.</p>
        </div>
    </footer>

</section>