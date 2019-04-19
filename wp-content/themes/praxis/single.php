<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Praxis
 */

get_header();
?>

	<!-- Start Site Content -->
        <div class="blog-details site-content section">
            <div class="container">
                <div class="row">
                    <main class="col-md-9 col-sm-8 site-main">
                    	<?php
                    		$query = new WP_Query(array(
                    			'post_type' => 'post',
                    		));
                    		while($query->have_posts()):$query->the_post()
                    	?>
                        <article class="post">
                            <header class="entry-header">
                                <div  class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
                                <div class="post-details-wrap">
                                    <h2 class="entry-title"><?php the_title(); ?></h2>
                                    <div class="byline">
                                        <span class="author">
                                            <?php esc_html_e('Posted On: ','praxis')?><a href="#"><?php the_author(); ?></a>
                                        </span>
                                        <span class="posted-on">
                                            Date: <a href="#"><?php the_time('d M Y'); ?></a>
                                        </span>
                                    </div>
                                </div><!-- .post-details-wrap -->
                            </header>
                            <div class="entry-content">
                                <p><?php the_content(); ?></p>
                            </div>
                        </article>
                    	<?php endwhile; ?>
                        <div class="social-share">
                            <span class="social-share-title">share this post on:</span>
                            <div class="social-btn">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            </div>
                        </div><!-- .social-share -->
                        <div class="comments-area">
                            <h2 class="comments-title">3 Comments</h2>
                            <ol class="comment-list">
                                <li class="comment">
                                    <article class="comment-body">
                                        <div class="comment-meta">
                                            <div class="comment-author">
                                                <img src="img/blog/client-1.jpg" alt="" class="avatar">
                                                <a href="#" class="nm">Jessica Leady</a>
                                            </div><!-- .comment-author -->
                                            <div class="comment-metadata">
                                                <a href="#"><span>26 Jan, 2016</span></a>
                                            </div><!-- .comment-metadata -->
                                        </div><!-- .comment-meta -->
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                        <div class="reply"><a href="#" class="comment-reply-link">Reply</a></div>
                                    </article>
                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <div class="comment-meta">
                                                    <div class="comment-author">
                                                        <img src="img/blog/client-2.jpg" alt="" class="avatar">
                                                        <span class="nm"><a href="#">Jhon Doe</a></span>
                                                    </div><!-- .comment-author -->
                                                    <div class="comment-metadata">
                                                        <a href="#"><span>26 Jan, 2016</span></a>
                                                    </div><!-- .comment-metadata -->
                                                </div><!-- .comment-meta -->
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                </div>
                                                <div class="reply"><a href="#" class="comment-reply-link">Reply</a></div>
                                            </article>
                                            <ol class="children">
                                                <li class="comment">
                                                    <article class="comment-body">
                                                        <div class="comment-meta">
                                                            <div class="comment-author">
                                                                <img src="img/blog/client-3.jpg" alt="" class="avatar">
                                                                <span class="nm"><a href="#">Hannibal Lecter</a></span>
                                                            </div><!-- .comment-author -->
                                                            <div class="comment-metadata">
                                                                <a href="#"><span>26 Jan, 2016</span></a>
                                                            </div><!-- .comment-metadata -->
                                                        </div><!-- .comment-meta -->
                                                        <div class="comment-content">
                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                        </div>
                                                        <div class="reply"><a href="#" class="comment-reply-link">Reply</a></div>
                                                    </article>
                                                </li>
                                            </ol><!-- .children -->
                                        </li>
                                    </ol><!-- .children -->
                                </li>
                            </ol><!-- .comment-list -->
                            <div class="comment-respond">
                                <h2 class="comment-reply-title">leave a reply</h2>
                                <form method="post" class="comment-form">
                                    <p class="comment-form-comment">
                                        <textarea name="comment" cols="40" rows="5" placeholder="Write here...*" required></textarea>
                                    </p>
                                    <p class="comment-form-author">
                                        <input name="author" type="text" placeholder="Name*" required>
                                    </p>
                                    <p class="comment-form-email">
                                        <input name="email" type="email" placeholder="E-mail*" required>
                                    </p>
                                    <p class="comment-form-url">
                                        <input id="url" name="url" type="url" placeholder="Website">
                                    </p>
                                    <p class="form-submit">
                                        <button type="submit" class="t-btn t-btn-small">Post Comment</button>
                                    </p>
                                </form>
                            </div><!-- .comment-respond -->
                        </div><!-- .comments-area -->
                    </main><!-- .col -->
                    <aside class="col-md-3 col-sm-4 sidebar">
                        <section class="widget widget_search">
                            <h2 class="widget-title">SEARCH</h2>
                            <form role="search" method="get" class="search-form">
                                <input type="text" class="search-field" placeholder="Search …">
                                <input type="submit">
                            </form>
                        </section>
                        <section class="widget widget_recent_entries">
                            <h2 class="widget-title">LATEST POSTS</h2>
                            <ul>
                                <li>
                                    <a href="#" class="recent-post-thumb"><img src="img/blog/r-01.jpg" alt=""></a>
                                    <div class="recent-post-details">
                                        <h3><a href="">Post title here</a></h3>
                                        <span>Aug 29, 2017</span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="recent-post-thumb"><img src="img/blog/r-02.jpg" alt=""></a>
                                    <div class="recent-post-details">
                                        <h3><a href="">Post title here</a></h3>
                                        <span>Aug 29, 2017</span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="recent-post-thumb"><img src="img/blog/r-03.jpg" alt=""></a>
                                    <div class="recent-post-details">
                                        <h3><a href="">Post title here</a></h3>
                                        <span>Aug 29, 2017</span>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <section class="widget widget_categories">
                            <h2 class="widget-title">PROJECT CATEGORIES</h2>
                            <ul>
                                <li><a href="#">Books</a></li>
                                <li><a href="#">Woman Books</a></li>
                                <li><a href="#">Children Books</a></li>
                                <li><a href="#">Comic Books</a></li>
                            </ul>
                        </section>
                        <section class="widget widget_tag_cloud">
                          <h2 class="widget-title">TAGS</h2>
                            <div class="tagcloud">
                                <a href="#">ARTICLE</a>
                                <a href="#">BRANDING</a>
                                <a href="#">IDENTITY</a>
                                <a href="#">ILLUSTRATION</a>
                                <a href="#">CONSTRACTION</a>
                                <a href="#">INDUSTRY</a>
                                <a href="#">NEWS</a>
                                <a href="#">GRAPHIC</a>
                            </div>
                        </section>
                        <section class="widget widget_archive">
                            <h2 class="widget-title">ARCHIVE</h2>
                            <ul>
                                <li><a href="#">April 2017</a></li>
                                <li><a href="#">August 2017</a></li>
                                <li><a href="#">February 2017</a></li>
                                <li><a href="#">May 2017</a></li>
                            </ul>
                        </section>
                    </aside><!-- .col -->
                </div>
            </div>
        </div>
        <!-- End Site Content --> 

<?php
get_sidebar();
get_footer();
