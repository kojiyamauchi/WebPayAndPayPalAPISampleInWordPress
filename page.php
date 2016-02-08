<?php get_header(); ?>

<?php query_posts('orderby=rand');?> <!-- 投稿ランダム表示 -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?><!-- 投稿ループ -->

<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><!-- 個別投稿へのリンク -->
<?php the_title(); ?></a><!-- 投稿タイトル -->
<?php if (has_post_thumbnail()) {
    echo the_post_thumbnail();
} ?><!-- 投稿アイキャッチ画像 -->
<?php the_content(); ?><!-- 投稿文章 -->

<?php endwhile; endif; ?><!-- 投稿ループ終了-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
