<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'header.php'?>
		
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/bgc2.jpg); " ></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row" >
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="main.php">Home</a></li>
							<li>Knowledge Network</li>
						</ul>
						<h1 class="white-text">Knowledge Network</h1>
					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- row -->
						<div class="row">

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="./img/blog01.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Pro Tips for Career Success</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">Admin</a></span>
										<div class="pull-right">
											<span>18 Oct, 2023</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="./img/blog02.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">How to Land Your Dream Job</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">Admin</a></span>
										<div class="pull-right">
											<span>23 Nov, 2023</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 27</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="./img/blog03.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">The Future of Work: Trends to Watch</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">Admin</a></span>
										<div class="pull-right">
											<span>7 Dec, 2023</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 42</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="./img/blog04.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Essential Skills for Today's Job Market</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">Admin</a></span>
										<div class="pull-right">
											<span>15 Jan, 2024</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 19</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

						</div>
						<!-- /row -->

						<!-- row -->
						<div class="row">

							<!-- pagination -->
							<div class="col-md-12">
								<div class="post-pagination">
									<a href="#" class="pagination-back pull-left">Back</a>
									<ul class="pages">
										<li class="active">1</li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
									</ul>
									<a href="#" class="pagination-next pull-right">Next</a>
								</div>
							</div>
							<!-- pagination -->

						</div>
						<!-- /row -->
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- search widget -->
						<div class="widget search-widget">
							<form>
								<input class="input" type="text" name="search">
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>
						<!-- /search widget -->

						<!-- category widget -->
						<div class="widget category-widget">
							<h3>Categories</h3>
							<a class="category" href="#">Web <span>12</span></a>
							<a class="category" href="#">Css <span>5</span></a>
							<a class="category" href="#">Wordpress <span>24</span></a>
							<a class="category" href="#">Html <span>78</span></a>
							<a class="category" href="#">Business <span>36</span></a>
						</div>
						<!-- /category widget -->

						<!-- posts widget -->
						<div class="widget posts-widget">
							<h3>Recents Posts</h3>

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post01.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro Tips for Career Success</a>
								<p><small>By : Admin</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post02.jpg" alt="">
								</a>
								<a href="blog-post.html">How to Land Your Dream Job</a>
								<p><small>By : Admin</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post03.jpg" alt="">
								</a>
								<a href="blog-post.html">The Future of Work: Trends to Watch</a>
								<p><small>By : Admin</small></p>
							</div>
							<!-- /single posts -->

						</div>
						<!-- /posts widget -->

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->

		<?php include 'footer.php'?> 