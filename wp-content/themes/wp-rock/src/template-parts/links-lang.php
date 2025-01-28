<?php


$languages = pll_the_languages( ['raw'=>true] );
?>

<ul>
    <?php foreach( $languages as $lang ) : ?>

        <li><a href="<?php echo $lang['url']; ?>"
               lang="<?php echo $lang['slug']; ?>"
               hreflang="<?php echo $lang['slug']; ?>"
               class="<?php echo $lang['current_lang'] ? 'active' : '' ?>">
                <?php echo pll__($lang['name']); ?>
            </a>
        </li>

    <?php endforeach; ?>
</ul>
