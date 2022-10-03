<?php get_header(); ?>
<?php
    $table_sections = get_sub_field('table_section',$post->ID);
?>
    <div class="karoon-container sm our-story-section">
        <div class="our-story-wrapper">
            <?php 
                foreach ($table_sections as $table) {
            ?>
                <div class="our-story-row">
                    <div class="left-column">
                        <span class="year"><?php echo $table['year']; ?></span>
                    </div>
                    <div class="right-column">
                        <div class="our-story-detail-wrapper">
                            <div class="month-wrapper">
                                <span><?php echo $table['month']; ?></span>
                            </div>
                            <div class="content-wrapper">
                                <p><?php echo $table['content']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                }
            ?>
        </div>
    </div>

<!-- <section class="karoon-cms-content-wrapper our-story-section">
    <div class="karoon-container sm">
        <div class="our-story-wrapper">
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2004</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>June</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Listed on Australian Stock Exchange on 8 June 2004 with Initial Public Offering raising A$4.7 million.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2004</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Acquired 100% interest in WA Browse Basin exploration permits WA-314-P and 315-P.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2006</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Farmed-out a 60% working interest in WA-314-P and WA-315-P to ConocoPhillips. Karoon retained 40%. The farm-out committed ConocoPhillips to fund a major multi well work and seismic program estimated to cost up to US$285 million (gross).(Source: ASX 9 October 2006)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2007</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Awarded Browse Basin block WA-398-P (Karoon: 40%).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2007</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Awarded 100% in five blocks in the Brazil Santos Basin, in Government bid round.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2008</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Farm-in for a 20% working interest in Block Z-38 offshore Peru, increasing to 75% by 2011.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2009–2014 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Participated in six gas discoveries from seven wells in the ConocoPhillips-operated Browse Basin exploration campaign, resulting in the definition of the multi-Tcf Poseidon gas field.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2012</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Farmed-in to Carnarvon Basin block WA-482-P (Karoon: 100%).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2012</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Farmed out 35% of Santos Basin acreage to Pacific Exploration for US$40 million cash and a carry through a multi-well drilling program of up to US$210 million.(Source: ASX 19 September 2012).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2012–2015 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Drilled five wells and one appraisal well in the Brazil Santos basin blocks, with three discoveries, Echidna (Neon) and Kangaroo (Goiá).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2014</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Sold a 40% working interest in WA-314-P, WA-315-P and WA-398-P, which contained the Poseidon gas field, to Origin Energy for up to US$800 million. (Source: ASX 8 December 2014).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2014</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Farmed-out 50% of WA-482-P to Apache Energy (now Santos) for cash and carry equivalent of up to US$66 million of expenditure. (Source: ASX 16 May 2014).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2015 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Contingent resource estimates assigned to Echidna (Neon) and Kangaroo (Goiá) in Brazil.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2016</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>In Brazil, re-acquired Pacific Exploration’s 35% interest in the Santos Basin blocks,taking Karoon’s ownership to 100%. Offshore Australia, awarded 100% of EPP46 in the Ceduna Basin.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2018 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Peru: Farm-out of a 35% working interest in Block Z-38 to Tullow Oil plc.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2019 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span></span>
                        </div>
                        <div class="content-wrapper">
                            <p>Sale and Purchase Agreement (SPA) signed to acquire 100% of Baúna in Brazil from Petrobras.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2020</span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>February</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Marina#1 exploration well drilled offshore Peru in Block Z-38. Dry hole.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>November</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Completion of Baúna acquisition, Karoon assumed ownership and operatorship</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2021 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>June</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Final Investment Decision taken for Patola development</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>July</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Withdrew from offshore Peru permit Z-38</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>September</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Withdrew from Ceduna sub-basin permit EPP46</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>November </span>
                        </div>
                        <div class="content-wrapper">
                            <p>Financial close reached on inaugural US$160 million debt facility, in preparation for Baúna intervention program and Patola development</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year">2022 </span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>February</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Agreement with Shell to buy carbon credits sufficient to offset approximately 60% of FY2021-2029 Scope 1 & 2 emissions from Baúna & Patola, with purchases to be completed annually from 2022 to 2030. Including carbon credits acquired in November 2021, Baúna carbon neutral in FY2021.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>April</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Commitment made to drill one, possibly two, control wells in the Neon oil field, offshore Brazil, subject to receipt of required environmental approvals, after completion of the Patola field development.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>April </span>
                        </div>
                        <div class="content-wrapper">
                            <p>Establishment of an additional US$50 million “accordion” facility, taking total debt facility to US$210 million.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-story-row">
                <div class="left-column">
                    <span class="year"></span>
                </div>
                <div class="right-column">
                    <div class="our-story-detail-wrapper">
                        <div class="month-wrapper">
                            <span>May</span>
                        </div>
                        <div class="content-wrapper">
                            <p>Commencement of the Baúna well intervention program.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section> -->




<?php get_footer(); ?>