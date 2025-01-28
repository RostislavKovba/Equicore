<?php

global $global_options;

$telegram = get_field_value($global_options, 'telegram');

if (!$telegram) return;
?>

<a href="<?php echo $telegram['url'] ?>" class="btn-group">
    <b><?php echo $telegram['title'] ?></b>
    <div class="btn-icon type-2">
        <svg
                id="icon-telegram"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
        >
            <g id="Icon/telegram">
                <path
                        id="Vector"
                        d="M21 5L2 12.5L9 13.5M21 5L18.5 20L9 13.5M21 5L9 13.5M9 13.5V19L12.2488 15.7229"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                ></path>
            </g>
        </svg>
    </div>
</a>