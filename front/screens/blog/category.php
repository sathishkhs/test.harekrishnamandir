<link href="assets/css/loadmore-style.css" rel="stylesheet">
<style>
   .widget-author ul li a{
    font-family: "Rubik",sans-serif;
    color:#7d848a;
    margin-left: 8px;
    font-weight: 400;
  }
  .product .product-details {
    height: 150px;
  }


  .btn-load-more {
    font-size: 14px;
    color: #f7b135;
    border-width: 3px;
    border-color: #f7b135;
    border-style: solid;
    position: relative;
    z-index: 0;
    border-radius: 3rem;
    background-color: transparent;
  }

  .btn-load-more:before {
    position: absolute;
    content: '';
    background: #f1d167;
    width: 0;
    height: 100%;
    left: 0;
    top: 0;
    opacity: 0;
    z-index: -1;
    transition: all .5s ease;
  }

  .btn-load-more:hover {
    border-color: var(--theme-color3) !important;
    color: #fff !important;
    background-color: #f7b135;
    text-decoration: none;
  }
  .widget ul > li:hover::before {
  color: #f7b135;
}
</style>
<script src="assets/js/loadMoreResults.js"></script>
<section>
      <div class="container pb-100">
        <div class="row">
          <div class="col-lg-9">
            <div class="row">
              <?php if(empty($blog)){ ?>
                    <h4>No posts found</h4>
                <?php } ?>
              <?php foreach($blog as $post) { ?>

                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 item">
              <div class="product">
                <div class="product-header">
                <a href="blog/category/<?php echo $post->category_id;?>"><span class="onsale"><?php echo $this->db->where('category_id', $post->category_id)->get('blogcategory')->row()->category_name; ?></span></a>
                  <div class="thumb image-swap">
                    <a href="blog/post/<?php echo $post->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $post->post_image; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="Hare Krishna Mandir"></a>
                    <a href="blog/post/<?php echo $post->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $post->post_image; ?>" class="product-hover-image img-responsive img-fullwidth" alt="Hare Krishna Mandir" width="300" height="300"></a>
                  </div>

                </div>
                <div class="product-details">
                  <?php $user = $this->db->select('*')->where('id', $post->author)->get('author')->row(); ?>
                  <span class="product-categories d-flex justify-content-between">
                    <a href="blog/author/<?php echo $post->author; ?>" rel="tag">By <?php echo $user->name; ?> </a>
                    <a class="ml-auto"><?php echo $post->created_at; ?></a>
                  </span>
                  <h5 class="product-title"><a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a></h5>

                </div>
              </div>

            </div>
            <?php } ?>
            </div>
          </div>
            <div class="col-lg-4 col-xl-3 sidebar-area sidebar-right position-sticky">
          <div class="mt-sm-30">

            <div class="widget">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Search</h4>
              <div class="latest-posts">
                <div id="search-1" class="widget widget_search">
                  <div class="widget-inner">
                    <form role="search" method="post" class="search-form" action="blog ">
                      <input type="search" class="form-control search-field" placeholder="Search …" value="" name="blog_search">
                      <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="widget">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest Blogs</h4>
              <div class="latest-posts">
                <?php foreach ($posts as $post) { ?>
                  <article class="post clearfix pb-0 mb-20">
                    <a class="post-thumb" href="blog/post/<?php echo $post->page_slug; ?>"><img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $post->post_image; ?>" alt="images"></a>
                    <div class="post-right">
                      <h5 class="post-title mt-0"><a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a></h5>
                      <span class="post-date">
                        <time class="entry-date" datetime="<?php echo $post->crated_at; ?>"><?php echo $post->created_at; ?></time>
                      </span>
                    </div>
                  </article>
                <?php } ?>
              </div>
            </div>


            <div class="widget widget_categories">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Categories</h4>
              <ul>
                <?php foreach ($categories as $category) {
                ?>
                  <li class="cat-item d-block"><a href="blog/category/<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></a> </li>
                <?php } ?>

              </ul>
            </div>
            <div class="widget widget-author text-dark">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Authors</h4>
              <ul>
                <?php foreach ($authors as $author) {
                ?>
                  <li class="fa fa-user d-block"><a href="blog/author/<?php echo $author->id; ?>"><?php echo $author->name; ?></a> </li>
                <?php } ?>

              </ul>
            </div>

            </div>
            </div>
            </div>
      </div>
                </section>





    <script>
    
$('.loadMore').loadMoreResults({
  displayedItems: 6
});
      </script>