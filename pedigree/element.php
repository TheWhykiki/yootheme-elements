<?php

namespace YOOtheme;

return [
    'transforms' => [
        'render' => function ($node) {
            // Don't render element if content fields are empty
            return (bool) strlen($node->props['gen1a']);
        },
    ],

    'updates' => [
        '1.20.0-beta.4' => function ($node) {
            if (isset($node->props['maxwidth_align'])) {
                $node->props['block_align'] = $node->props['maxwidth_align'];
                unset($node->props['maxwidth_align']);
            }
        },
    ],
];
