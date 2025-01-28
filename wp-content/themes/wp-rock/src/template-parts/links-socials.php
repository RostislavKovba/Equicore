<?php

global $global_options;

$socials = get_field_value($global_options, 'socials');
?>

<ul style="justify-content: flex-start">
    <?php if ($socials['instagram']) : ?>
        <li>
            <a href="<?php echo $socials['instagram']['url'] ?>" target="_blank" aria-label="instagram">
                <img width="16" height="16" src="<?php echo $socials['instagram']['icon'] ?>" alt="" loading="lazy" />
            </a>
        </li>
    <?php endif; ?>

    <?php if ($socials['tiktok']) : ?>
        <li>
            <a href="<?php echo $socials['tiktok']['url'] ?>" target="_blank" aria-label="tiktok">
                <img width="16" height="16" src="<?php echo $socials['tiktok']['icon'] ?>" alt="" loading="lazy" />
            </a>
        </li>
    <?php endif; ?>
</ul>