<?php
	/*
	Template Name: Resume
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--resume" role="main">
			<?php if( ! post_password_required() ): //If password is not needed ?>
				<section class="res__intro">
					<h1 class="res__intro-title">Mario Souza</h1>

					<div class="res__intro-utilities">
						<a class="icon__container res__icon-container about__icon-container--link" href="#" target="_blank">
							<i class="fal fa-file-alt"></i>
							<span class="icon__text res__icon-text">Download Résumé</span>
						</a>
					</div>
				</section>

				<div class="res__flex-container">
					<div class="res__main-container">
						<section>
							<h2 class="res__section-title">Professional & Work Experience</h2>

							<div class="res__block">
								<h3 class="res__block-title">Digital Producer</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Arnold Worldwide</li>
										<li>Boston, MA</li>
										<li>August 2014 – Present</li>
									</ul>

									<div class="res__blockIntro-aux">
										<p>Clients: CFP Board, Jack Daniel’s, Ocean Spray, Santander Bank, SolarCity and Volvo Trucks</p>
									</div>
								</div>

								<div class="res__blockDetails res__blockDetails--client">
									<h4 class="res__blockDetails-title">Ocean Spray Growers Portal</h4>

									<ul class="res__blockDetails-list">
										<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</li>
										<li>Nullam id dolor id nibh ultricies vehicula ut id elit. Sed posuere consectetur est at lobortis.</li>
										<li>Vestibulum id ligula porta felis euismod semper. Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
									</ul>
								</div>

								<div class="res__blockDetails res__blockDetails--client">
									<h4 class="res__blockDetails-title">CenturyLink Sing with Kelvin</h4>

									<ul class="res__blockDetails-list">
										<li>Donec sed odio dui.</li>
										<li>Curabitur blandit tempus porttitor.</li>
										<li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
									</ul>
								</div>

								<div class="res__blockDetails res__blockDetails--client">
									<h4 class="res__blockDetails-title">Jack Daniel's Barrel Hunt</h4>

									<ul class="res__blockDetails-list">
										<li>Donec sed odio dui.</li>
										<li>Curabitur blandit tempus porttitor.</li>
										<li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
									</ul>
								</div>
							</div> <!-- /res__block -->

							<div class="res__block">
								<h3 class="res__block-title">Associate Digital Producer</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Myriad Inc.</li>
										<li>Boston, MA</li>
										<li>October 2012 - January 2013</li>
									</ul>

									<div class="res__blockIntro-aux">
										<p>Clients: Massachusetts General Hospital Cancer Center, MIT AgeLab, The National Center on Time & Learning, North Shore-LIJ Health System and Stonybrook Water</p>
									</div>
								</div>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p>Oversaw all digital projects from inception and carried them through final QA prior to launch. Administered schedules, daily hot sheets and resource allocations. Executed organic SEO campaigns through content generation, HTML modifications and link building. Delivered keyword and analytics reports. Developed sitemaps and designed wireframes. Consulted on social media and blogging.</p>
									</div>
								</div>
							</div> <!-- /res__block -->

							<div class="res__block">
								<h3 class="res__block-title">Project Management Intern</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Myriad Inc.</li>
										<li>Boston, MA</li>
										<li>October 2012 - January 2013</li>
									</ul>
								</div>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p>Learned the operations of a graphic design, web development and marketing agency. Exposed to multiple projects at any single point in time. Became a more valuable team member by teaching myself new skills such as CSS and basic audio editing.</p>
									</div>
								</div>
							</div> <!-- /res__block -->


							<div class="res__block">
								<h3 class="res__block-title">Farmer</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Bog Lane Farms</li>
										<li>Harwich, MA</li>
										<li>May 2007 - September 2012</li>
									</ul>
								</div>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p>Carried out day-to-day operations in regards to maintaining a cranberry bog.</p>
									</div>
								</div>
							</div> <!-- /res__block -->
						</section>

						<section>
							<h2 class="res__section-title">Education</h2>

							<div class="res__block">
								<h3 class="res__block-title">Bachelor of Science in Marketing & Minor in International Business</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>University of Massachusetts Dartmouth</li>
										<li>North Dartmouth, MA</li>
										<li>Class of 2011</li>
									</ul>
								</div>

								<div class="res__blockDetails">
									<ul class="res__blockDetails-list">
										<li><span>Awards: </span>Dean’s List - Major GPA of 3.8 - Cum Laude Distinction</li>
										<li><span>Study Abroad Experience: </span>spent the summer of 2010 in Wolfsburg, Germany to learn about Volkswagen’s global marketing efforts, strategies and tactics.</li>
										<li><span>Internship: </span>completed an ongoing sales internship at the Fastenal Company junior and senior years.</li>
									</ul>
								</div>
							</div> <!-- /res__block -->
						</section>

						<section>
							<h2 class="res__section-title">Academic Experience</h2>

							<div class="res__block">
								<h3 class="res__block-title">Market Researcher</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Fall River Historical Society</li>
										<li>Fall River, MA</li>
										<li>Spring Semester 2011</li>
									</ul>
								</div>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p>Conducted market research for the Society in order to understand attitudes of tour companies towards offering historical tours. Identified a number of tour companies interested in offering tours planned by the Society, which proved to generate much needed business.</p>
									</div>
								</div>
							</div> <!-- /res__block -->

							<div class="res__block">
								<h3 class="res__block-title">Social Media Consultant</h3>

								<div class="res__blockIntro">
									<ul class="res__blockIntro-list">
										<li>Cranberry Marketing Committee</li>
										<li>Wareham, MA</li>
										<li>Fall Semester 2010</li>
									</ul>
								</div>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p>Met with the Committee and followed their existing social media efforts, along with efforts of other similar commodity food groups over the course of a semester. Coordinated my group to create a strategic social media campaign that allowed the Committee to better their efforts and drive increased awareness.</p>
									</div>
								</div>
							</div> <!-- /res__block -->
						</section>
					</div> <!-- /res__main-container -->

					<aside class="res__aside-container">
						<section class="">
							<div class="res__block">
								<h2 class="res__section-title">Contact</h2>

								<div class="res__blockDetails">
									<ul class="res__blockDetails-list">
										<li>Boston, MA</li>
										<li><a href="mailto:mario@itsmariosouza.com">mario@itsmariosouza.com</a></li>
									</ul>
								</div>
							</div> <!-- /res__block -->
						</section>

						<section class="">
							<div class="res__block">
								<h2 class="res__section-title">Social</h2>

								<div class="res__blockDetails">
									<ul class="res__blockDetails-list">
										<li>
											<a class="icon__container res__icon-container about__icon-container--link" href="https://www.linkedin.com/in/itsmariosouza/" target="_blank">
												<i class="fab fa-linkedin-in"></i>
												<span class="icon__text res__icon-text">LinkedIn</span>
											</a>
										</li>
										<li>
											<a class="icon__container res__icon-container about__icon-container--link" href="https://www.instagram.com/itsmariosouza/" target="_blank">
												<i class="fab fa-instagram"></i>
												<span class="icon__text res__icon-text">Instagram</span>
											</a>
										</li>
									</ul>
								</div>
							</div> <!-- /res__block -->
						</section>

						<section class="">
							<div class="res__block">
								<h2 class="res__section-title">Certificates</h2>

								<div class="res__blockDetails">
									<ul class="res__blockDetails-list">
										<li>
											<span>JavaScript Circuit – </span>distributed by General Assembly
										</li>
										<li>
											<span>Certified ScrumMaster&reg; –</span>distributed by Scrum Alliance
										</li>
										<li>
											<span>Inbound Marketing Certified –  </span>distributed by HubSpot
										</li>
									</ul>
								</div>
							</div> <!-- /res__block -->
						</section>

						<section class="">
							<div class="res__block">
								<h2 class="res__section-title">Skills</h2>

								<div class="res__blockDetails">
									<div class="res__blockDetails-copy">
										<p><span>Everyday Tools Used: </span>Mac OS X, Slack, Google Drive, Smartsheet, Jira, Trello, Keynote, Photoshop, Sublime Text and FTP</p>
										<p><span>Other Proficiencies: </span>Excel, PowerPoint, Word, HTML, CSS, JavaScript, jQuery, Gulp, WordPress, Drupal, InDesign, Illustrator, Acrobat, log and cookie based analytics tools, social media platforms, Microsoft Project, Audacity, MOZ and Articulate Storyline</p>
									</div>
								</div>
							</div> <!-- /res__block -->
						</section>
					</aside> <!-- /res__aside-container -->
				</div> <!-- /res__flex-container -->

			<?php else: //If password is needed ?>
				<section>
					<?php the_content(); ?>
				</section>

			<?php endif; //End password protect ?>
		</div> <!-- /main -->

<?php get_footer(); ?>
